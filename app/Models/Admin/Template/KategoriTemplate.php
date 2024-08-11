<?php

namespace App\Models\Admin\Template;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class KategoriTemplate extends Model
{
    use HasFactory;
    protected $table = 'admin__kategori_template';
    protected $primaryKey = 'id';
    protected $fillable = [
        'kategori_tmp',
      
    ];

    
}
