<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;

    // We are using a string ID (e.g., RPT-12345)
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'user_id',
        'tipe_pengaduan',
        'nama',
        'no_hp',
        'nik_nim',
        'status_pelapor',
        'unit_kerja_prodi',
        'kategori_aduan',
        'alasan_pengaduan',
        'kebutuhan_penyintas',
        'waktu_kejadian',
        'tempat_kejadian',
        'kronologi',
        'pihak_terlibat',
        'bukti_file',
        'bersedia_dihubungi',
        'status',
        'catatan_satgas',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
