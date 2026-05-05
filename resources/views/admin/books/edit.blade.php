@extends('layouts.admin')

@section('content')
<div class="max-w-3xl mx-auto">
    <div class="flex items-center justify-between mb-8">
        <h1 class="text-2xl font-bold text-slate-900 tracking-tight">Edit Data Buku</h1>
        <a href="{{ route('admin.books.index') }}" class="text-sm font-medium text-slate-500 hover:text-slate-700 transition-colors">
            &larr; Kembali ke Daftar Buku
        </a>
    </div>

    @if ($errors->any())
        <div class="mb-6 p-4 rounded-xl bg-red-50 border-l-4 border-red-500 shadow-sm">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" /></svg>
                </div>
                <div class="ml-3">
                    <h3 class="text-sm font-medium text-red-800">Terdapat kesalahan pada isian form:</h3>
                    <ul class="mt-1 text-sm text-red-700 list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @endif

    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
        <form action="{{ route('admin.books.update', $book->id) }}" method="POST" enctype="multipart/form-data" class="p-8">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-1 gap-y-6 gap-x-6 sm:grid-cols-2">
                <!-- Title -->
                <div class="sm:col-span-2">
                    <label for="title" class="block text-sm font-semibold text-slate-700">Judul Buku <span class="text-red-500">*</span></label>
                    <input type="text" name="title" id="title" value="{{ old('title', $book->title) }}" required class="mt-2 block w-full rounded-xl border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm transition-shadow">
                </div>

                <!-- Author -->
                <div>
                    <label for="author" class="block text-sm font-semibold text-slate-700">Penulis <span class="text-red-500">*</span></label>
                    <input type="text" name="author" id="author" value="{{ old('author', $book->author) }}" required class="mt-2 block w-full rounded-xl border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm transition-shadow">
                </div>

                <!-- Category -->
                <div>
                    <label for="category_id" class="block text-sm font-semibold text-slate-700">Kategori <span class="text-red-500">*</span></label>
                    <select id="category_id" name="category_id" required class="mt-2 block w-full rounded-xl border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm transition-shadow bg-white">
                        <option value="">Pilih Kategori...</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id', $book->category_id) == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Publisher -->
                <div>
                    <label for="publisher" class="block text-sm font-semibold text-slate-700">Penerbit</label>
                    <input type="text" name="publisher" id="publisher" value="{{ old('publisher', $book->publisher) }}" class="mt-2 block w-full rounded-xl border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm transition-shadow">
                </div>

                <!-- Year & Stock -->
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="year" class="block text-sm font-semibold text-slate-700">Tahun</label>
                        <input type="number" name="year" id="year" value="{{ old('year', $book->year) }}" class="mt-2 block w-full rounded-xl border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm transition-shadow">
                    </div>
                    <div>
                        <label for="stock" class="block text-sm font-semibold text-slate-700">Stok <span class="text-red-500">*</span></label>
                        <input type="number" name="stock" id="stock" value="{{ old('stock', $book->stock) }}" min="0" required class="mt-2 block w-full rounded-xl border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm transition-shadow">
                    </div>
                </div>

                <!-- ISBN -->
                <div class="sm:col-span-2">
                    <label for="isbn" class="block text-sm font-semibold text-slate-700">ISBN</label>
                    <input type="text" name="isbn" id="isbn" value="{{ old('isbn', $book->isbn) }}" class="mt-2 block w-full rounded-xl border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm transition-shadow">
                </div>

                <!-- Description -->
                <div class="sm:col-span-2">
                    <label for="description" class="block text-sm font-semibold text-slate-700">Deskripsi / Sinopsis</label>
                    <textarea id="description" name="description" rows="4" class="mt-2 block w-full rounded-xl border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm transition-shadow">{{ old('description', $book->description) }}</textarea>
                </div>

                <!-- Cover Image -->
                <div class="sm:col-span-2">
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Cover Buku Saat Ini</label>
                    <div class="flex items-start gap-6">
                        <div class="h-32 w-24 bg-slate-200 rounded-lg overflow-hidden border border-slate-200 shrink-0 shadow-sm">
                            @if($book->cover_image)
                                <img src="{{ asset('storage/' . $book->cover_image) }}" alt="Cover" class="h-full w-full object-cover">
                            @else
                                <div class="h-full w-full flex items-center justify-center text-slate-400">
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                </div>
                            @endif
                        </div>
                        <div class="flex-1">
                            <label for="cover_image" class="block text-sm font-medium text-slate-600 mb-1">Ganti Cover (Opsional)</label>
                            <input type="file" name="cover_image" id="cover_image" accept="image/*" class="block w-full text-sm text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100 transition-colors">
                            <p class="mt-2 text-xs text-slate-400">Maksimal ukuran file 2MB. Format: JPG, PNG, WEBP.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-8 pt-6 border-t border-slate-100 flex justify-end gap-3">
                <a href="{{ route('admin.books.index') }}" class="px-5 py-2.5 bg-white border border-slate-300 rounded-xl shadow-sm text-sm font-medium text-slate-700 hover:bg-slate-50 transition-colors">
                    Batal
                </a>
                <button type="submit" class="px-5 py-2.5 bg-indigo-600 border border-transparent rounded-xl shadow-sm shadow-indigo-200 text-sm font-medium text-white hover:bg-indigo-700 transition-colors">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
