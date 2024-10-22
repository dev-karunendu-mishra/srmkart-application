<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Furniture extends Model
{
    use HasFactory;

    protected $fillable = ['uuid', 'name', 'description', 'price', 'rating', 'reviews', 'seo_title', 'seo_keywords', 'seo_description'];

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->uuid = (string) Str::uuid();
        });
    }
}
