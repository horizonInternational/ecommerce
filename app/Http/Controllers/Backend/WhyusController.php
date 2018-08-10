<?php

namespace App\Http\Controllers\Backend;

use App\Whyus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WhyusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Whyus::orderBy('whyus_id', 'DESC')->paginate(8);
        return view('backend.whyus.list_whyus', compact('items'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.whyus.create_whyus');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $whyus = new Whyus;
        $this->validate($request,[
            'title'=>'required',
            'image'=>'required',
            'description'=>'required',
        ]);
        if($request->hasFile('image')) {
            $destination = "img/whyus";
            $file = $request->image;
            $extension = $file->getClientOriginalName();
            $filename = str_random()."_".$extension;
            $file->move($destination,$filename);
            $data['image']=$filename;
        }

        $data['title'] = $request->title;
        $data['description']= html_entity_decode(strip_tags( $request->description));
        if($whyus->create($data)){
            return redirect()->route('whyus')->with('success','The record has been successfully inserted.');
        }
        return redirect()->route('create')->with('error','Sorry, the record couldn\'t be stored');

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
        $whyusId=$request->id;
        $whyus = Whyus::where('whyus_id',$whyusId)->first();
        return view('backend.whyus.view_whyus', compact('whyus'));
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
        $whyusId=$request->id;
        $whyus = Whyus::where('whyus_id',$whyusId)->first();

        return view('backend.whyus.edit_whyus', compact('whyus'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if($request->isMethod('get')){
            return redirect()->route('whyus');
        }
        $whyusId=$request->id;
        $whyus = Whyus::where('whyus_id',$whyusId)->first();
        if($request->hasFile('image')) {
            $destination = public_path("img/whyus");
            $file = $request->image;
            $extension = $file->getClientOriginalExtension();
            $filename=str_random().".".$extension;
            $file->move($destination,$filename);
            $data['image'] = $filename;
        }
        else {
            $data['image'] = $whyus->image;

        }
        $data['title']=$request->title;
        $data['description']= html_entity_decode(strip_tags( $request->description));
        if(Whyus::where('whyus_id',$whyusId)->update($data)){
          return redirect()->route('whyus')->with('success','The record was successfully inserted');
        }
        return redirect()->route('whyus')->with('error','Sorry, the record couldn\'t be updated.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if (!$request->id | $request->isMethod('get')) {
            return redirect()->back();
        }
        $whyusId = $request->id;
        if ( Whyus::where('whyus_id',$whyusId)->delete()) {
            return redirect()->route('whyus')->with('success', 'The record was successfully deleted');
        }
        return redirect()->route('whyus')->with('error','Sorry,the record couldn\'t be deleted');


    }
}
