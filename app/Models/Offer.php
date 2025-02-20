<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{

    protected $fillable = [
        'name', 'phone', 'email', 'amount', 'message', 'seller_name', 'seller_id', 'status'
    ];
}
