<?php

namespace App\Models\User\BuatUndangan;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GaleriWedding extends Model
{
    use HasFactory;
    protected $table = 'galeri_wedding';
    protected $fillable = [
        'image_path',
        'user_id',
        'buat_undangan_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the undangan that owns the GaleriWedding.
     */
    public function undangan()
    {
        return $this->belongsTo(ModelUndangan::class, 'undangan_id');
    }
}
