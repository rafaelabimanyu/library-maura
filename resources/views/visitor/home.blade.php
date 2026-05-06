@extends('layouts.visitor')

@section('content')
    <!-- Hero Section -->
    <div class="bg-gradient-to-br from-indigo-900 to-slate-900 text-white py-20 sm:py-28 relative overflow-hidden">
        <!-- Decorative background element: geometric pattern -->
        <div
            class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-10 mix-blend-overlay">
        </div>
        <div
            class="absolute -top-24 -left-24 w-96 h-96 bg-indigo-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20">
        </div>
        <div
            class="absolute -bottom-24 -right-24 w-96 h-96 bg-blue-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20">
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
            <h1 class="text-4xl font-extrabold tracking-tight sm:text-5xl lg:text-6xl mb-6">
                Temukan Buku <span class="text-indigo-400">Favoritmu</span>
            </h1>
            <p class="max-w-2xl mx-auto text-xl text-slate-300 mb-10">
                Jelajahi ribuan koleksi perpustakaan terlengkap dari fiksi, sejarah, teknologi, hingga sains.
            </p>

            <!-- Search Bar -->
            <form action="{{ route('home') }}" method="GET" class="max-w-3xl mx-auto relative flex items-center group">
                <svg class="w-6 h-6 text-slate-400 absolute left-5 group-focus-within:text-indigo-500 transition-colors"
                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
                <input type="text" name="search" value="{{ request('search') }}"
                    placeholder="Cari judul buku atau penulis..."
                    class="w-full pl-14 pr-32 py-4 rounded-full text-slate-900 bg-white border-none focus:ring-4 focus:ring-indigo-500/30 text-lg shadow-lg focus:shadow-2xl transition-all outline-none">
                <button type="submit"
                    class="absolute right-2.5 px-6 py-2.5 bg-indigo-600 text-white font-semibold rounded-full hover:bg-indigo-700 hover:shadow-md transition-all">
                    Cari
                </button>
            </form>
        </div>
    </div>

    <!-- Stats Section -->
    <div class="bg-white border-b border-slate-100 relative z-20 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-10">
            <div
                class="grid grid-cols-1 sm:grid-cols-3 gap-6 text-center divide-y sm:divide-y-0 sm:divide-x divide-slate-100">
                <div class="py-4 sm:py-0">
                    <p class="text-4xl font-extrabold text-indigo-600">{{ number_format($totalBooks, 0, ',', '.') }}+</p>
                    <p class="text-sm font-medium text-slate-500 uppercase tracking-wide mt-1">Koleksi Buku</p>
                </div>
                <div class="py-4 sm:py-0">
                    <p class="text-4xl font-extrabold text-indigo-600">{{ number_format($activeMembers, 0, ',', '.') }}+</p>
                    <p class="text-sm font-medium text-slate-500 uppercase tracking-wide mt-1">Member Aktif</p>
                </div>
                <div class="py-4 sm:py-0">
                    <p class="text-4xl font-extrabold text-indigo-600">{{ number_format($activeLoans, 0, ',', '.') }}+</p>
                    <p class="text-sm font-medium text-slate-500 uppercase tracking-wide mt-1">Pinjaman Aktif</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Kategori Populer Section -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <h2 class="text-2xl font-bold text-slate-900 mb-8 text-center sm:text-left">Kategori Populer</h2>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <!-- Category Fiksi -->
            <a href="{{ route('home', ['category' => 'fiksi']) }}"
                class="flex items-center p-4 bg-white border border-slate-100 rounded-2xl hover:border-indigo-500 hover:shadow-md transition-all group">
                <div
                    class="w-12 h-12 flex items-center justify-center bg-indigo-50 text-indigo-600 rounded-xl group-hover:bg-indigo-600 group-hover:text-white transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                        </path>
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-slate-900 font-semibold">Fiksi</p>
                </div>
            </a>
            <!-- Category Sejarah -->
            <a href="{{ route('home', ['category' => 'sejarah']) }}"
                class="flex items-center p-4 bg-white border border-slate-100 rounded-2xl hover:border-emerald-500 hover:shadow-md transition-all group">
                <div
                    class="w-12 h-12 flex items-center justify-center bg-emerald-50 text-emerald-600 rounded-xl group-hover:bg-emerald-600 group-hover:text-white transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-slate-900 font-semibold">Sejarah</p>
                </div>
            </a>
            <!-- Category Teknologi -->
            <a href="{{ route('home', ['category' => 'teknologi']) }}"
                class="flex items-center p-4 bg-white border border-slate-100 rounded-2xl hover:border-blue-500 hover:shadow-md transition-all group">
                <div
                    class="w-12 h-12 flex items-center justify-center bg-blue-50 text-blue-600 rounded-xl group-hover:bg-blue-600 group-hover:text-white transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                        </path>
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-slate-900 font-semibold">Teknologi</p>
                </div>
            </a>
            <!-- Category Sains -->
            <a href="{{ route('home', ['category' => 'sains']) }}"
                class="flex items-center p-4 bg-white border border-slate-100 rounded-2xl hover:border-purple-500 hover:shadow-md transition-all group">
                <div
                    class="w-12 h-12 flex items-center justify-center bg-purple-50 text-purple-600 rounded-xl group-hover:bg-purple-600 group-hover:text-white transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z">
                        </path>
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-slate-900 font-semibold">Sains</p>
                </div>
            </a>
        </div>
    </div>

    <!-- Catalog Section -->
    <div class="bg-slate-50 border-t border-slate-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="flex justify-between items-end mb-8">
                <h2 class="text-2xl font-bold text-slate-900">Katalog Buku Terbaru</h2>
                <a href="{{ route('home') }}"
                    class="hidden sm:inline-flex items-center text-sm font-semibold text-indigo-600 hover:text-indigo-800 transition-colors">
                    Lihat Semua
                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>
            </div>

            @if ($books->isEmpty())
                <div class="text-center py-16 bg-white rounded-2xl shadow-sm border border-slate-100">
                    <svg class="w-16 h-16 text-slate-300 mx-auto mb-4" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                        </path>
                    </svg>
                    <p class="text-slate-500 text-lg">Buku tidak ditemukan.</p>
                    @if (request('search'))
                        <a href="{{ route('home') }}"
                            class="text-indigo-600 hover:text-indigo-800 font-medium mt-2 inline-block">Tampilkan semua
                            buku</a>
                    @endif
                </div>
            @else
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                    @foreach ($books as $book)
                        <div
                            class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden flex flex-col hover:shadow-xl hover:scale-105 transition-all duration-300 group">
                            <!-- Placeholder Cover -->
                            <div class="bg-slate-200 relative pb-[133%] overflow-hidden">
                                @if ($book->cover_image)
                                    <img src="{{ asset('storage/' . $book->cover_image) }}" alt="{{ $book->title }}"
                                        class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                @else
                                    <div
                                        class="absolute inset-0 flex items-center justify-center bg-slate-100 text-slate-300">
                                        <svg class="w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                    </div>
                                @endif

                                <!-- Badges -->
                                <div class="absolute top-3 left-3 flex flex-col gap-2">
                                    @if ($loop->iteration <= 2 && !request('search') && request()->get('page', 1) == 1)
                                        <span
                                            class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-bold bg-indigo-500 text-white shadow-sm">
                                            Baru
                                        </span>
                                    @endif
                                    @if ($loop->iteration == 3 || $loop->iteration == 6)
                                        <span
                                            class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-bold bg-amber-500 text-white shadow-sm">
                                            Populer
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="p-6 flex flex-col flex-grow">
                                <div class="mb-3 flex items-center gap-2 flex-wrap">
                                    @if ($book->stock > 0)
                                        <span
                                            class="inline-flex items-center px-2 py-0.5 rounded-md text-[10px] font-bold bg-emerald-100 text-emerald-800 uppercase tracking-wider">
                                            Tersedia ({{ $book->stock }})
                                        </span>
                                    @else
                                        <span
                                            class="inline-flex items-center px-2 py-0.5 rounded-md text-[10px] font-bold bg-red-100 text-red-800 uppercase tracking-wider">
                                            Dipinjam
                                        </span>
                                    @endif

                                    @if ($book->category)
                                        <span
                                            class="inline-flex items-center px-2 py-0.5 rounded-md text-[10px] font-bold bg-slate-100 text-slate-600 uppercase tracking-wider">
                                            {{ $book->category->name }}
                                        </span>
                                    @endif
                                </div>

                                <h3
                                    class="text-lg font-bold text-slate-900 leading-snug mb-1 group-hover:text-indigo-600 transition-colors line-clamp-2">
                                    {{ $book->title }}</h3>
                                <p class="text-sm text-slate-500 mb-4">{{ $book->author }}</p>

                                <div class="mt-auto pt-4 border-t border-slate-100">
                                    <a href="#"
                                        class="block w-full text-center px-4 py-2.5 text-sm font-semibold text-indigo-600 bg-indigo-50 hover:bg-indigo-600 hover:text-white rounded-xl transition-colors duration-200">
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
    </div>

    <!-- Testimonials -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
        <div class="text-center mb-12">
            <h2 class="text-2xl font-bold text-slate-900 mb-4">Kata Mereka</h2>
            <p class="text-slate-500">Apa yang member kami katakan tentang Library Maura.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 relative">
                <svg class="absolute top-6 right-6 w-8 h-8 text-indigo-100" fill="currentColor" viewBox="0 0 32 32">
                    <path
                        d="M9.352 4C4.456 7.456 1 13.12 1 19.36c0 5.088 3.072 8.064 6.624 8.064 3.36 0 5.856-2.688 5.856-5.856 0-3.168-2.208-5.472-5.088-5.472-.576 0-1.344.096-1.536.192.48-3.264 3.552-7.104 6.624-9.024L9.352 4zm16.512 0c-4.8 3.456-8.256 9.12-8.256 15.36 0 5.088 3.072 8.064 6.624 8.064 3.264 0 5.856-2.688 5.856-5.856 0-3.168-2.304-5.472-5.184-5.472-.576 0-1.248.096-1.44.192.48-3.264 3.456-7.104 6.528-9.024L25.864 4z">
                    </path>
                </svg>
                <p class="text-slate-600 mb-6 relative z-10 italic">"Koleksi bukunya sangat lengkap. Platform ini
                    memudahkan saya mencari referensi untuk tugas akhir."</p>
                <div class="flex items-center">
                    <div
                        class="w-10 h-10 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-600 font-bold">
                        A</div>
                    <div class="ml-3">
                        <p class="text-sm font-bold text-slate-900">Ahmad Fauzi</p>
                        <p class="text-xs text-slate-500">Mahasiswa</p>
                    </div>
                </div>
            </div>
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 relative">
                <svg class="absolute top-6 right-6 w-8 h-8 text-indigo-100" fill="currentColor" viewBox="0 0 32 32">
                    <path
                        d="M9.352 4C4.456 7.456 1 13.12 1 19.36c0 5.088 3.072 8.064 6.624 8.064 3.36 0 5.856-2.688 5.856-5.856 0-3.168-2.208-5.472-5.088-5.472-.576 0-1.344.096-1.536.192.48-3.264 3.552-7.104 6.624-9.024L9.352 4zm16.512 0c-4.8 3.456-8.256 9.12-8.256 15.36 0 5.088 3.072 8.064 6.624 8.064 3.264 0 5.856-2.688 5.856-5.856 0-3.168-2.304-5.472-5.184-5.472-.576 0-1.248.096-1.44.192.48-3.264 3.456-7.104 6.528-9.024L25.864 4z">
                    </path>
                </svg>
                <p class="text-slate-600 mb-6 relative z-10 italic">"UI/UX-nya luar biasa! Mudah banget buat pinjam buku
                    tanpa harus repot tanya-tanya ketersediaan."</p>
                <div class="flex items-center">
                    <div
                        class="w-10 h-10 rounded-full bg-emerald-100 flex items-center justify-center text-emerald-600 font-bold">
                        D</div>
                    <div class="ml-3">
                        <p class="text-sm font-bold text-slate-900">Dina Lestari</p>
                        <p class="text-xs text-slate-500">Karyawan</p>
                    </div>
                </div>
            </div>
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 relative">
                <svg class="absolute top-6 right-6 w-8 h-8 text-indigo-100" fill="currentColor" viewBox="0 0 32 32">
                    <path
                        d="M9.352 4C4.456 7.456 1 13.12 1 19.36c0 5.088 3.072 8.064 6.624 8.064 3.36 0 5.856-2.688 5.856-5.856 0-3.168-2.208-5.472-5.088-5.472-.576 0-1.344.096-1.536.192.48-3.264 3.552-7.104 6.624-9.024L9.352 4zm16.512 0c-4.8 3.456-8.256 9.12-8.256 15.36 0 5.088 3.072 8.064 6.624 8.064 3.264 0 5.856-2.688 5.856-5.856 0-3.168-2.304-5.472-5.184-5.472-.576 0-1.248.096-1.44.192.48-3.264 3.456-7.104 6.528-9.024L25.864 4z">
                    </path>
                </svg>
                <p class="text-slate-600 mb-6 relative z-10 italic">"Desain web yang memanjakan mata dan sistem pencarian
                    yang sangat cepat. Sangat direkomendasikan!"</p>
                <div class="flex items-center">
                    <div
                        class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 font-bold">
                        R</div>
                    <div class="ml-3">
                        <p class="text-sm font-bold text-slate-900">Rizky Pratama</p>
                        <p class="text-xs text-slate-500">Tech Enthusiast</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
