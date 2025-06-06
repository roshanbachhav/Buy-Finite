<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    protected $table = 'contact_us';

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone_no',
        'subject',
        'message',
        'read_at',
        'is_resolved',
        'ip_address',
        'user_id'
    ];

    protected $casts = [
        'is_resolved' => 'boolean',
        'read_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}