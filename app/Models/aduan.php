<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class aduan extends Model
{
    use HasFactory;
    protected $fillable = ['id_aduan_kategori', 'id_aduan_status', 'id_user', 'judul', 'aduan', 'dukungan', 'waktu', 'hide_status'];

    public function aduan_kategori()
    {
        return $this->belongsTo(aduan_kategori::class, 'id_aduan_kategori');
    }

    public function aduan_status()
    {
        return $this->belongsTo(aduan_status::class, 'id_aduan_status');
    }

    public function userr()
    {
        return $this->belongsTo(userr::class, 'id_user');
    }

    // Tabel Lain
    public function aduan_file()
    {
        return $this->hasMany(aduan_file::class);
    }

    public function balasan()
    {
        return $this->hasMany(balasan::class);
    }

    public function user_like()
    {
        return $this->hasMany(userlike::class);
    }
}
