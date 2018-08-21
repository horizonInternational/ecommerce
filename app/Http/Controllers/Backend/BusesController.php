<?php

namespace App\Http\Controllers\Backend;

use App\Buses;
use App\Bustypes;
use App\Routes;
use App\Vendors;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BusesController extends Controller
{
    public function index()
    {
        $buses = Buses::orderBy('buses_id', 'DESC')->paginate(8);
        return view('backend.bus.list_bus', compact('buses'));
    }


    public function create()
    {
        $routes=Routes::all();
        $bustypes=Bustypes::all();
        $vendors=Vendors::all();
        return view('backend.bus.create_bus',compact('routes','bustypes','vendors'));
    }


    public function store(Request $request)
    {

        if($request->isMethod('get')){
            return redirect()->back();
        }
        $bus= new buses();
        $this->validate($request,
            [
                'title' => 'required',
            ]);
        $data['title'] = $request->title;
        $data['billbook_no'] = $request->vendors_id;
        $data['vendors_id'] = $request->vendors_id;
        $data['bustypes_id'] = $request->bustypes_id;
        $data['routes_id'] = $request->routes_id;
        $data['image'] = $request->image;
        $data['vehicle_no']=$request->vehicle_no;
        $data['driver1']=$request->driver1;
        $data['driver2']=$request->driver2;
        $data['staff1']=$request->driver1;
        $data['staff2']=$request->driver2;
        $data['contact1']=$request->contact1;
        $data['contact2']=$request->contact2;
        $data['registered_date']=$request->registered_date;
        $data['status']=$request->status;
        if($request->hasFile('image')) {
            $destination = public_path("img/bus");
            $file = $request->image;
            $extension = $file->getClientOriginalExtension();
            $filename=str_random().".".$extension;
            $file->move($destination,$filename);
            $data['image'] = $filename;
        }

        if($bus->create($data)){
            return redirect()->route('buses')->with('success','The record has been successfully inserted.');
        }
        return redirect()->route('buses')->with('error','Sorry, the record couldn\'t be stored');

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
        $busId=$request->id;
        $bus = Buses::where('buses_id',$busId)->first();
        return view('backend.bus.view_bus', compact('bus'));
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
        $busId=$request->id;
        $routes=Routes::all();
        $bustypes=Bustypes::all();
        $vendors=Vendors::all();
        $bus = Buses::where('buses_id',$busId)->first();
        return view('backend.bus.edit_bus', compact('bus','routes','vendors','bustypes'));
    }


    public function update(Request $request)
    {
        if($request->isMethod('get')){
            return redirect()->route('buses');
        }
        $busId=$request->id;
        $this->validate($request,
            [
                'title' => 'required',
            ]);
        $data['title'] = $request->title;
        $data['billbook_no']=$request->billbook_no;
        $data['vendors_id'] = $request->vendors_id;
        $data['bustypes_id'] = $request->bustypes_id;
        $data['routes_id'] = $request->routes_id;
        $data['image'] = $request->image;
        $data['vehicle_no']=$request->vehicle_no;
        $data['driver1']=$request->driver1;
        $data['driver2']=$request->driver2;
        $data['staff1']=$request->driver1;
        $data['staff2']=$request->driver2;
        $data['contact1']=$request->contact1;
        $data['contact2']=$request->contact2;
        $data['contact3']=$request->contact1;
        $data['contact4']=$request->contact2;
        $data['registered_date']=$request->registered_date;
        $data['profile']=$request->profile;
        $bus = Buses::where('buses_id',$busId)->first();
        if($request->hasFile('image')) {
            $destination = public_path("img/bus");
            $file = $request->image;
            $extension = $file->getClientOriginalExtension();
            $filename=str_random().".".$extension;
            $file->move($destination,$filename);
            $data['image'] = $filename;
        }
        else {
            $data['image'] = $bus->image;
        }
        if(Buses::where('buses_id',$busId)->update($data)){
            return redirect()->route('buses')->with('success','The record has been successfully updated');
        }
        return redirect()->route('buses')->with('error','Sorry, the record couldn\'t be updated.');

    }

    public function destroy(Request $request)
    {
        if (!$request->id) {
            return redirect()->back();
        }
        $busId = $request->id;
        if ($this->deleteWithImage($busId) && Buses::where('buses_id',$busId)->delete()) {
            return redirect()->route('buses')->with('success', 'The record was successfully deleted');
        }
        return redirect()->route('buses')->with('error','Sorry,the record couldn\'t be deleted');

    }


    public function deleteWithImage($id)
    {
        $busId = $id;
        $bus = Buses::where('buses_id',$busId)->first();
        $image = $bus->image;
        $imagePath = public_path('img/bus/' . $image);
        if (file_exists($imagePath) && is_file($imagePath)) {
            return unlink($imagePath);
        }
        return true;
    }

}
