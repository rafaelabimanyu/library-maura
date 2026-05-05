@extends('layouts.admin')

@section('content')
    <div class="mb-10 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold text-slate-900 tracking-tight">Manajemen Data Buku</h1>
            <p class="mt-2 text-slate-500">Kelola koleksi buku perpustakaan Anda secara menyeluruh.</p>
        </div>
        <a href="{{ route('admin.books.create') }}" class="inline-flex items-center gap-2 px-5 py-2.5 text-sm font-medium text-white bg-indigo-600 rounded-xl hover:bg-indigo-700 shadow-sm shadow-indigo-200 transition-all">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            Tambah Buku
        </a>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50/50">
                        <th class="px-8 py-5 text-xs font-semibold text-slate-500 uppercase tracking-wider border-b border-slate-100">Info Buku</th>
                        <th class="px-8 py-5 text-xs font-semibold text-slate-500 uppercase tracking-wider border-b border-slate-100">Kategori & Penerbit</th>
                        <th class="px-8 py-5 text-xs font-semibold text-slate-500 uppercase tracking-wider border-b border-slate-100 text-center">Stok</th>
                        <th class="px-8 py-5 text-xs font-semibold text-slate-500 uppercase tracking-wider border-b border-slate-100 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100/80">
                    @forelse($books as $book)
                        <tr class="even:bg-slate-50/50 hover:bg-slate-50 transition-colors">
                            <td class="px-8 py-4">
                                <div class="flex items-center gap-4">
                                    <div class="h-16 w-12 bg-slate-200 rounded shrink-0 overflow-hidden shadow-sm">
                                        @if($book->cover_image)
                                            <img src="{{ asset('storage/' . $book->cover_image) }}" alt="{{ $book->title }}" class="h-full w-full object-cover">
                                        @else
                                            <div class="h-full w-full flex items-center justify-center text-slate-400 bg-slate-100">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                                            </div>
                                        @endif
                                    </div>
                                    <div>
                                        <p class="text-sm font-bold text-slate-900">{{ $book->title }}</p>
                                        <p class="text-sm text-slate-500 mt-0.5">{{ $book->author }}</p>
                                        <p class="text-xs text-slate-400 mt-1">ISBN: {{ $book->isbn ?? '-' }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-8 py-4">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-slate-100 text-slate-700 mb-1">
                                    {{ $book->category->name ?? '-' }}
                                </span>
                                <p class="text-xs text-slate-500 mt-1">{{ $book->publisher ?? '-' }} ({{ $book->year ?? '-' }})</p>
                            </td>
                            <td class="px-8 py-4 text-center">
                                @if($book->stock > 0)
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-emerald-100 text-emerald-700">
                                        {{ $book->stock }} Tersedia
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-red-100 text-red-700">
                                        Habis
                                    </span>
                                @endif
                            </td>
                            <td class="px-8 py-4 text-right">
                                <div class="flex items-center justify-end gap-3">
                                    <a href="{{ route('admin.books.edit', $book->id) }}" class="text-indigo-600 hover:text-indigo-900 font-medium text-sm transition-colors">Edit</a>
                                    
                                    <form action="{{ route('admin.books.destroy', $book->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus buku ini? Semua data pinjaman terkait juga akan terhapus.');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900 font-medium text-sm transition-colors">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-8 py-10 text-center text-slate-500">
                                <svg class="mx-auto h-12 w-12 text-slate-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                                Belum ada data buku yang terdaftar.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($books->hasPages())
            <div class="px-8 py-4 border-t border-slate-100 bg-slate-50/50">
                {{ $books->links() }}
            </div>
        @endif
    </div>
@endsection
