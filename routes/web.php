<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\BookController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    if (in_array(auth()->user()->role, ['admin', 'petugas'])) {
        return redirect()->route('admin.dashboard');
    }
    return redirect()->route('my-loans');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin Routes
Route::middleware(['auth', 'role:admin,petugas'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/books/create', [\App\Http\Controllers\BookController::class, 'create'])->name('books.create');
    Route::post('/books', [\App\Http\Controllers\BookController::class, 'store'])->name('books.store');
});

// Visitor Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/my-loans', [\App\Http\Controllers\LoanController::class, 'myLoans'])->name('my-loans');
});

require __DIR__.'/auth.php';
