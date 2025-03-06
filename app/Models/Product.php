<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'category',
        'image',
        'user_id',
        'user_name',
        'price',
        'desc',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
