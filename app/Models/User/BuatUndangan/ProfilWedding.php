<?php

namespace App\Models\User\BuatUndangan;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProfilWedding extends Model
{
    use HasFactory;
    protected $table = 'undangan_profil_wedding';

    protected $fillable = [
        'user_id',
        'buat_undangan_id',
        'salam_pembuka',
        'cerita_mempelai',
        'nama_mempelai_pria',
        'nama_mempelai_wanita',
        'nama_ayah_mempelai_pria',
        'nama_ibu_mempelai_pria',
        'nama_ayah_mempelai_wanita',
        'nama_ibu_mempelai_wanita',
        'deskripsi_singkat_pasangan',
         'fm_pria',
        'fm_wanita',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function buatUndangan()
    {
        return $this->belongsTo(ModelUndangan::class,'buat_undangan_id');
    }
  
}
