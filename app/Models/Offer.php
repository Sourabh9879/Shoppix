<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{

    protected $fillable = [
        'name', 'phone', 'email', 'offer_price','price', 'message', 'seller_name', 'seller_id', 'status','product_id','product_image','product_name'
    ];
}
