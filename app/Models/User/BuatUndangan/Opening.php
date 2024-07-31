<?php

namespace App\Models\User\BuatUndangan;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Opening extends Model
{
    use HasFactory;
    protected $table = 'opening';

    protected $fillable = [
        'user_id',
        'buat_undangan_id',
        'judul_acara',
        'tanggal_acara',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function undangan() // Sesuaikan nama metode dengan yang digunakan di ModelUndangan
    {
        return $this->belongsTo(ModelUndangan::class, 'id','buat_undangan_id');
    }

}
