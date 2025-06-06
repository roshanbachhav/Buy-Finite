<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    protected $table = 'user_address';
    protected $fillable = ['user_id', 'user_full_name', 'user_email', 'user_mobile_number', 'user_house', 'user_city', 'state_id', 'user_zipcode'];
}