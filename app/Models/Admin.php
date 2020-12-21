<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $filable = [
        'login', 'password'
    ];

    protected $hidden = ['password'];
    //
}
