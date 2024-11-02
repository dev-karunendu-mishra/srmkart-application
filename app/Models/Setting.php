<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description', 'domain', 'logo', 'icon', 'page_header', 'address', 'email', 'mobile', 'facebook', 'twitter', 'linkedin', 'instagram', 'youtube'];
}
