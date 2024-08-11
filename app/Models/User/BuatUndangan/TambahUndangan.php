<?php

namespace App\Models\User\BuatUndangan;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use App\Models\User\BuatUndangan\Opening;
use App\Models\User\BuatUndangan\GaleriWedding;
use App\Models\User\BuatUndangan\ProfilWedding;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TambahUndangan extends Model
{
    use HasFactory;

    protected $table = 'user__tambah_undangan';
    protected $fillable = [
        'kategori_undangan',
        'judul_undangan',
        'cover',
        'audio_undangan',
        'link_undangan',
        'id_user',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
    public function opening()
    {
        return $this->hasOne(Opening::class, 'buat_undangan_id'); // Sesuaikan nama foreign key dengan yang digunakan di model Opening
    }

    public function undanganProfilWedding()
    {
        return $this->hasOne(ProfilWedding::class, 'buat_undangan_id');
    }

    public function detailWedding()
    {
        return $this->hasOne(DetailAcaraUndangan::class, 'buat_undangan_id');
    }
    public function galeriWedding()
    {
        return $this->hasMany(GaleriWedding::class, 'buat_undangan_id');
    }
}
