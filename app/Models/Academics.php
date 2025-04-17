<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Academics extends Model
{
    protected $table = 'academics';

    protected $fillable = [
        'title',
        'description',
        'image',
        'icon',
        'status',
    ];
}
