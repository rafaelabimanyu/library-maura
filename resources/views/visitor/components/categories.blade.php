    <!-- Kategori Populer Section -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <h2 class="text-2xl font-bold text-slate-900 mb-8 text-center sm:text-left">Kategori Populer</h2>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <!-- Category Fiksi -->
            <a href="{{ route('home', ['category' => 'fiksi']) }}"
                class="flex items-center p-4 bg-white border border-slate-100 rounded-2xl hover:border-indigo-500 hover:shadow-md transition-all group {{ request('category') === 'fiksi' ? 'border-indigo-500 ring-2 ring-indigo-500 shadow-md' : '' }}">
                <div
                    class="w-12 h-12 flex items-center justify-center bg-indigo-50 text-indigo-600 rounded-xl group-hover:bg-indigo-600 group-hover:text-white transition-colors {{ request('category') === 'fiksi' ? 'bg-indigo-600 text-white' : '' }}">
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
                class="flex items-center p-4 bg-white border border-slate-100 rounded-2xl hover:border-emerald-500 hover:shadow-md transition-all group {{ request('category') === 'sejarah' ? 'border-emerald-500 ring-2 ring-emerald-500 shadow-md' : '' }}">
                <div
                    class="w-12 h-12 flex items-center justify-center bg-emerald-50 text-emerald-600 rounded-xl group-hover:bg-emerald-600 group-hover:text-white transition-colors {{ request('category') === 'sejarah' ? 'bg-emerald-600 text-white' : '' }}">
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
                class="flex items-center p-4 bg-white border border-slate-100 rounded-2xl hover:border-blue-500 hover:shadow-md transition-all group {{ request('category') === 'teknologi' ? 'border-blue-500 ring-2 ring-blue-500 shadow-md' : '' }}">
                <div
                    class="w-12 h-12 flex items-center justify-center bg-blue-50 text-blue-600 rounded-xl group-hover:bg-blue-600 group-hover:text-white transition-colors {{ request('category') === 'teknologi' ? 'bg-blue-600 text-white' : '' }}">
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
                class="flex items-center p-4 bg-white border border-slate-100 rounded-2xl hover:border-purple-500 hover:shadow-md transition-all group {{ request('category') === 'sains' ? 'border-purple-500 ring-2 ring-purple-500 shadow-md' : '' }}">
                <div
                    class="w-12 h-12 flex items-center justify-center bg-purple-50 text-purple-600 rounded-xl group-hover:bg-purple-600 group-hover:text-white transition-colors {{ request('category') === 'sains' ? 'bg-purple-600 text-white' : '' }}">
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
