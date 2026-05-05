@extends('layouts.admin')

@section('content')
    <div class="mb-10 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold text-slate-900 tracking-tight">Manajemen Member</h1>
            <p class="mt-2 text-slate-500">Daftar pengguna (Pengunjung) perpustakaan dan aktivitas mereka.</p>
        </div>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50/50">
                        <th class="px-8 py-5 text-xs font-semibold text-slate-500 uppercase tracking-wider border-b border-slate-100">Info Member</th>
                        <th class="px-8 py-5 text-xs font-semibold text-slate-500 uppercase tracking-wider border-b border-slate-100">Bergabung Sejak</th>
                        <th class="px-8 py-5 text-xs font-semibold text-slate-500 uppercase tracking-wider border-b border-slate-100">Status Pinjaman</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100/80">
                    @forelse($members as $member)
                        <tr class="even:bg-slate-50/50 hover:bg-slate-50 transition-colors">
                            <td class="px-8 py-4">
                                <div class="flex items-center gap-4">
                                    <div class="w-10 h-10 rounded-full bg-indigo-50 flex items-center justify-center text-indigo-600 font-bold shrink-0 border border-indigo-100">
                                        {{ substr($member->name, 0, 1) }}
                                    </div>
                                    <div>
                                        <p class="text-sm font-bold text-slate-900">{{ $member->name }}</p>
                                        <p class="text-xs text-slate-500 mt-0.5">{{ $member->email }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-8 py-4">
                                <p class="text-sm text-slate-700">{{ $member->created_at->format('d M Y') }}</p>
                                <p class="text-xs text-slate-400 mt-0.5">{{ $member->created_at->diffForHumans() }}</p>
                            </td>
                            <td class="px-8 py-4">
                                @if($member->active_loans_count > 0)
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-medium bg-amber-100 text-amber-800">
                                        <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span>
                                        {{ $member->active_loans_count }} Pinjaman Aktif
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-slate-100 text-slate-600">
                                        0 Pinjaman Aktif
                                    </span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="px-8 py-10 text-center text-slate-500">
                                <svg class="mx-auto h-12 w-12 text-slate-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                                Belum ada pengunjung yang terdaftar.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($members->hasPages())
            <div class="px-8 py-4 border-t border-slate-100 bg-slate-50/50">
                {{ $members->links() }}
            </div>
        @endif
    </div>
@endsection
