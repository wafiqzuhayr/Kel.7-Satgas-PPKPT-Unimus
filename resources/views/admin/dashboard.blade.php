@extends('layouts.admin')

@section('title', 'Dasbor')
@section('page_title', 'Ringkasan Laporan')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <!-- Card 1 -->
    <div class="bg-white rounded-3xl p-6 shadow-sm border border-slate-100 flex items-center gap-4">
        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-slate-50 text-slate-500">
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg>
        </div>
        <div>
            <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">Total Laporan</p>
            <h3 class="text-2xl font-black text-[#0f295a] leading-none mt-1">{{ $totalLaporan }}</h3>
        </div>
    </div>

    <!-- Card 2 -->
    <div class="bg-white rounded-3xl p-6 shadow-sm border border-slate-100 flex items-center gap-4">
        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-amber-50 text-amber-500">
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
        </div>
        <div>
            <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">Menunggu</p>
            <h3 class="text-2xl font-black text-amber-600 leading-none mt-1">{{ $menunggu }}</h3>
        </div>
    </div>

    <!-- Card 3 -->
    <div class="bg-white rounded-3xl p-6 shadow-sm border border-slate-100 flex items-center gap-4">
        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-blue-50 text-blue-500">
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" /></svg>
        </div>
        <div>
            <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">Diproses</p>
            <h3 class="text-2xl font-black text-blue-600 leading-none mt-1">{{ $diproses }}</h3>
        </div>
    </div>

    <!-- Card 4 -->
    <div class="bg-white rounded-3xl p-6 shadow-sm border border-slate-100 flex items-center gap-4">
        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-emerald-50 text-emerald-500">
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
        </div>
        <div>
            <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">Selesai</p>
            <h3 class="text-2xl font-black text-emerald-600 leading-none mt-1">{{ $selesai }}</h3>
        </div>
    </div>
</div>

<!-- Laporan Terbaru -->
<div class="bg-white border border-slate-100 rounded-3xl shadow-sm overflow-hidden">
    <div class="px-6 py-5 border-b border-slate-100 flex items-center justify-between">
        <h2 class="text-sm font-black text-[#0f295a] uppercase tracking-wider">5 Laporan Terbaru</h2>
        <a href="{{ route('admin.laporan.index') }}" class="text-xs font-bold text-blue-600 hover:text-blue-800 transition-colors">Lihat Semua &rarr;</a>
    </div>
    
    <div class="overflow-x-auto">
        <table class="w-full text-left text-sm whitespace-nowrap">
            <thead class="bg-slate-50 text-slate-500 text-xs uppercase tracking-wider">
                <tr>
                    <th class="px-6 py-4 font-bold">ID Laporan</th>
                    <th class="px-6 py-4 font-bold">Tanggal</th>
                    <th class="px-6 py-4 font-bold">Kategori</th>
                    <th class="px-6 py-4 font-bold">Status</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 text-slate-700 font-medium">
                @forelse($laporanTerbaru as $laporan)
                <tr class="hover:bg-slate-50 transition-colors">
                    <td class="px-6 py-4">
                        <a href="{{ route('admin.laporan.show', $laporan->id) }}" class="text-blue-600 hover:underline font-bold">{{ $laporan->id }}</a>
                    </td>
                    <td class="px-6 py-4">{{ $laporan->created_at->format('d M Y') }}</td>
                    <td class="px-6 py-4">{{ $laporan->kategori_aduan }}</td>
                    <td class="px-6 py-4">
                        <span class="inline-flex items-center gap-1.5 rounded-full px-2.5 py-1 text-[10px] font-bold uppercase tracking-wider
                            @if($laporan->status == 'Menunggu') bg-amber-50 text-amber-600
                            @elseif($laporan->status == 'Diproses') bg-blue-50 text-blue-600
                            @elseif($laporan->status == 'Selesai') bg-emerald-50 text-emerald-600
                            @endif">
                            {{ $laporan->status }}
                        </span>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="px-6 py-12 text-center text-slate-400 font-bold">Belum ada laporan yang masuk.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
