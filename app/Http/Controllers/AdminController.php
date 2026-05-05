<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Book;
use App\Models\Loan;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        $totalBooks = Book::count();
        $activeLoans = Loan::where('status', 'borrowed')->count();
        $totalMembers = User::where('role', 'pengunjung')->count();

        return view('admin.dashboard', compact('totalBooks', 'activeLoans', 'totalMembers'));
    }
}
