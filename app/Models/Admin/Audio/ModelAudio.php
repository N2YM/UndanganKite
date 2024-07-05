<?php

namespace App\Models\Admin\Audio;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ModelAudio extends Model
{
    use HasFactory;

    protected $table = 'audio';

    protected $fillable = [
        'user_id',
        'judul',
        'kategori',
        'musik',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function kategoriAudio()
    {
        return $this->belongsTo(KategoriAudio::class,'kategori_audio_id');
    }
}
