<?php

namespace App\Http\Controllers\Backend;

use App\Buses;
use App\Guests;
use App\Schedules;
use App\Travellers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SchedulesController extends Controller
{
    public function index()
    {
        $schedules =Schedules ::orderBy('schedules_id', 'DESC')->paginate(8);
        return view('backend.schedule.list_schedule', compact('schedules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $buses=Buses::all();
        $travellers=Travellers::all();
        $guests=Guests::all();
        return view('backend.schedule.create_schedule',compact('buses','travellers','guests'));
    }


    public function store(Request $request)
    {

        if($request->isMethod('get')){
            return redirect()->back();
        }

        $schedule = new Schedules();
        $this->validate($request,[
            'departure_date'=>'required',
            'departure_time'=>'required',
            'shift'=>'required',
            'ticket_price'=>'required|numeric'
        ]);

        $data['buses_id']=$request->buses_id;
        $data['departure_date']=$request->departure_date;
        $data['departure_time']=$request->departure_time;
        $data['arrival_date']=$request->arrival_date;
        $data['arrival_time']=$request->arrival_time;
        $data['ticket_price']=$request->ticket_price;
        $data['shift']=$request->shift;
        if($schedule->create($data)){
            return redirect()->route('schedules')->with('success','The record has been successfully inserted.');
        }
        return redirect()->route('schedules')->with('error','Sorry, the record couldn\'t be stored');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        if(!$request->id){
            return redirect()->back();
        }
        $scheduleId=$request->id;
        $schedule = Schedules::where('schedules_id',$scheduleId)->first();
        return view('backend.schedule.view_schedule', compact('schedule'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        if(!$request->id){
            return redirect()->back();
        }
        $scheduleId=$request->id;
        $buses=Buses::all();
        $schedule = Schedules::where('schedules_id',$scheduleId)->first();
        return view('backend.schedule.edit_schedule', compact('schedule','buses'));
    }


    public function update(Request $request)
    {
        if($request->isMethod('get')){
            return redirect()->back();
        }
        $scheduleId=$request->id;
        $data['buses_id']=$request['bus_id'];
        $data['departure_date']=$request['departure_date'];
        $data['departure_time']=$request['departure_time'];
        $data['arrival_date']=$request['arrival_date'];
        $data['arrival_time']=$request['arrival_time'];
        $data['ticket_price']=$request['ticket_price'];
        $data['shift']=$request['shift'];
        if(Schedules::where('schedules_id',$scheduleId)->update($data)){
            return redirect()->route('schedules')->with('success','The record has been successfully inserted');
        }
        return redirect()->route('schedules')->with('error','Sorry, the record couldn\'t be updated.');

    }

    public function destroy(Request $request)
    {
        if (!$request->id | $request->isMethod('get')) {
            return redirect()->back();
        }
        $scheduleId = $request->id;
        if ( Schedules::where('schedules_id',$scheduleId)->delete()) {
            return redirect()->route('schedules')->with('success', 'The record was successfully deleted');
        }
        return redirect()->route('schedules')->with('error','Sorry,the record couldn\'t be deleted');


    }

}
