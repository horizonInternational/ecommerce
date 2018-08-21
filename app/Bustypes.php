<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bustypes extends Model
{

    protected $fillable=['title','seat','image'];
    protected $guarded=['bustyes_id'];
    protected $table='bustypes';
    protected $primaryKey='bustypes_id';

    public function buses(){
        return $this->hasMany('App\Buses','bustypes_id');
    }
}
