<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    public $table = 'order';

    public $fillable = [
        'product',
        'mail',
        'sex',
        'name',
        'phone_number',
        'address',
        'province',
        'orderId',
        'total_price',
    ];

}
