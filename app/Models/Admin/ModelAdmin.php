<?php

namespace App\Models\Admin;

use Laravel\Sanctum\HasApiTokens;

use Illuminate\Notifications\Notifiable;
use App\Models\Admin\Template\KategoriTemplate;
use Illuminate\Foundation\Auth\User as Authenticatable;

class ModelAdmin extends Authenticatable
{
    use HasApiTokens, Notifiable;
    protected $table = 'admins';
    protected $fillable = [
        'name',
        'email',
        'email_verified_at',
        'password',
        'remember_token',
        'created_at',
        'updated_at',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function kategoriTemplates()
{
    return $this->hasMany(KategoriTemplate::class);
}

}
