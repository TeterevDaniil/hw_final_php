<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = [
        'id',
        'user_id',
        'product',
        'email',
        'price',
        'product_id',
        'user_name',
        'image'
    ];

    
}
