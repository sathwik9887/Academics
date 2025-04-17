<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'cart';

    protected $fillable = [
        'user_id',
        'session_id',
    ];

    public function items()
    {
        return $this->hasMany(CartItem::class);
    }


    public function courses()
    {
        return $this->hasManyThrough(Courses::class, CartItem::class, 'cart_id', 'id', 'id', 'course_id')
                    ->withPivot('quantity', 'price')
                    ->withTimestamps();
    }
}

