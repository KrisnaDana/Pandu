<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pandu_help extends Model
{
    use HasFactory;
    protected $fillable = ['pertanyaan', 'jawaban'];
}
