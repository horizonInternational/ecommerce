<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendors extends Model
{
    protected $table='vendors';
    protected $fillable=['name','email','profile','password','image','contact','address'];
    protected $primaryKey='vendors_id';

    public function buses(){
        return $this->hasMany('App\Buses','vendors_id');
    }
}
