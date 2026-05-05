@extends('layouts.admin')

@section('content')
    <div class="mb-10 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold text-slate-900 tracking-tight">Sirkulasi Pinjaman</h1>
            <p class="mt-2 text-slate-500">Pantau dan kelola peminjaman serta pengembalian buku.</p>
        </div>
        <button class="inline-flex items-center gap-2 px-5 py-2.5 text-sm font-medium text-white bg-indigo-600 rounded-xl hover:bg-indigo-700 shadow-sm shadow-indigo-200 transition-all opacity-50 cursor-not-allowed" title="Fitur Tambah Pinjaman akan segera hadir">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            Tambah Pinjaman Baru
        </button>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50/50">
                        <th class="px-8 py-5 text-xs font-semibold text-slate-500 uppercase tracking-wider border-b border-slate-100">Info Peminjam</th>
                        <th class="px-8 py-5 text-xs font-semibold text-slate-500 uppercase tracking-wider border-b border-slate-100">Buku</th>
                        <th class="px-8 py-5 text-xs font-semibold text-slate-500 uppercase tracking-wider border-b border-slate-100">Status & Tanggal</th>
                        <th class="px-8 py-5 text-xs font-semibold text-slate-500 uppercase tracking-wider border-b border-slate-100 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100/80">
                    @forelse($loans as $loan)
                        <tr class="even:bg-slate-50/50 hover:bg-slate-50 transition-colors">
                            <td class="px-8 py-4">
                                <p class="text-sm font-bold text-slate-900">{{ $loan->user ? $loan->user->name : 'User Dihapus' }}</p>
                                <p class="text-xs text-slate-500 mt-0.5">{{ $loan->user ? $loan->user->email : '-' }}</p>
                            </td>
                            <td class="px-8 py-4">
                                <p class="text-sm font-semibold text-slate-800">{{ $loan->book ? $loan->book->title : 'Buku Dihapus' }}</p>
                                <p class="text-xs text-slate-500 mt-0.5">{{ $loan->book ? $loan->book->author : '-' }}</p>
                            </td>
                            <td class="px-8 py-4">
                                @if($loan->status === 'borrowed')
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-amber-100 text-amber-800 mb-2">
                                        Sedang Dipinjam
                                    </span>
                                    <p class="text-xs text-slate-600">Batas: <span class="font-medium {{ \Carbon\Carbon::now()->startOfDay()->greaterThan(\Carbon\Carbon::parse($loan->due_date)->startOfDay()) ? 'text-red-600' : '' }}">{{ \Carbon\Carbon::parse($loan->due_date)->format('d M Y') }}</span></p>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-emerald-100 text-emerald-800 mb-2">
                                        Sudah Kembali
                                    </span>
                                    <p class="text-xs text-slate-500">Tgl Kembali: {{ \Carbon\Carbon::parse($loan->return_date)->format('d M Y') }}</p>
                                @endif
                            </td>
                            <td class="px-8 py-4 text-right">
                                @if($loan->status === 'borrowed')
                                    <form action="{{ route('admin.loans.return', $loan->id) }}" method="POST" onsubmit="return confirm('Proses pengembalian buku ini? Stok buku akan otomatis bertambah.');">
                                        @csrf
                                        <button type="submit" class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-indigo-50 text-indigo-700 hover:bg-indigo-100 hover:text-indigo-800 rounded-lg text-xs font-semibold transition-colors border border-indigo-200">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                            Kembalikan Buku
                                        </button>
                                    </form>
                                @else
                                    <span class="text-xs text-slate-400 font-medium">Selesai</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-8 py-10 text-center text-slate-500">
                                <svg class="mx-auto h-12 w-12 text-slate-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                                Belum ada riwayat transaksi sirkulasi.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($loans->hasPages())
            <div class="px-8 py-4 border-t border-slate-100 bg-slate-50/50">
                {{ $loans->links() }}
            </div>
        @endif
    </div>
@endsection
