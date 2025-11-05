<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class BuyOrder extends Model
{
    use HasFactory;
    protected $fillable = ['uuid', 'order_id', 'name', 'mobile', 'email', 'location', 'hostel', 'estancia', 'abode', 'green_pearl', 'flat_no', 'message', 'slot_deadline'];

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function selletListing()
    {
        return $this->belongsTo(SellerListing::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->uuid = (string) Str::uuid();
        });
    }
}
