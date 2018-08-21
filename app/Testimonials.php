<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testimonials extends Model
{
    protected $fillable=['name','post','image','message'];

    protected $table='testimonials';
    protected $primaryKey='testimonials_id';

}
