<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'price', 'rating', 'review', 'seo_title', 'seo_keywords', 'seo_description'];

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
