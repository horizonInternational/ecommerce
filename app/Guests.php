<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guests extends Model
{


    protected $fillable=['name','contact'];
    protected $table='guests';
    protected $primaryKey='guests_id';

}
