<?php

namespace App\Models\Admin\Template;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;


use App\Models\Admin\Template\KategoriTemplate;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ModelTemplate extends Model
{
    use HasFactory;

    protected $table = 'admin__template';

    protected $fillable = [
            'judul',
            'kategori_tmp',
            'cover',
    ];
    
    public function kategori()
    {
        return $this->belongsTo(KategoriTemplate::class, 'kategori_id'); // Pastikan nama field foreign key sesuai
    }
}
