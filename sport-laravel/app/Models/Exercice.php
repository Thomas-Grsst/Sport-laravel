<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Exercice extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'image',
        'category',
    ];
}
