<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Loan;
use App\Models\Book;
use App\Models\Fine;
use Carbon\Carbon;

class LoanController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'book_id' => 'required|exists:books,id',
            'loan_date' => 'required|date',
            'due_date' => 'required|date|after_or_equal:loan_date',
        ]);

        // Cek limit peminjaman
        $activeLoans = Loan::query()->where('user_id', $request->user_id)->where('status', 'borrowed')->count();

        if ($activeLoans >= 3) {
            return back()->with('error', 'User telah mencapai batas maksimal peminjaman (3 buku).');
        }

        $book = Book::findOrFail($request->book_id);

        if ($book->stock <= 0) {
            return back()->with('error', 'Stok buku habis.');
        }

        // Kurangi stok
        $book->decrement('stock');

        Loan::create([
            'user_id' => $request->user_id,
            'book_id' => $request->book_id,
            'loan_date' => $request->loan_date,
            'due_date' => $request->due_date,
            'status' => 'borrowed',
        ]);

        return redirect()->back()->with('success', 'Buku berhasil dipinjam.');
    }

    public function returnBook(Request $request, int $id)
    {
        $loan = Loan::findOrFail($id);

        if ($loan->status === 'returned') {
            return back()->with('error', 'Buku sudah dikembalikan.');
        }

        $returnDate = Carbon::now();
        $dueDate = Carbon::parse($loan->due_date);

        // Update status pinjaman
        $loan->update([
            'return_date' => $returnDate,
            'status' => 'returned',
        ]);

        // Tambah stok kembali
        $loan->book()->increment('stock');

        // Cek keterlambatan dan denda
        if ($returnDate->greaterThan($dueDate) && !$returnDate->isSameDay($dueDate)) {
            $diffDays = $returnDate->diffInDays($dueDate);
            // Denda flat Rp 1.000 / hari
            $fineAmount = $diffDays * 1000;

            Fine::create([
                'loan_id' => $loan->id,
                'amount' => $fineAmount,
                'is_paid' => false,
            ]);

            return redirect()->back()->with('error', "Buku dikembalikan terlambat {$diffDays} hari. Denda: Rp " . number_format($fineAmount, 0, ',', '.'));
        }

        return redirect()->back()->with('success', 'Buku berhasil dikembalikan tepat waktu.');
    }
}
