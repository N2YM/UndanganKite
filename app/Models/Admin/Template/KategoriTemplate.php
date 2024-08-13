<?php

namespace App\Models\Admin\Template;

use Illuminate\Database\Eloquent\Model;

use App\Models\Admin\SampelUndangan\Kategori\Wedding;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KategoriTemplate extends Model
{
    use HasFactory;
    protected $table = 'admin__kategori_template';
    protected $primaryKey = 'id';
    protected $fillable = [
        'kategori_tmp',
      
    ];

    public function weddings()
    {
        return $this->hasMany(Wedding::class, 'kategori_id');
    }
    
}
