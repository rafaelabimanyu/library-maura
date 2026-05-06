    <!-- Book Detail Modal (Alpine.js) -->
    <div x-show="modalOpen" class="relative z-50" aria-labelledby="modal-title" role="dialog" aria-modal="true" style="display: none;">
        <!-- Backdrop -->
        <div x-show="modalOpen" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
            class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm transition-opacity"></div>

        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                <!-- Modal Panel -->
                <div x-show="modalOpen" @click.away="modalOpen = false" x-transition:enter="ease-out duration-300"
                    x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave="ease-in duration-200"
                    x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    class="relative transform overflow-hidden rounded-3xl bg-white text-left shadow-2xl transition-all sm:my-8 sm:w-full sm:max-w-2xl border border-slate-100">
                    
                    <!-- Close Button -->
                    <div class="absolute right-4 top-4 z-10">
                        <button type="button" @click="modalOpen = false"
                            class="rounded-full bg-white/80 backdrop-blur-md p-2 text-slate-400 hover:text-slate-600 hover:bg-slate-100 focus:outline-none transition-colors shadow-sm">
                            <span class="sr-only">Close</span>
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <div class="flex flex-col md:flex-row">
                        <!-- Image Section -->
                        <div class="md:w-2/5 bg-slate-100 relative min-h-[300px] md:min-h-full">
                            <template x-if="selectedBook && selectedBook.cover_image">
                                <img :src="'/storage/' + selectedBook.cover_image" :alt="selectedBook.title"
                                    class="absolute inset-0 h-full w-full object-cover">
                            </template>
                            <template x-if="selectedBook && !selectedBook.cover_image">
                                <div class="absolute inset-0 flex items-center justify-center bg-slate-100 text-slate-300">
                                    <svg class="w-20 h-20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                </div>
                            </template>
                        </div>
                        
                        <!-- Content Section -->
                        <div class="md:w-3/5 p-8">
                            <div class="mb-4 flex items-center gap-2 flex-wrap">
                                <template x-if="selectedBook && selectedBook.stock > 0">
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-md text-xs font-bold bg-emerald-100 text-emerald-800 uppercase tracking-wider">
                                        Tersedia (<span x-text="selectedBook.stock"></span>)
                                    </span>
                                </template>
                                <template x-if="selectedBook && selectedBook.stock == 0">
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-md text-xs font-bold bg-red-100 text-red-800 uppercase tracking-wider">
                                        Dipinjam
                                    </span>
                                </template>
                                <template x-if="selectedBook && selectedBook.category">
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-md text-xs font-bold bg-slate-100 text-slate-600 uppercase tracking-wider" x-text="selectedBook.category.name">
                                    </span>
                                </template>
                            </div>

                            <h3 class="text-2xl font-bold text-slate-900 mb-2 leading-tight" id="modal-title" x-text="selectedBook ? selectedBook.title : ''"></h3>
                            <p class="text-lg text-slate-500 mb-6 font-medium" x-text="selectedBook ? selectedBook.author : ''"></p>

                            <div class="space-y-4 mb-8">
                                <div class="flex border-b border-slate-100 pb-3">
                                    <span class="text-slate-500 w-1/3 text-sm">Penerbit</span>
                                    <span class="text-slate-900 font-medium text-sm w-2/3" x-text="selectedBook && selectedBook.publisher ? selectedBook.publisher : '-'"></span>
                                </div>
                                <div class="flex border-b border-slate-100 pb-3">
                                    <span class="text-slate-500 w-1/3 text-sm">Tahun Terbit</span>
                                    <span class="text-slate-900 font-medium text-sm w-2/3" x-text="selectedBook && selectedBook.year ? selectedBook.year : '-'"></span>
                                </div>
                                <div class="flex border-b border-slate-100 pb-3">
                                    <span class="text-slate-500 w-1/3 text-sm">ISBN</span>
                                    <span class="text-slate-900 font-medium text-sm w-2/3" x-text="selectedBook && selectedBook.isbn ? selectedBook.isbn : '-'"></span>
                                </div>
                            </div>
                            
                            <template x-if="selectedBook && selectedBook.description">
                                <div class="mb-8">
                                    <h4 class="text-sm font-bold text-slate-900 mb-2">Sinopsis</h4>
                                    <p class="text-sm text-slate-600 leading-relaxed" x-text="selectedBook.description"></p>
                                </div>
                            </template>

                            <div class="mt-auto">
                                @auth
                                    <template x-if="selectedBook && selectedBook.stock > 0">
                                        <form action="#" method="POST" class="w-full">
                                            @csrf
                                            <input type="hidden" name="book_id" :value="selectedBook.id">
                                            <button type="submit" class="w-full inline-flex justify-center items-center px-6 py-3.5 border border-transparent text-base font-bold rounded-xl shadow-md text-white bg-indigo-600 hover:bg-indigo-700 hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all">
                                                Pinjam Sekarang
                                            </button>
                                        </form>
                                    </template>
                                    <template x-if="selectedBook && selectedBook.stock == 0">
                                        <button type="button" disabled class="w-full inline-flex justify-center items-center px-6 py-3.5 border border-transparent text-base font-bold rounded-xl text-slate-500 bg-slate-100 cursor-not-allowed">
                                            Stok Habis
                                        </button>
                                    </template>
                                @else
                                    <div class="bg-indigo-50 rounded-xl p-4 text-center border border-indigo-100">
                                        <p class="text-sm text-indigo-800 mb-3 font-medium">Anda harus login untuk meminjam buku ini.</p>
                                        <a href="{{ route('login') }}" class="inline-block px-5 py-2 bg-indigo-600 text-white text-sm font-semibold rounded-lg hover:bg-indigo-700 transition-colors shadow-sm">Log In Sekarang</a>
                                    </div>
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
