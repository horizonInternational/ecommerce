<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Travellers extends Model
{

    protected $table='travellers';
    protected $fillable=['name','email','profile','password','image','contact','address'];
    protected $primaryKey='travellers_id';
}
