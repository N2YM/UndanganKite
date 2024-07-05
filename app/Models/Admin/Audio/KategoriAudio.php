<?php

namespace App\Models\Admin\Audio;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KategoriAudio extends Model
{
    use HasFactory;
    protected $table = 'kategori__audio';

    protected $fillable = [
            'user_id',
            'kategori_audio',
        ];

        public function user()
        {
            return $this->belongsTo(User::class);
        }
}
