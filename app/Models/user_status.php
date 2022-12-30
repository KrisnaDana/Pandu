<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_status extends Model
{
    use HasFactory;
    protected $fillable = ['status', 'id_user'];

    // Tabel Lain
    public function userr()
    {
        return $this->belongsTo(userr::class, 'id_user');
    }
}
