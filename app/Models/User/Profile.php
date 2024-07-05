<?php

namespace App\Models\User;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Profile extends Model
{
    use HasFactory;
    protected $table = 'profile';
    protected $fillable = [
        'id_user', 'image', 'kota', 'no_hp', 'alamat'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
