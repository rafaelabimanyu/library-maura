@extends('layouts.admin')

@section('content')
    <div class="mb-10">
        <h1 class="text-3xl font-bold text-slate-900 tracking-tight">Dashboard Overview</h1>
        <p class="mt-2 text-slate-500">Ringkasan aktivitas dan metrik utama perpustakaan Anda hari ini.</p>
    </div>

    <!-- Stat Cards -->
    <div class="grid grid-cols-1 gap-6 mb-10 md:grid-cols-3">
        <!-- Card 1 -->
        <div class="flex items-center p-6 bg-white shadow-sm rounded-2xl border border-slate-100 hover:shadow-md transition-shadow">
            <div class="p-4 mr-5 text-indigo-600 bg-indigo-50/80 rounded-xl">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
            </div>
            <div>
                <p class="mb-1 text-sm font-semibold text-slate-500 uppercase tracking-wider">Total Buku</p>
                <p class="text-3xl font-bold text-slate-900">{{ $totalBooks }}</p>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="flex items-center p-6 bg-white shadow-sm rounded-2xl border border-slate-100 hover:shadow-md transition-shadow">
            <div class="p-4 mr-5 text-emerald-600 bg-emerald-50/80 rounded-xl">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
            </div>
            <div>
                <p class="mb-1 text-sm font-semibold text-slate-500 uppercase tracking-wider">Pinjaman Aktif</p>
                <p class="text-3xl font-bold text-slate-900">{{ $activeLoans }}</p>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="flex items-center p-6 bg-white shadow-sm rounded-2xl border border-slate-100 hover:shadow-md transition-shadow">
            <div class="p-4 mr-5 text-amber-600 bg-amber-50/80 rounded-xl">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
            </div>
            <div>
                <p class="mb-1 text-sm font-semibold text-slate-500 uppercase tracking-wider">Total Member</p>
                <p class="text-3xl font-bold text-slate-900">{{ $totalMembers }}</p>
            </div>
        </div>
    </div>

    <!-- Data Table Section -->
    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
        <div class="flex items-center justify-between px-8 py-6 border-b border-slate-100/60 bg-white">
            <div>
                <h2 class="text-lg font-bold text-slate-900">Data Buku Terbaru</h2>
                <p class="text-sm text-slate-500 mt-1">Daftar buku yang baru ditambahkan ke sistem.</p>
            </div>
            <a href="{{ route('admin.books.create') }}" class="inline-flex items-center gap-2 px-5 py-2.5 text-sm font-medium text-white bg-indigo-600 rounded-xl hover:bg-indigo-700 shadow-sm shadow-indigo-200 transition-all">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                Tambah Buku
            </a>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50/50">
                        <th class="px-8 py-4 text-xs font-semibold text-slate-500 uppercase tracking-wider border-b border-slate-100">Judul Buku</th>
                        <th class="px-8 py-4 text-xs font-semibold text-slate-500 uppercase tracking-wider border-b border-slate-100">Kategori</th>
                        <th class="px-8 py-4 text-xs font-semibold text-slate-500 uppercase tracking-wider border-b border-slate-100">Stok</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100/80">
                    @php
                        $latestBooks = \App\Models\Book::with('category')->latest()->take(5)->get();
                    @endphp
                    @forelse($latestBooks as $book)
                        <tr class="even:bg-slate-50/50 hover:bg-slate-50 transition-colors">
                            <td class="px-8 py-4">
                                <p class="text-sm font-semibold text-slate-900">{{ $book->title }}</p>
                                <p class="text-sm text-slate-500">{{ $book->author }}</p>
                            </td>
                            <td class="px-8 py-4 text-sm text-slate-600">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-slate-100 text-slate-600">
                                    {{ $book->category->name ?? '-' }}
                                </span>
                            </td>
                            <td class="px-8 py-4">
                                @if($book->stock > 0)
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-emerald-100 text-emerald-700">
                                        Tersedia ({{ $book->stock }})
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-red-100 text-red-700">
                                        Habis
                                    </span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="px-8 py-8 text-center text-slate-500">
                                Belum ada data buku.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="px-8 py-4 bg-slate-50/50 border-t border-slate-100/60 text-right">
            <a href="{{ route('admin.books.index') }}" class="text-sm font-semibold text-indigo-600 hover:text-indigo-800 transition-colors">Lihat Semua Data &rarr;</a>
        </div>
    </div>
@endsection
