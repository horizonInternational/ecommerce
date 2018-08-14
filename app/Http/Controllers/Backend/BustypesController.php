<?php

namespace App\Http\Controllers\Backend;

use App\Bustypes;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BustypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bustypes = Bustypes::orderBy('bustypes_id', 'DESC')->paginate(8);
        return view('backend.bustype.list_bustype', compact('bustypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.bustype.create_bustype');
    }


    public function store(Request $request)
    {

        if($request->isMethod('get')){
            return redirect()->back();
        }

        $bustype = new Bustypes();
        $this->validate($request,[
            'title'=>'required',
            'image'=>'required',
            'seat'=>'required|numeric'
        ]);
        $data['title']=$request->title;
        $data['seat']=$request->seat;
        if($request->hasFile('image')) {
            $destination = public_path("img/bustype");
            $file = $request->image;
            $extension = $file->getClientOriginalExtension();
            $filename=str_random().".".$extension;
            $file->move($destination,$filename);
            $data['image'] = $filename;
        }
        if($bustype->create($data)){
            return redirect()->route('bustypes')->with('success','The record has been successfully inserted.');
        }
        return redirect()->route('bustypes')->with('error','Sorry, the record couldn\'t be stored');

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
        $bustypeId=$request->id;
        $bustype = Bustypes::where('bustypes_id',$bustypeId)->first();

        return view('backend.bustype.view_bustype', compact('bustype'));
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
        $bustypeId=$request->id;
        $bustype = Bustypes::where('bustypes_id',$bustypeId)->first();

        return view('backend.bustype.edit_bustype', compact('bustype'));
    }


    public function update(Request $request)
    {
        if($request->isMethod('get')){
            return redirect()->route('bustypes');
        }
        $bustypeId=$request->id;
        $bustype = Bustypes::where('bustypes_id',$bustypeId)->first();
        $this->validate($request,[

        ]);
        $data['title']=$request->title;
        $data['seat']=$request->seat;
        if($request->hasFile('image')) {
            $destination = public_path("img/bustype");
            $file = $request->image;
            $extension = $file->getClientOriginalExtension();
            $filename=str_random().".".$extension;
            $file->move($destination,$filename);
            $data['image'] = $filename;
        }
        else {
            $data['image'] = $bustype->image;
        }
        if(Bustypes::where('bustypes_id',$bustypeId)->update($data)){
            return redirect()->route('bustypes')->with('success','The record has been successfully updated');
        }
        return redirect()->route('bustypes')->with('error','Sorry, the record couldn\'t be updated.');

    }

    public function destroy(Request $request)
    {
        if (!$request->id) {
            return redirect()->back();
        }
        $bustypeId = $request->id;
        if ($this->deleteWithImage($bustypeId) && Bustypes::where('bustypes_id',$bustypeId)->delete()) {
            return redirect()->route('bustypes')->with('success', 'The record was successfully deleted');
        }
        return redirect()->route('bustypes')->with('error','Sorry,the record couldn\'t be deleted');


    }


    public function deleteWithImage($id)
    {
        $bustypeId = $id;
        $bustype = Bustypes::where('bustypes_id',$bustypeId)->first();
        $image = $bustype->image;
        $imagePath = public_path('img/bustype/'.$image);
        if (file_exists($imagePath) && is_file($imagePath)) {
            return unlink($imagePath);
        }
        return true;
    }
}
