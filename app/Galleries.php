<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Galleries extends Model
{
   protected $table='galleries';
   protected $fillable=['title','image'];
}
