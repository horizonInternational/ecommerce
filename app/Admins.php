<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admins extends Model
{
    protected $fillable=['contact','email','password','address','user_type','image','profile'];
    protected $table='admins';
    protected $primaryKey='admins_id';

}
