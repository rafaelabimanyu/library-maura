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
                @if(request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
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
