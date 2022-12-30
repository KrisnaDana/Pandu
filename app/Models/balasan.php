<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class balasan extends Model
{
    use HasFactory;
    protected $fillable = ['id_pemerintah', 'id_aduan', 'balasan', 'waktu'];

    public function pemerintah()
    {
        return $this->belongsTo(pemerintah::class, 'id_pemerintah');
    }

    public function aduan()
    {
        return $this->belongsTo(aduan::class, 'id_aduan');
    }

    // Tabel Lain
    public function balasan_file()
    {
        return $this->hasMany(balasan_file::class);
    }
}
