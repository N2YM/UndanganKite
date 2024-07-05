<?php

namespace App\Models;


use App\Models\User\Profile;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Admin\Audio\ModelAudio;
use Illuminate\Notifications\Notifiable;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Admin\Template\KategoriTemplate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;
 protected $table = 'users';
  
 // App\Models\User.php

 public function hasRole($role)
{
    return $this->role === $role;
}
public function isAdmin()
{
    return $this->role === 'admin';
}

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function profile()
    {
        return $this->hasOne(Profile::class, 'id_user');
    }
    public function audios()
    {
        return $this->hasMany(ModelAudio::class);
    }

    public function kategoriTemplates()
    {
        return $this->hasMany(KategoriTemplate::class);
    }

    
}
