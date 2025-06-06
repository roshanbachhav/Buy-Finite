<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id', 'subtotal', 'others_tax', 'total_amount', 'coupon', 'discount', 'full_name', 'email', 'mobile_number', 'house', 'city', 'states_id', 'zipcode', 'shipping_id', 'payment_id', 'status', 'coupon_id'];

    protected $attributes = [
        'status' => 'pending',
    ];

    public function orderItems()
    {
        return $this->hasMany(OrderData::class, 'order_id');
    }

    public function shipping_address()
    {
        return $this->belongsTo(ShippingAddress::class, 'shipping_id');
    }
    public function payments()
    {
        return $this->belongsTo(Payment::class, 'payment_id');
    }
    public function coupons()
    {
        return $this->belongsTo(Coupon::class, 'coupon_id');
    }
    public function state()
    {
        return $this->belongsTo(States::class, 'states_id');
    }

}