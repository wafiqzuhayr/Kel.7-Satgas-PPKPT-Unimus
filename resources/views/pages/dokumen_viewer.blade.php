<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }} | Satgas PPKPT UNIMUS</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-900 h-screen w-screen flex flex-col overflow-hidden">
    
    <!-- Top Navigation Bar -->
    <header class="h-16 bg-white border-b border-slate-200 flex items-center justify-between px-4 sm:px-6 shrink-0 shadow-sm z-10">
        <div class="flex items-center gap-4">
            <a href="{{ route('dokumen_resmi') }}" class="inline-flex items-center justify-center gap-2 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 px-4 py-2 text-sm font-bold transition-colors">
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Kembali
            </a>
            
            <div class="hidden sm:block h-6 w-px bg-slate-300"></div>
            
            <h1 class="hidden sm:block text-sm font-bold text-slate-800 truncate max-w-lg" title="{{ $title }}">
                {{ $title }}
            </h1>
        </div>
        
        <a href="{{ asset('dokumen/' . $file) }}" download class="inline-flex items-center gap-2 rounded-xl bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 text-sm font-bold shadow-sm transition-colors">
            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
            </svg>
            <span class="hidden sm:inline">Unduh File</span>
        </a>
    </header>

    <!-- PDF Viewer Area -->
    <main class="flex-1 w-full bg-slate-900 relative">
        <iframe 
            src="{{ asset('dokumen/' . $file) }}#toolbar=0" 
            class="absolute inset-0 w-full h-full border-none"
            title="{{ $title }}">
        </iframe>
    </main>

</body>
</html>
