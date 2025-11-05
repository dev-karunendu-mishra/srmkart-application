<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class SellerListing extends Model
{
    use HasFactory;
    protected $fillable = ['uuid', 'name', 'mobile', 'email', 'product_name', 'description', 'additional_details', 'category', 'condition', 'price', 'max_price', 'status'];

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
