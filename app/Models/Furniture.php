<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Furniture extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'price', 'rating', 'reviews', 'seo_title', 'seo_keywords', 'seo_description'];

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
