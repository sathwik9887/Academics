<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = "contact";

    protected $fillable = [
        'fname',
        'lname',
        'email',
        'phone',
        'message',
    ];
}
