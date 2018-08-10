<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Auth;

class Users extends Auth
{
    protected $fillable=['name','username','email','password','user_type','image'];
    protected $table='users';
}
