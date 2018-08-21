<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Routes extends Model
{
    protected $fillable=['title','from','to','city_cover'];
    protected $table='routes';
    protected $primaryKey='routes_id';

    public function buses(){
        return $this->hasMany('App\Buses','routes_id');
    }
}
