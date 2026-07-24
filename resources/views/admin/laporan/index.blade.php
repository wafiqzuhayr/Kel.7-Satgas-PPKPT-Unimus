@extends('layouts.admin')

@section('title', 'Data Laporan')
@section('page_title', isset($tipe) ? ($tipe === 'student_safety' ? 'Data Laporan Student Safety' : ($tipe === 'satgas_ppkpt' ? 'Data Laporan Satgas PPKPT' : 'Daftar Semua Laporan')) : 'Daftar Semua Laporan')

@section('content')
<!-- Filter Tabs & Export Excel Action -->
<div class="flex flex-wrap items-center justify-between gap-4 mb-6">
    <div class="flex flex-wrap items-center gap-3">
        <a href="{{ route('admin.laporan.index') }}" class="inline-flex items-center gap-2 px-4.5 py-2.5 rounded-2xl text-xs font-bold transition-all shadow-sm {{ empty($tipe) ? 'bg-[#0f295a] text-white shadow-blue-900/20' : 'bg-white border border-slate-200 text-slate-600 hover:bg-slate-50' }}">
            <span>📋 Semua Laporan</span>
            <span class="px-2 py-0.5 rounded-full text-[10px] {{ empty($tipe) ? 'bg-white/20 text-white' : 'bg-slate-100 text-slate-700' }}">{{ $countAll ?? 0 }}</span>
        </a>
        
        <a href="{{ route('admin.laporan.index', ['tipe' => 'satgas_ppkpt']) }}" class="inline-flex items-center gap-2 px-4.5 py-2.5 rounded-2xl text-xs font-bold transition-all shadow-sm {{ ($tipe ?? '') === 'satgas_ppkpt' ? 'bg-blue-600 text-white shadow-blue-600/20' : 'bg-white border border-slate-200 text-slate-600 hover:bg-slate-50' }}">
            <span>🛡️ Satgas PPKPT</span>
            <span class="px-2 py-0.5 rounded-full text-[10px] {{ ($tipe ?? '') === 'satgas_ppkpt' ? 'bg-white/20 text-white' : 'bg-blue-50 text-blue-700' }}">{{ $countPPKPT ?? 0 }}</span>
        </a>

        <a href="{{ route('admin.laporan.index', ['tipe' => 'student_safety']) }}" class="inline-flex items-center gap-2 px-4.5 py-2.5 rounded-2xl text-xs font-bold transition-all shadow-sm {{ ($tipe ?? '') === 'student_safety' ? 'bg-indigo-600 text-white shadow-indigo-600/20' : 'bg-white border border-slate-200 text-slate-600 hover:bg-slate-50' }}">
            <span>🦺 Student Safety</span>
            <span class="px-2 py-0.5 rounded-full text-[10px] {{ ($tipe ?? '') === 'student_safety' ? 'bg-white/20 text-white' : 'bg-indigo-50 text-indigo-700' }}">{{ $countSafety ?? 0 }}</span>
        </a>
    </div>

    <!-- Tombol Aksi Excel -->
    <div class="flex items-center gap-2">
        <!-- Tombol Buka Excel -->
        <a href="{{ route('admin.laporan.export', ['tipe' => request('tipe')]) }}" target="_blank" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-2xl text-xs font-bold bg-emerald-600 hover:bg-emerald-700 text-white shadow-md shadow-emerald-600/20 hover:-translate-y-0.5 transition-all cursor-pointer" title="Download File Excel / CSV">
            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 10v6m0 0l-3-3m3 3l3-3M3 17V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
            </svg>
            <span>Buka Excel</span>
        </a>

        <!-- Tombol Connect Excel Online -->
        <button type="button" onclick="document.getElementById('excel-online-modal').classList.remove('hidden')" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-2xl text-xs font-bold bg-blue-600 hover:bg-blue-700 text-white shadow-md shadow-blue-600/20 hover:-translate-y-0.5 transition-all cursor-pointer">
            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
            </svg>
            <span>Excel Online API</span>
        </button>
    </div>
