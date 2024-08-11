<?php

namespace App\Models\Admin\Audio;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KategoriAudio extends Model
{
    use HasFactory;
    protected $table = 'admin__kategori_audio';

    protected $fillable = [
            'kategori_audio',
        ];

     
}
