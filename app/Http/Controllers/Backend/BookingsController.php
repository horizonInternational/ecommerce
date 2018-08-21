<?php

namespace App\Http\Controllers\Backend;

use App\Bookings;
use App\Buses;
use App\Guests;
use App\Travellers;
use App\Vendors;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookingsController extends Controller
{

    public function index()
    {
        $bookings =Bookings::orderBy('bookings_id', 'DESC')->paginate(8);
        return view('backend.booking.list_booking', compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $buses=Buses::all();
        $guests=Guests::all();
        $travellers=Travellers::all();
        return view('backend.booking.create_booking',compact('guests','buses','travellers'));
    }

    public function store(Request $request)
    {
        if($request->isMethod('get')){
            return redirect()->back();
        }

        $booking = new Bookings();
        $this->validate($request,[
            'buses_id'=>'required',
            'seat'=>'required',
            'price'=>'required',
            'profile'=>'required'
        ]);
        $data['travellers_id']= $request->travellers_id;
        $data['guests_id']=$request->guests_id;
        $data['routes_id']=$request->routes_id;
        $data['buses_id']=$request->buses_id;
        $data['price']=$request->price;
        $data['profile']=$request->profile;
        $data['seat']=$request->seat;
        if($booking->create($data)){
            return redirect()->route('bookings')->with('success','The record has been successfully inserted.');
        }
        return redirect()->route('bookings')->with('error','Sorry, the record couldn\'t be stored');

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
        $bookingId=$request->id;
        $booking = Bookings::where('bookings_id',$bookingId)->first();
        return view('backend.booking.view_booking', compact('booking'));
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
        $bookingId=$request->id;
        $buses=Buses::all();
        $guests=Guests::all();
        $travellers=Travellers::all();
        $booking = Bookings::where('bookings_id',$bookingId)->first();

        return view('backend.booking.edit_booking', compact('booking','buses','guests','travellers'));
    }


    public function update(Request $request)
    {
        if($request->isMethod('get')){
            return redirect()->booking('bookings');
        }
        $bookingId=$request->id;
        $data['travellers_id']=isset($request->travellers_id)? $request->travellers_id:0;
        $data['guests_id']=isset($request->guests_id)?$request->guests_id:0;
        $data['buses_id']=$request->buses_id;
        $data['price']=$request->price;
        $data['profile']=$request->profile;
        $data['seat']=$request->seat;
        if(Bookings::where('bookings_id',$bookingId)->update($data)){
            return redirect()->route('bookings')->with('success','The record has been successfully inserted');
        }
        return redirect()->route('bookings')->with('error','Sorry, the record couldn\'t be updated.');

    }

    public function destroy(Request $request)
    {
        if (!$request->id | $request->isMethod('get')) {
            return redirect()->back();
        }
        $bookingId = $request->id;
        if ( Bookings::where('bookings_id',$bookingId)->delete()) {
            return redirect()->route('bookings')->with('success', 'The record was successfully deleted');
        }
        return redirect()->route('bookings')->with('error','Sorry,the record couldn\'t be deleted');


    }


}
