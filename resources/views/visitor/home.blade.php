@extends('layouts.visitor')

@section('content')
    <!-- Hero Section -->
    <div class="bg-slate-900 text-white py-16 sm:py-24 relative overflow-hidden">
        <!-- Decorative background element -->
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-10"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
            <h1 class="text-4xl font-extrabold tracking-tight sm:text-5xl lg:text-6xl mb-6">
                Temukan Buku <span class="text-indigo-400">Favoritmu</span>
            </h1>
            <p class="max-w-2xl mx-auto text-xl text-slate-300 mb-10">
                Jelajahi koleksi perpustakaan terlengkap dari fiksi, sejarah, teknologi, hingga sains.
            </p>
            
            <!-- Search Bar -->
            <form action="{{ route('home') }}" method="GET" class="max-w-2xl mx-auto relative flex items-center">
                <svg class="w-6 h-6 text-slate-400 absolute left-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari judul buku atau penulis..." class="w-full pl-12 pr-32 py-4 rounded-full text-slate-900 bg-white border-none focus:ring-4 focus:ring-indigo-500/30 text-lg shadow-lg">
                <button type="submit" class="absolute right-2 px-6 py-2.5 bg-indigo-600 text-white font-medium rounded-full hover:bg-indigo-700 transition-colors">
                    Cari
                </button>
            </form>
        </div>
    </div>

    <!-- Catalog Section -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="flex justify-between items-end mb-8">
            <h2 class="text-2xl font-bold text-slate-900">Katalog Buku Terbaru</h2>
        </div>

        @if($books->isEmpty())
            <div class="text-center py-16 bg-white rounded-xl shadow-sm border border-slate-100">
                <svg class="w-16 h-16 text-slate-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                <p class="text-slate-500 text-lg">Buku tidak ditemukan.</p>
                @if(request('search'))
                    <a href="{{ route('home') }}" class="text-indigo-600 hover:text-indigo-800 font-medium mt-2 inline-block">Tampilkan semua buku</a>
                @endif
            </div>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach($books as $book)
                    <div class="bg-white rounded-xl shadow-sm border border-slate-100 overflow-hidden flex flex-col hover:shadow-md transition-all duration-300 transform hover:-translate-y-1">
                        <!-- Placeholder Cover -->
                        <div class="bg-slate-200 relative pb-[133%]">
                            @if($book->cover_image)
                                <img src="{{ asset('storage/' . $book->cover_image) }}" alt="{{ $book->title }}" class="absolute inset-0 w-full h-full object-cover">
                            @else
                                <div class="absolute inset-0 flex items-center justify-center bg-slate-100 text-slate-300">
                                    <svg class="w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                </div>
                            @endif
                        </div>
                        
                        <div class="p-5 flex flex-col flex-grow">
                            <div class="mb-3">
                                @if($book->stock > 0)
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-emerald-100 text-emerald-800">
                                        Tersedia
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-red-100 text-red-800">
                                        Dipinjam
                                    </span>
                                @endif
                                
                                @if($book->category)
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-slate-100 text-slate-600 ml-1">
                                        {{ $book->category->name }}
                                    </span>
                                @endif
                            </div>
                            
                            <h3 class="text-lg font-bold text-slate-900 leading-tight mb-1">{{ $book->title }}</h3>
                            <p class="text-sm text-slate-500 mb-4">{{ $book->author }}</p>
                            
                            <div class="mt-auto pt-4 border-t border-slate-100">
                                <a href="#" class="block w-full text-center px-4 py-2.5 text-sm font-semibold text-indigo-600 bg-indigo-50 hover:bg-indigo-600 hover:text-white rounded-lg transition-colors duration-200">
                                    Lihat Detail
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-12">
                {{ $books->withQueryString()->links() }}
            </div>
        @endif
    </div>
@endsection
