<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\AsCollection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'ar_name',
        'video_cover',
        'avatar',
        'reviews', // list : img, name , comment
        'ar_reviews', // list : img, name , comment
        'gallery', // list : images
        'description',
        'ar_description',
    ];

    public $casts = [
        'gallery' => AsCollection::class,
        'reviews' => AsCollection::class,
    ];
}
