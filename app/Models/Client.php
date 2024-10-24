<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'is_active'];

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
