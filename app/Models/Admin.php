<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;


class Admin extends Authenticatable
{
     protected $guarded = [];
    protected $table = 'admins';

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

}
