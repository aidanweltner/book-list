<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Te7aHoudini\LaravelTrix\Traits\HasTrixRichText;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    use HasTrixRichText;

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
