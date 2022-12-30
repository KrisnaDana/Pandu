<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class balasan_file extends Model
{
    use HasFactory;
    protected $fillable = ['id_balasan', 'link'];

    public function balasan()
    {
        return $this->belongsTo(balasan::class, 'id_balasan');
    }
}
