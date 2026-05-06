<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Book;
use App\Models\Category;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $books = Book::with('category')
            ->when($request->search, function ($q) use ($request) {
                $q->where(function ($query) use ($request) {
                    $query->where('title', 'like', '%' . $request->search . '%')
                          ->orWhere('author', 'like', '%' . $request->search . '%');
                });
            })
            ->when($request->category, function ($q) use ($request) {
                $q->whereHas('category', function ($query) use ($request) {
                    $query->where('slug', $request->category);
                });
            })
            ->latest()
            ->paginate(12);

        $totalBooks = \App\Models\Book::count();
        $activeMembers = \App\Models\User::where('role', 'pengunjung')->count();
        $activeLoans = \App\Models\Loan::where('status', 'borrowed')->count();

        return view('visitor.home', compact('books', 'totalBooks', 'activeMembers', 'activeLoans'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.books.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'publisher' => 'nullable|string|max:255',
            'year' => 'nullable|integer',
            'isbn' => 'nullable|string|max:50',
            'stock' => 'required|integer|min:0',
            'description' => 'nullable|string',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        if ($request->hasFile('cover_image')) {
            $path = $request->file('cover_image')->store('books', 'public');
            $validated['cover_image'] = $path;
        }

        Book::create($validated);

        return redirect()->route('admin.dashboard')->with('success', 'Buku berhasil ditambahkan!');
    }
}
