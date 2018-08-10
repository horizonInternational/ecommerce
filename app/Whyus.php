<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Whyus extends Model
{
    protected $fillable=['title','image','description'];

    protected $table='whyus';
}
