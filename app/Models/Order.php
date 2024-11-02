<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['order_id', 'user_id', 'subtotal', 'discount', 'tax', 'total', 'payment_status', 'items', 'status', 'delivery_status','payment_screenshot'];

    protected $casts = [
        'items' => 'array', // Automatically cast the JSON to an array
    ];

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    public function foodOrder()
    {
        return $this->hasOne(FoodOrder::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->uuid = (string) Str::uuid();

            // Fetch the last order
            $lastOrder = Order::orderBy('id', 'desc')->first();

            // Set the initial order ID
            $nextOrderId = '#SRM1001'; // Default order ID if no records exist

            // If there is a last order, increment the numeric part of the order_id
            if ($lastOrder) {
                // Extract the numeric part, increment it and append it to '#SRM'
                $lastOrderId = intval(str_replace('#SRM', '', $lastOrder->order_id));
                $nextOrderId = '#SRM'.($lastOrderId + 1);
            }

            // Assign the custom order ID to the new order
            $model->order_id = $nextOrderId;
        });
    }
}
