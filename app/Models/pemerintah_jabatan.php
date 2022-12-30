<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pemerintah_jabatan extends Model
{
    use HasFactory;
    protected $fillable = ['jabatan'];

    // Tabel lain
    public function pemerintah()
    {
        return $this->hasMany(pemerintah_data::class);
    }
}
