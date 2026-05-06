    <!-- Catalog Section -->
    <div class="bg-slate-50 border-t border-slate-100" id="katalog">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="flex justify-between items-end mb-8">
                <h2 class="text-2xl font-bold text-slate-900">
                    @if(request('search') && request('category'))
                        Hasil Pencarian "{{ request('search') }}" di Kategori {{ ucfirst(request('category')) }}
                    @elseif(request('search'))
                        Hasil Pencarian: "{{ request('search') }}"
                    @elseif(request('category'))
                        Katalog Buku: {{ ucfirst(request('category')) }}
                    @else
                        Katalog Buku Terbaru
                    @endif
                </h2>
                <a href="{{ route('home') }}"
                    class="hidden sm:inline-flex items-center text-sm font-semibold text-indigo-600 hover:text-indigo-800 transition-colors">
                    Lihat Semua Buku
                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>
            </div>

            @if ($books->isEmpty())
                <div class="text-center py-20 bg-white rounded-3xl shadow-sm border border-slate-100 flex flex-col items-center justify-center">
                    <div class="w-24 h-24 bg-slate-50 rounded-full flex items-center justify-center mb-6">
                        <svg class="w-12 h-12 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-2">Buku tidak ditemukan</h3>
                    <p class="text-slate-500 mb-6 max-w-md">Kami tidak dapat menemukan buku yang cocok dengan kata kunci atau filter pencarian Anda. Coba kata kunci lain atau lihat seluruh koleksi kami.</p>
                    <a href="{{ route('home') }}" class="px-6 py-2.5 bg-indigo-50 text-indigo-600 font-semibold rounded-xl hover:bg-indigo-100 transition-colors">Tampilkan semua buku</a>
                </div>
            @else
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                    @foreach ($books as $book)
                        <div
                            class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden flex flex-col hover:shadow-xl hover:scale-105 transition-all duration-300 group">
                            <!-- Placeholder Cover -->
                            <div class="bg-slate-200 relative pb-[133%] overflow-hidden cursor-pointer" @click="selectedBook = {{ json_encode($book) }}; modalOpen = true">
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
                                    @if ($loop->iteration <= 2 && !request('search') && !request('category') && request()->get('page', 1) == 1)
                                        <span
                                            class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-bold bg-indigo-500 text-white shadow-sm">
                                            Baru
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
                                    class="text-lg font-bold text-slate-900 leading-snug mb-1 group-hover:text-indigo-600 transition-colors line-clamp-2 cursor-pointer" @click="selectedBook = {{ json_encode($book) }}; modalOpen = true">
                                    {{ $book->title }}</h3>
                                <p class="text-sm text-slate-500 mb-4">{{ $book->author }}</p>

                                <div class="mt-auto pt-4 border-t border-slate-100">
                                    <button type="button" @click="selectedBook = {{ json_encode($book) }}; modalOpen = true"
                                        class="block w-full text-center px-4 py-2.5 text-sm font-semibold text-indigo-600 bg-indigo-50 hover:bg-indigo-600 hover:text-white rounded-xl transition-colors duration-200">
                                        Lihat Detail
                                    </button>
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
