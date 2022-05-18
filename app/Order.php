<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id', 'recipient_phone', 'recipient_address', 'payment', 'comments', 'data',];

    protected $casts = [
        'data' => 'Object',
    ]
}
