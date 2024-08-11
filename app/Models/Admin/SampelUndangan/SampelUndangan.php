<?php

namespace App\Models\Admin\SampelUndangan;

use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Template\KategoriTemplate;
use App\Models\Admin\SampelUndangan\Kategori\Wedding;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SampelUndangan extends Model
{
    use HasFactory;

    protected $table = 'admin__undangan';
    protected $fillable = [
        'judul_undangan',
        'link_undangan',
        'cover',
        'audio',
        'kategori_id',
    ];

    public function kategori()
    {
        return $this->belongsTo(KategoriTemplate::class, 'kategori_id','id');
    }
 
    public function userWedding()
    {
        return $this->belongsTo(Wedding::class, 'wedding_id');
    }

}
