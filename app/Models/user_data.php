<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_data extends Model
{
    use HasFactory;
    protected $fillable = ['nik', 'nama', 'tanggal_lahir', 'no_telepon', 'alamat', 'id_user'];

    public function user_ktp()
    {
        return $this->hasMany(user_ktp::class);
    }

    // Tabel Lain
    public function userr()
    {
        return $this->belongsTo(userr::class, 'id_user');
    }
}
