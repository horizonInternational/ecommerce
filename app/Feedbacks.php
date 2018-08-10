<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedbacks extends Model
{
    protected $fillable=['fname','lname','email','message','phone'];


    protected $table='feedbacks';
}
