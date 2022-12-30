<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class aduan_file extends Model
{
    use HasFactory;
    protected $fillable = ['id_aduan', 'link'];

    public function aduan()
    {
        return $this->belongsTo(aduan::class, 'id_aduan');
    }
}
