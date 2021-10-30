<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
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

    public function path($append = '')
    {
        $path = route('book', $this->slug);
        
        return $append ? "{$path}{$append}" : $path;
    }
}
