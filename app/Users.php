<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Auth;

class Users extends Auth
{
    protected $fillable=['email','password','user_type'];
    protected $table='users';
    protected $primaryKey='users_id';

}
