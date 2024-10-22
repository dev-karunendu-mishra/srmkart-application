<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FurnitureEnquiry extends Model
{
    use HasFactory;

    protected $fillable = ['furniture_id', 'name', 'mobile', 'email', 'hostel', 'estancia', 'abode', 'flat_no', 'message', 'slot_deadline'];

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}