<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShippingAddress extends Model
{
    protected $table = 'shipping_address';

    public function state()
    {
        return $this->belongsTo(States::class, 'states_id');
    }
}