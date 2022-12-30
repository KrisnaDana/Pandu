<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_ktp extends Model
{
    use HasFactory;
    protected $fillable = ['id_user_data', 'ktp_scan', 'ktp_foto'];


    // Tabel Lain
    public function user_data()
    {
        return $this->belongsTo(user_data::class, 'id_user_data');
    }
}
