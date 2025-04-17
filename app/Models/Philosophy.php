<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Philosophy extends Model
{
    protected $table = 'philosophy';

    protected $fillable = [
        'title',
        'image',
        'description',
        'icon',
        'status',
    ];
}
