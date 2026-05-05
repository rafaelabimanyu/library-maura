<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Library Maura') }} - Admin Workspace</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-slate-50 text-slate-900" x-data="{ sidebarOpen: false }">
    <div class="flex h-screen overflow-hidden">

        <!-- Mobile sidebar backdrop -->
        <div x-show="sidebarOpen" x-transition:enter="transition-opacity ease-linear duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity ease-linear duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 z-20 bg-slate-900/80 backdrop-blur-sm lg:hidden" @click="sidebarOpen = false" aria-hidden="true" style="display: none;"></div>

        <!-- Sidebar -->
        <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'" class="fixed inset-y-0 left-0 z-30 w-64 flex flex-col overflow-y-auto transition-transform duration-300 ease-in-out bg-slate-900 border-r border-slate-800 lg:translate-x-0 lg:static lg:inset-auto">
            <div class="flex items-center justify-between px-6 py-8">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 group">
                    <div class="p-2 bg-indigo-500/10 rounded-xl group-hover:bg-indigo-500/20 transition-colors">
                        <svg class="w-7 h-7 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                    </div>
                    <span class="text-xl font-bold text-white tracking-tight">Library Maura</span>
                </a>
                <button @click="sidebarOpen = false" class="p-1.5 text-slate-400 rounded-lg lg:hidden hover:text-white hover:bg-slate-800 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>

            <div class="px-4 pb-6 flex-1">
                <p class="px-4 text-xs font-semibold text-slate-500 uppercase tracking-wider mb-2">Menu Utama</p>
                <nav class="space-y-1">
                    <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'bg-gradient-to-r from-indigo-600 to-indigo-500 text-white shadow-md shadow-indigo-500/20' : 'text-slate-300 hover:bg-slate-800/50 hover:text-white' }} flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200 font-medium">
                        <svg class="w-5 h-5 {{ request()->routeIs('admin.dashboard') ? 'text-white' : 'text-slate-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                        Dashboard
                    </a>
                    <a href="{{ route('admin.books.index') }}" class="{{ request()->routeIs('admin.books.*') ? 'bg-gradient-to-r from-indigo-600 to-indigo-500 text-white shadow-md shadow-indigo-500/20' : 'text-slate-300 hover:bg-slate-800/50 hover:text-white' }} flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200 font-medium mt-1">
                        <svg class="w-5 h-5 {{ request()->routeIs('admin.books.*') ? 'text-white' : 'text-slate-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                        Data Buku
                    </a>
                    <a href="#" class="text-slate-300 hover:bg-slate-800/50 hover:text-white flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200 font-medium mt-1">
                        <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path></svg>
                        Sirkulasi Pinjaman
                    </a>
                    <a href="#" class="text-slate-300 hover:bg-slate-800/50 hover:text-white flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200 font-medium mt-1">
                        <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                        Manajemen Member
                    </a>
                </nav>
            </div>
            
            <!-- User Profile in Sidebar -->
            <div class="p-4 mt-auto border-t border-slate-800">
                <div class="flex items-center gap-3 px-4 py-3 rounded-xl bg-slate-800/30">
                    <div class="w-8 h-8 rounded-full bg-indigo-500/20 flex items-center justify-center text-indigo-400 font-bold text-sm shrink-0">
                        {{ substr(Auth::user()->name, 0, 1) }}
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-medium text-white truncate">{{ Auth::user()->name }}</p>
                        <p class="text-xs text-slate-400 truncate">{{ ucfirst(Auth::user()->role) }}</p>
                    </div>
                </div>
            </div>
        </aside>

        <!-- Main content -->
        <div class="flex flex-col flex-1 overflow-hidden bg-slate-50/50">
            <!-- Header -->
            <header class="flex items-center justify-between px-8 py-5 bg-white/80 backdrop-blur-md border-b border-slate-200/80 sticky top-0 z-10">
                <div class="flex items-center gap-4">
                    <button @click="sidebarOpen = true" class="p-2 text-slate-500 rounded-xl lg:hidden hover:bg-slate-100 hover:text-slate-700 transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                    </button>
                </div>
                <div class="flex items-center gap-5 ml-auto">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="flex items-center gap-2 text-sm font-medium text-slate-600 hover:text-red-600 transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                            Log Out
                        </button>
                    </form>
                </div>
            </header>

            <!-- Main section -->
            <main class="flex-1 overflow-x-hidden overflow-y-auto">
                <div class="container px-8 py-10 mx-auto max-w-7xl">
                    @if(session('success'))
                        <div class="mb-8 bg-emerald-50 border border-emerald-200 p-4 rounded-xl flex items-start gap-3" x-data="{ show: true }" x-show="show">
                            <div class="p-1 bg-emerald-100 rounded-lg text-emerald-600 shrink-0">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            </div>
                            <div class="flex-1 pt-0.5">
                                <p class="text-sm font-medium text-emerald-800">{{ session('success') }}</p>
                            </div>
                            <button @click="show = false" class="text-emerald-500 hover:text-emerald-700 p-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                            </button>
                        </div>
                    @endif
                    
                    @if(session('error'))
                        <div class="mb-8 bg-red-50 border border-red-200 p-4 rounded-xl flex items-start gap-3" x-data="{ show: true }" x-show="show">
                            <div class="p-1 bg-red-100 rounded-lg text-red-600 shrink-0">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                            <div class="flex-1 pt-0.5">
                                <p class="text-sm font-medium text-red-800">{{ session('error') }}</p>
                            </div>
                            <button @click="show = false" class="text-red-500 hover:text-red-700 p-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                            </button>
                        </div>
                    @endif

                    @yield('content')
                </div>
            </main>
        </div>
    </div>
</body>
</html>
