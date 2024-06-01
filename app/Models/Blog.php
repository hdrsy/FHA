<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\AsCollection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    public $guarded = ['id', 'created_at', 'updated_at'];
    public $casts = [
        'images' => AsCollection::class
    ];

    public function category () {
        return $this->belongsTo(Category::class);
    }

}
