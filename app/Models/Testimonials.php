<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonials extends Model
{
    protected $table = 'testimonials';

    protected $fillable = [
        'name',
        'role',
        'image',
        'description',
        'status',
    ];

}
