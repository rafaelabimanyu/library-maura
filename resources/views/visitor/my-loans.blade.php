@extends('layouts.visitor')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-slate-900">Pinjaman Saya</h1>
        <p class="mt-2 text-slate-600">Daftar buku yang sedang dan pernah Anda pinjam.</p>
    </div>

    @if(session('success'))
        <div class="mb-6 bg-emerald-50 border-l-4 border-emerald-500 p-4 rounded-md">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-emerald-400" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" /></svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm text-emerald-700 font-medium">{{ session('success') }}</p>
                </div>
            </div>
        </div>
    @endif

    <div class="bg-white shadow-sm rounded-xl border border-slate-100 overflow-hidden">
        @if($loans->isEmpty())
            <div class="text-center py-16">
                <svg class="mx-auto h-12 w-12 text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                </svg>
                <h3 class="mt-2 text-sm font-medium text-slate-900">Belum Ada Pinjaman</h3>
                <p class="mt-1 text-sm text-slate-500">Mulai pinjam buku favoritmu di perpustakaan kami.</p>
                <div class="mt-6">
                    <a href="{{ route('home') }}" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
                        Lihat Katalog
                    </a>
                </div>
            </div>
        @else
            <ul class="divide-y divide-slate-200">
                @foreach($loans as $loan)
                    <li class="p-6 sm:flex sm:items-center sm:justify-between hover:bg-slate-50 transition-colors">
                        <div class="flex items-center">
                            <!-- Cover Placeholder -->
                            <div class="h-24 w-16 bg-slate-200 rounded shrink-0 overflow-hidden mr-6">
                                @if($loan->book && $loan->book->cover_image)
                                    <img src="{{ asset('storage/' . $loan->book->cover_image) }}" alt="{{ $loan->book->title }}" class="h-full w-full object-cover">
                                @else
                                    <div class="h-full w-full flex items-center justify-center text-slate-400 bg-slate-100">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                                    </div>
                                @endif
                            </div>
                            <div>
                                <p class="text-lg font-semibold text-slate-900">{{ $loan->book ? $loan->book->title : 'Buku tidak tersedia' }}</p>
                                <p class="text-sm text-slate-500 mt-1">Tanggal Pinjam: {{ $loan->loan_date->format('d M Y') }}</p>
                                <p class="text-sm text-slate-500">Jatuh Tempo: {{ $loan->due_date->format('d M Y') }}</p>
                                
                                @if($loan->status === 'borrowed' && \Carbon\Carbon::now()->startOfDay()->greaterThan($loan->due_date->startOfDay()))
                                    <p class="text-xs text-red-600 font-medium mt-1">⚠️ Terlambat</p>
                                @endif
                            </div>
                        </div>
                        <div class="mt-4 sm:mt-0 sm:ml-4 text-right">
                            @if($loan->status === 'borrowed')
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-amber-100 text-amber-800">
                                    Sedang Dipinjam
                                </span>
                            @else
                                <div class="flex flex-col items-end">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-emerald-100 text-emerald-800">
                                        Sudah Dikembalikan
                                    </span>
                                    <p class="text-xs text-slate-500 mt-1">Dikembalikan pada: {{ $loan->return_date->format('d M Y') }}</p>
                                </div>
                            @endif
                        </div>
                    </li>
                @endforeach
            </ul>
            <div class="px-6 py-4 border-t border-slate-200">
                {{ $loans->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
