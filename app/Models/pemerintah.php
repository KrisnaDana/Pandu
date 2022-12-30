<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class pemerintah extends Authenticatable
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

    public function pemerintah_data()
    {
        return $this->hasMany(pemerintah_data::class);
    }

    // Tabel Lain
    public function balasan()
    {
        return $this->hasMany(balasan::class);
    }
}
