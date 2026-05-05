@extends('layouts.admin')

@section('content')
    <h1 class="mb-8 text-2xl font-bold text-slate-900">Dashboard Overview</h1>

    <!-- Stat Cards -->
    <div class="grid grid-cols-1 gap-6 mb-8 md:grid-cols-3">
        <!-- Card 1 -->
        <div class="flex items-center p-6 bg-white shadow-sm rounded-xl border border-slate-100">
            <div class="p-3 mr-4 text-indigo-600 bg-indigo-50 rounded-lg">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
            </div>
            <div>
                <p class="mb-1 text-sm font-medium text-slate-500">Total Buku</p>
                <p class="text-3xl font-bold text-slate-900">{{ $totalBooks }}</p>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="flex items-center p-6 bg-white shadow-sm rounded-xl border border-slate-100">
            <div class="p-3 mr-4 text-emerald-600 bg-emerald-50 rounded-lg">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
            </div>
            <div>
                <p class="mb-1 text-sm font-medium text-slate-500">Pinjaman Aktif</p>
                <p class="text-3xl font-bold text-slate-900">{{ $activeLoans }}</p>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="flex items-center p-6 bg-white shadow-sm rounded-xl border border-slate-100">
            <div class="p-3 mr-4 text-amber-600 bg-amber-50 rounded-lg">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
            </div>
            <div>
                <p class="mb-1 text-sm font-medium text-slate-500">Member Terdaftar</p>
                <p class="text-3xl font-bold text-slate-900">{{ $totalMembers }}</p>
            </div>
        </div>
    </div>

    <!-- Data Table Section -->
    <div class="bg-white rounded-xl shadow-sm border border-slate-100 overflow-hidden">
        <div class="flex items-center justify-between px-6 py-4 border-b border-slate-100 bg-white">
            <h2 class="text-lg font-semibold text-slate-900">Data Buku Terbaru</h2>
            <button class="px-4 py-2 text-sm font-medium text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 transition-colors">
                + Tambah Buku
            </button>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50">
                        <th class="px-6 py-4 text-sm font-medium text-slate-500 border-b border-slate-100">Judul Buku</th>
                        <th class="px-6 py-4 text-sm font-medium text-slate-500 border-b border-slate-100">Kategori</th>
                        <th class="px-6 py-4 text-sm font-medium text-slate-500 border-b border-slate-100">Stok</th>
                        <th class="px-6 py-4 text-sm font-medium text-slate-500 border-b border-slate-100 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    <!-- Dummy Row -->
                    <tr class="hover:bg-slate-50 transition-colors">
                        <td class="px-6 py-4 text-sm text-slate-700 font-medium">Laskar Pelangi</td>
                        <td class="px-6 py-4 text-sm text-slate-500">Fiksi</td>
                        <td class="px-6 py-4 text-sm">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-emerald-100 text-emerald-800">
                                12 Tersedia
                            </span>
                        </td>
                        <td class="px-6 py-4 text-sm text-right space-x-2">
                            <button class="text-indigo-600 hover:text-indigo-900 font-medium">Edit</button>
                            <button class="text-red-600 hover:text-red-900 font-medium">Hapus</button>
                        </td>
                    </tr>
                    <tr class="hover:bg-slate-50 transition-colors">
                        <td class="px-6 py-4 text-sm text-slate-700 font-medium">Bumi Manusia</td>
                        <td class="px-6 py-4 text-sm text-slate-500">Sejarah</td>
                        <td class="px-6 py-4 text-sm">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                0 Tersedia
                            </span>
                        </td>
                        <td class="px-6 py-4 text-sm text-right space-x-2">
                            <button class="text-indigo-600 hover:text-indigo-900 font-medium">Edit</button>
                            <button class="text-red-600 hover:text-red-900 font-medium">Hapus</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
