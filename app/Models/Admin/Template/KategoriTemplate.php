<?php

namespace App\Models\Admin\Template;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Template\ModelTemplate;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KategoriTemplate extends Model
{
    use HasFactory;
    protected $table = 'kategori_template';

    protected $fillable = [
        'user_id',
        'kategori_tmp',
        // tambahkan kolom lain yang perlu diisi secara massal
    ];

    // Definisikan relasi dengan model User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Definisikan relasi dengan model Template
    public function template()
    {
        return $this->hasMany(ModelTemplate::class);
    }
}
