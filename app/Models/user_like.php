<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_like extends Model
{
    use HasFactory;

    protected $fillable = ["like_status", "id_user", "id_aduan"];

    public function userr()
    {
        return $this->belongsTo(userr::class, 'id_user');
    }

    public function aduan()
    {
        return $this->belongsTo(aduan::class, 'id_aduan');
    }
}
