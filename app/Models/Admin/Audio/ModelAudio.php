<?php

namespace App\Models\Admin\Audio;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ModelAudio extends Model
{
    use HasFactory;

    protected $table = 'admin__audio';

    protected $fillable = [
        'judul',
        'kategori_audio',
        'musik',
    ];

    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }
    // public function kategoriAudio()
    // {
    //     return $this->belongsTo(KategoriAudio::class,'kategori_audio_id');
    // }
}
