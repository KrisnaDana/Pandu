<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pemerintah_data extends Model
{
    use HasFactory;
    protected $fillable = ['nik', 'nip', 'nama', 'tanggal_lahir', 'no_telepon', 'alamat', 'foto', 'id_pemerintah_jabatan', 'id_pemerintah'];

    // Tabel lain
    public function pemerintah()
    {
        return $this->belongsTo(pemerintah::class, 'id_pemerintah');
    }

    public function pemerintah_jabatan()
    {
        return $this->belongsTo(pemerintah_jabatan::class, 'id_pemerintah_jabatan');
    }
}
