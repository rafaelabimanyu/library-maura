<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Loan;
use App\Models\User;
use App\Models\Book;
use Carbon\Carbon;

class LoanSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::where('role', 'pengunjung')->get();
        $books = Book::all();

        if ($users->isEmpty() || $books->isEmpty()) {
            return;
        }

        // Create 30 loans
        for ($i = 0; $i < 30; $i++) {
            $user = $users->random();
            $book = $books->random();
            
            $loanDate = Carbon::now()->subDays(rand(1, 45));
            $dueDate = $loanDate->copy()->addDays(7);
            
            $status = rand(0, 1) ? 'borrowed' : 'returned';
            $returnDate = $status === 'returned' ? $dueDate->copy()->subDays(rand(-2, 5)) : null;

            Loan::create([
                'user_id' => $user->id,
                'book_id' => $book->id,
                'loan_date' => $loanDate,
                'due_date' => $dueDate,
                'return_date' => $returnDate,
                'status' => $status,
            ]);
        }
    }
}
