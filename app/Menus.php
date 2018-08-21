<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Menus extends Model
{
    protected $fillable=['title','parent_id','url','order'];
    protected $table='menus';
    protected $primaryKey='menus_id';
}
