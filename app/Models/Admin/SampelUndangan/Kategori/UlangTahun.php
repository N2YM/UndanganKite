<?php

namespace App\Models\Admin\SampelUndangan\Kategori;

use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\SampelUndangan\SampelUndangan;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UlangTahun extends Model
{
    use HasFactory;
    protected $table = 'ulang_tahun';

    // Kolom yang diizinkan untuk diisi secara massal
    protected $fillable = [
        'font_ultah',
        'countdown_ultah',
        'nama_lengkap_ultah',
        'nama_panggilan_ultah',
        'ulang_tahun_yang_ke',
        'foto_ultah',
        'kontak_penyelenggara_ultah',
        'hari_tanggal_ultah',
        'jam_mulai_ultah',
        'jam_selesai_ultah',
        'link_map',
        'lokasi_acara_ultah',
        'nomor_rek_ultah',
        'ucapan_terima_kasih_ultah',
        'latitude_ultah',
        'longitude_ultah',
        'galeri_ultah'

    ];

    // Kolom yang seharusnya dianggap sebagai tipe tanggal
    // protected $dates = [
    //     'countdown',
    //     'hari_tanggal',
    //     'created_at',
    //     'updated_at'
    // ];
    public function sampelUndangans()
    {
        return $this->hasMany(SampelUndangan::class, 'ulang_tahun_id');
    }

    // Jika Anda ingin menggunakan timestamp otomatis, pastikan untuk mencocokkan dengan kolom di tabel
    // public $timestamps = true;
}
