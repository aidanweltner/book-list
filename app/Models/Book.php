<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'title',
        'author',
        'description',
        'image',
        'review',
        'rating',
        'purchase',
        'amazon',
        'completed',
    ];
}
