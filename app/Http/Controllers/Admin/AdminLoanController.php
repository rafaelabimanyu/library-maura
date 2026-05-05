<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Loan;

class AdminLoanController extends Controller
{
    public function index()
    {
        $loans = Loan::with(['user', 'book'])->latest()->paginate(15);
        return view('admin.loans.index', compact('loans'));
    }
}
