<?php

namespace App\Models\Admin\SampelUndangan\Kategori;

use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\SampelUndangan\SampelUndangan;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Keagamaan extends Model
{
    use HasFactory;
    protected $table = 'keagamaan';

    protected $fillable = [
        'font_keagamaan',
        'judul_acara_keagamaan',
        'nama_lengkap_keagamaan',
        'foto_keagamaan',
        'nama_ayah_keagamaan',
        'nama_ibu_keagamaan',
        'tgl_acara_keagamaan',
        'jam_mulai_keagamaan',
        'jam_selesai_keagamaan',
        'alamat_acara_keagamaan',
        'countdown_keagamaan',
        'latitude_keagamaan',
        'longitude_keagamaan',
        'link_map_keagamaan',
        'galeri_keagamaan',
        'no_rek',
        'atas_nama',
        'terikasih_keagamaan',
    ];

    public function sampelUndangans()
    {
        return $this->hasMany(SampelUndangan::class, 'ulang_tahun_id');
    }
}
