<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bustypes extends Model
{

    protected $fillable=['title','seat','image'];
    protected $table='bustypes';
}
