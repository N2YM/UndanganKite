<?php

namespace App\Models\Admin\Template;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;


use Illuminate\Database\Eloquent\Factories\HasFactory;

class ModelTemplate extends Model
{
    use HasFactory;

    protected $table = 'template';

    protected $fillable = [
            'judul',
            'cover1',
            'cover2',
            'cover3',
            'cover4',
            'cover5',
            'user_id',
            'kategori_template_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    // Definisikan relasi dengan model Kategori
    public function kategoriTemplate()
    {
        return $this->belongsTo(KategoriTemplate::class,'kategori_template_id');
    }
}
