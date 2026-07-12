@extends('layouts.admin')

@section('title', 'Data Laporan')
@section('page_title', 'Daftar Semua Laporan')

@section('content')
<div class="bg-white/80 backdrop-blur-xl border border-white/40 rounded-3xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left text-sm whitespace-nowrap">
            <thead class="bg-[#0f295a]/5 text-slate-600 text-[10px] font-black uppercase tracking-widest border-b border-slate-200/60">
                <tr>
                    <th class="px-6 py-4 font-bold">ID Laporan</th>
                    <th class="px-6 py-4 font-bold">Tanggal</th>
                    <th class="px-6 py-4 font-bold">Kategori</th>
                    <th class="px-6 py-4 font-bold">Pelapor</th>
                    <th class="px-6 py-4 font-bold">Status</th>
                    <th class="px-6 py-4 font-bold text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 text-slate-700 font-medium">
                @forelse($laporans as $laporan)
                <tr class="hover:bg-white/60 transition-colors group">
                    <td class="px-6 py-4">
                        <span class="font-bold text-[#0f295a]">{{ $laporan->id }}</span>
                    </td>
                    <td class="px-6 py-4">{{ $laporan->created_at->format('d M Y, H:i') }}</td>
                    <td class="px-6 py-4">{{ $laporan->kategori_aduan }}</td>
                    <td class="px-6 py-4">
                        {{ $laporan->nama }}
                    </td>
                    <td class="px-6 py-4">
                        <span class="inline-flex items-center gap-1.5 rounded-full px-2.5 py-1 text-[10px] font-bold uppercase tracking-wider
                            @if($laporan->status == 'Menunggu') bg-amber-50 text-amber-600
                            @elseif($laporan->status == 'Diproses') bg-blue-50 text-blue-600
                            @elseif($laporan->status == 'Selesai') bg-emerald-50 text-emerald-600
                            @endif">
                            {{ $laporan->status }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-right">
                        <a href="{{ route('admin.laporan.show', $laporan->id) }}" class="inline-flex items-center gap-1.5 bg-slate-100 hover:bg-slate-200 text-slate-700 px-3 py-1.5 rounded-lg text-xs font-bold transition-colors">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
                            Detail
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-12 text-center text-slate-400 font-bold">Belum ada data laporan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    <div class="px-6 py-4 border-t border-slate-100">
        {{ $laporans->links() }}
    </div>
</div>
@endsection
