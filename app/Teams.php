<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teams extends Model
{
    protected $fillable=['title','post','name','facebook','twitter','image'];

    protected $table='teams';
}
