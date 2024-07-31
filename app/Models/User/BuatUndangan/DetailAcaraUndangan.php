<?php

namespace App\Models\User\BuatUndangan;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use App\Models\User\BuatUndangan\ModelUndangan;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DetailAcaraUndangan extends Model
{
    use HasFactory;
    protected $table = 'detail_acara_wedding';

    protected $fillable = [
        'user_id',
        'buat_undangan_id',
        'acara1',
        'jam_mulai_acara1',
        'jam_selesai_acara1',
        'hari_tanggal_acara1',
        'alamat_gedung_acara1',
        'link_map_acara1',
        'acara2',
        'jam_mulai_acara2',
        'jam_selesai_acara2',
        'hari_tanggal_acara2',
        'alamat_gedung_acara2',
       
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function undangan()
    {
        return $this->belongsTo(ModelUndangan::class, 'buat_undangan_id');
    }
}
