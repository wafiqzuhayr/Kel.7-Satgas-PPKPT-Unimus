<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\BeritaKegiatan;

class BeritaController extends Controller
{
    public function index()
    {
        $berita = BeritaKegiatan::where('is_published', true)->latest()->paginate(9);
        return view('pages.berita.index', compact('berita'));
    }

    public function show($slug)
    {
        $berita = BeritaKegiatan::where('slug', $slug)->where('is_published', true)->firstOrFail();
        return view('pages.berita.show', compact('berita'));
    }
}
