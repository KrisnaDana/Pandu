<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class aduan_kategori extends Model
{
    use HasFactory;
    protected $fillable = ['kategori'];

    // Tabel Lain
    public function aduan()
    {
        return $this->hasMany(aduan::class);
    }
}
