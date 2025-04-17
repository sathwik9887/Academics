<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admissions extends Model
{
    protected $table = 'admissions';

    protected $fillable = [
        'title',
        'prequisities',
        'description',
        'image',
        'status',
    ];
}
