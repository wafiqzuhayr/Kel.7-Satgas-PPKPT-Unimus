<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BeritaKegiatan extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'slug',
        'konten',
        'gambar',
        'is_published',
    ];

    /**
     * Get image URL handling local storage, uploaded base64 data URIs, and external URLs.
     */
    public function getGambarUrlAttribute()
    {
        if (!$this->gambar) {
            return asset('campus1.jpg');
        }
        if (str_starts_with($this->gambar, 'http://') || str_starts_with($this->gambar, 'https://') || str_starts_with($this->gambar, 'data:image') || str_starts_with($this->gambar, '/')) {
            return $this->gambar;
        }
        if (str_starts_with($this->gambar, 'uploads/')) {
            return asset($this->gambar);
        }
        return asset('storage/' . $this->gambar);
    }
}
