<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blogs extends Model
{
    protected $fillable=['title','image','description','posted_by'];
    protected $table='blogs';
    protected $primaryKey='blogs_id';

}
