<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class userr extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $fillable = ['email', 'password'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function user_status()
    {
        return $this->hasMany(user_status::class);
    }

    public function user_data()
    {
        return $this->hasMany(user_data::class, 'id_user');
    }

    // Tabel Lain
    public function aduan()
    {
        return $this->hasMany(aduan::class);
    }

    public function user_like()
    {
        return $this->hasMany(user_like::class);
    }
}
