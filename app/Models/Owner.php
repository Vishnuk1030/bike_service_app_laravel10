<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Owner extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'mobile',
        'password',
        'cnf_password'
    ];
}
