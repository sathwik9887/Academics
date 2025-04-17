<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    protected $table = 'courses';

    protected $fillable = [
        'courseName',
        'courseHeading',
        'courseText',
        'description',
        'price',
        'image',
        'duration',
        'endDuration',
        'rating',
        'teacherName',
        'status',
    ];
}
