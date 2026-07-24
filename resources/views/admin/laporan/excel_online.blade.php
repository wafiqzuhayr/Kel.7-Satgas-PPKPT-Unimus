@extends('layouts.admin')

@section('title', 'Excel Online Viewer')
@section('page_title', 'Excel Online Viewer')

@section('content')
<div class="mb-4 flex justify-between items-center">
    <div>
        <h2 class="text-xl font-bold text-[#0f295a]">Spreadsheet Laporan</h2>
        <p class="text-xs text-slate-500">Tampilan ini mirip dengan Microsoft Excel Online. Anda bisa copy, paste, dan mengunduhnya ke Excel.</p>
    </div>
    <div class="flex gap-2">
        <button onclick="spreadsheet.download()" class="inline-flex items-center gap-2 px-4 py-2 bg-emerald-600 hover:bg-emerald-700 text-white rounded-xl text-xs font-bold transition-all shadow-md shadow-emerald-600/20">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" /></svg>
            Download .csv
        </button>
        <a href="{{ route('admin.laporan.index') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-xl text-xs font-bold transition-all border border-slate-200">
            Kembali
        </a>
    </div>
</div>

<div class="bg-white rounded-3xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-slate-200/60 overflow-hidden">
    <div id="spreadsheet" class="w-full overflow-x-auto"></div>
</div>

<!-- Load jSpreadsheet (Excel-like UI) -->
<script src="https://bossanova.uk/jspreadsheet/v4/jexcel.js"></script>
<link rel="stylesheet" href="https://bossanova.uk/jspreadsheet/v4/jexcel.css" type="text/css" />
<script src="https://jsuites.net/v4/jsuites.js"></script>
<link rel="stylesheet" href="https://jsuites.net/v4/jsuites.css" type="text/css" />

<script>
    var data = [
        @foreach($laporans as $row)
        [
            "{{ $row->id }}",
            "{{ addslashes($row->tipe_pengaduan ?? 'Satgas PPKPT') }}",
            "{{ $row->created_at ? $row->created_at->format('Y-m-d H:i:s') : '' }}",
            "{{ addslashes($row->nama) }}",
            "'{{ $row->no_hp }}",
            "'{{ $row->nik_nim }}",
            "{{ addslashes($row->status_pelapor) }}",
            "{{ addslashes($row->unit_kerja_prodi) }}",
            "{{ addslashes($row->kategori_aduan) }}",
            "{{ addslashes(preg_replace('/\r|\n/', ' ', $row->alasan_pengaduan)) }}",
            "{{ addslashes(preg_replace('/\r|\n/', ' ', $row->kebutuhan_penyintas)) }}",
            "{{ addslashes(preg_replace('/\r|\n/', ' ', $row->waktu_kejadian)) }}",
            "{{ addslashes(preg_replace('/\r|\n/', ' ', $row->tempat_kejadian)) }}",
            "{{ addslashes(preg_replace('/\r|\n/', ' ', $row->kronologi)) }}",
            "{{ addslashes($row->pihak_terlibat ?? '-') }}",
            "{{ $row->bersedia_dihubungi ? 'Ya' : 'Tidak' }}",
            "{{ addslashes($row->status) }}",
            "{{ addslashes(preg_replace('/\r|\n/', ' ', $row->catatan_satgas ?? '-')) }}"
        ],
        @endforeach
    ];

    var spreadsheet = jspreadsheet(document.getElementById('spreadsheet'), {
        data: data,
        columns: [
            { type: 'text', title: 'ID Laporan', width: 100 },
            { type: 'text', title: 'Tipe Pengaduan', width: 120 },
            { type: 'text', title: 'Tanggal Dibuat', width: 150 },
            { type: 'text', title: 'Nama Pelapor', width: 150 },
            { type: 'text', title: 'No. HP', width: 120 },
            { type: 'text', title: 'NIK / NIM', width: 120 },
            { type: 'text', title: 'Status Pelapor', width: 120 },
            { type: 'text', title: 'Unit / Prodi', width: 150 },
            { type: 'text', title: 'Kategori Aduan', width: 150 },
            { type: 'text', title: 'Alasan Pengaduan', width: 200 },
            { type: 'text', title: 'Kebutuhan', width: 150 },
            { type: 'text', title: 'Waktu Kejadian', width: 150 },
            { type: 'text', title: 'Tempat Kejadian', width: 150 },
            { type: 'text', title: 'Kronologi', width: 300 },
            { type: 'text', title: 'Pihak Terlibat', width: 150 },
            { type: 'text', title: 'Bisa Dihubungi?', width: 100 },
            { type: 'text', title: 'Status Laporan', width: 120 },
            { type: 'text', title: 'Catatan Satgas', width: 200 }
        ],
        search: true,
        pagination: 20,
        csvFileName: 'Data_Laporan_Online',
        style: {
            A1: 'background-color: #0f295a; color: white;',
        },
        defaultColAlign: 'left',
    });
</script>
<style>
    /* Styling to match Excel Online vibes */
    .jexcel_content { font-size: 12px; font-family: 'Inter', sans-serif; }
    .jexcel > thead > tr > td { background-color: #f3f4f6; color: #475569; font-weight: 700; border-bottom: 2px solid #e2e8f0; }
</style>
@endsection
