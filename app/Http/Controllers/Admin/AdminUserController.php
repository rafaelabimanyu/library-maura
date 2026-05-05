<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;

class AdminUserController extends Controller
{
    public function index()
    {
        $members = User::where('role', 'pengunjung')
                       ->withCount(['loans as active_loans_count' => function ($query) {
                           $query->where('status', 'borrowed');
                       }])
                       ->latest()
                       ->paginate(15);
                       
        return view('admin.members.index', compact('members'));
    }
}
