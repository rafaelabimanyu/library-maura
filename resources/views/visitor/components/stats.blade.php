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
