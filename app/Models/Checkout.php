<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Checkout extends Model
{
    use HasFactory;

    protected $table = "orders";
    protected $fillable = [
        'user_id',
        'course_id',
        'name',
        'email',
        'phone',
        'address',
        'quantity',
        'price',
        'payment_method',
        'payment_status',
        'stripe_payment_intent_id',
        'stripe_charge_id',
        'stripe_receipt_url',
        'stripe_status',
        'stripe_error_message',
    ];
    public function user()
{
    return $this->belongsTo(User::class);
}

public function course()
{
    return $this->belongsTo(Courses::class);
}

}


