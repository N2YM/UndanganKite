<?php

namespace App\Models\User\BuatUndangan;

use App\Models\User;
use App\Models\Admin\Audio\ModelAudio;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Template\KategoriTemplate;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ModelUndangan extends Model
{
    use HasFactory;

    protected $table = 'buat_undangan';
    protected $fillable = [
        'kategori_undangan',
        'judul_undangan',
        'cover1',
        'cover2',
        'cover3',
        'cover4',
        'cover5',
        'audio_undangan',
        'link_undangan',
        'id_user',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

}
