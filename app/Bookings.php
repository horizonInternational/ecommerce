<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bookings extends Model
{

    protected $fillable=['buses_id','travellers_id','guests_id','seat','price','profile'];
    protected $primaryKey='bookings_id';

    public function buses()
    {
        return $this->belongsTo('App\Buses','buses_id');
    }

    public function travellers()
    {
        return $this->belongsTo('App\Travellers','travellers_id');
    }

    public function guests()
    {
        return $this->belongsTo('App\Guests','guests_id');
    }
}