</div>
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
                    <td class="px-6 py-4">
                        <div class="font-semibold text-slate-800">{{ $laporan->kategori_aduan }}</div>
                        <span class="inline-block mt-1 text-[9px] font-bold px-2 py-0.5 rounded-full {{ ($laporan->tipe_pengaduan ?? '') == 'Student Safety' ? 'bg-indigo-100 text-indigo-700' : 'bg-blue-100 text-blue-700' }}">
                            {{ $laporan->tipe_pengaduan ?? 'Satgas PPKPT' }}
                        </span>
                    </td>
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

<!-- Modal Petunjuk Excel Online API -->
<div id="excel-online-modal" class="hidden fixed inset-0 z-50 overflow-y-auto bg-slate-900/60 backdrop-blur-sm flex items-center justify-center p-4">
    <div class="bg-white rounded-3xl max-w-xl w-full p-6 md:p-8 shadow-2xl border border-slate-100 relative">
        <button type="button" onclick="document.getElementById('excel-online-modal').classList.add('hidden')" class="absolute top-6 right-6 text-slate-400 hover:text-slate-600 p-2 rounded-full hover:bg-slate-100 transition-colors">
            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>
        </button>

        <div class="flex items-center gap-3 mb-4">
            <div class="h-10 w-10 rounded-2xl bg-emerald-100 text-emerald-700 flex items-center justify-center font-bold text-xl">
                📊
            </div>
            <div>
                <h3 class="text-lg font-black text-[#0f295a]">Integrasi Excel Online API</h3>
                <p class="text-xs text-slate-500 font-medium">Sinkronisasi data laporan otomatis ke Microsoft Excel Online & Google Sheets</p>
            </div>
        </div>

        <div class="space-y-4 my-6 text-xs text-slate-600 font-medium">
            <div class="bg-slate-50 p-4 rounded-2xl border border-slate-200/80">
                <label class="block font-bold text-slate-700 mb-1.5 uppercase tracking-wider text-[10px]">URL API Live Feed (Copy URL Ini):</label>
                <div class="flex items-center gap-2">
                    <input type="text" readonly id="excel-api-url" value="{{ route('api.excel_feed', ['tipe' => request('tipe')]) }}" class="w-full bg-white border border-slate-300 rounded-xl px-3 py-2 text-xs font-mono text-slate-800 focus:outline-none select-all">
                    <button type="button" onclick="navigator.clipboard.writeText(document.getElementById('excel-api-url').value); alert('URL API Excel Online berhasil disalin!');" class="bg-blue-600 hover:bg-blue-700 text-white font-bold px-3.5 py-2 rounded-xl shrink-0 transition-colors">
                        Salin URL
                    </button>
                </div>
            </div>

            <div class="space-y-2">
                <h4 class="font-bold text-slate-800 text-xs uppercase tracking-wider">Cara Pasang di Excel Online / Office 365:</h4>
                <ol class="list-decimal pl-4 space-y-1.5 leading-relaxed text-slate-600">
                    <li>Buka <strong>Microsoft Excel Online / Office 365</strong>.</li>
                    <li>Pilih menu <strong>Data &rarr; From Web (Dari Web)</strong>.</li>
                    <li>Paste URL API di atas, lalu klik <strong>OK / Load</strong>.</li>
                    <li>Excel Online akan otomatis membaca dan memperbarui data laporan secara real-time.</li>
                </ol>
            </div>

            <div class="space-y-2 pt-2 border-t border-slate-100">
                <h4 class="font-bold text-slate-800 text-xs uppercase tracking-wider">Cara Pasang di Google Sheets:</h4>
                <p class="leading-relaxed">Ketikkan rumus berikut pada sel A1 di Google Sheets:</p>
                <code class="block bg-slate-900 text-emerald-400 p-3 rounded-xl font-mono text-[11px] overflow-x-auto select-all">
                    =IMPORTDATA("{{ route('api.excel_feed', ['tipe' => request('tipe')]) }}")
                </code>
            </div>
        </div>

        <div class="text-right pt-2">
            <button type="button" onclick="document.getElementById('excel-online-modal').classList.add('hidden')" class="bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold px-5 py-2.5 rounded-xl text-xs transition-colors">
                Tutup
            </button>
        </div>
    </div>
</div>
@endsection
