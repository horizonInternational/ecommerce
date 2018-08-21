<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedules extends Model
{

    protected $fillable=['buses_id','arrival_time','arrival_date','departure_date','departure_time','shift','ticket_price'];
    protected $table='schedules';
    protected $primaryKey='schedules';
    public function buses(){
        return $this->belongsTo('App\Buses','buses_id');
    }

}
