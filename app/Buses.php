<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buses extends Model
{

    protected $fillable = ['title', 'routes_id', 'vehicle_no', 'billbook_no', 'vendors_id', 'bustypes_id',
        'image', 'driver1', 'driver2', 'staff1', 'staff2', 'contact1',
        'contact2', 'contact3', 'contact4', 'registered_date', 'profile'];
    protected $table = 'buses';
    protected $primaryKey='buses_id';

    public function routes()
    {
        return $this->belongsTo('App\Routes', 'routes_id');
    }

    public function vendors()
    {
        return $this->belongsTo('App\Vendors', 'vendors_id');
    }

    public function bustypes()
    {
        return $this->belongsTo('App\Bustypes', 'bustypes_id');
    }

}

