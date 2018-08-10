<?php

namespace App\Http\Controllers\Backend;

use App\Galleries;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GalleriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleries = Galleries::orderBy('galleries_id', 'DESC')->paginate(8);
        return view('backend.gallery.list_gallery', compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.gallery.create_gallery');
    }


    public function store(Request $request)
    {

        if($request->isMethod('get')){
            return redirect()->back();
        }

        $gallery = new Galleries();
        $this->validate($request,[
            'title'=>'required',
            'image'=>'required'
        ]);
        $data['title']=$request->title;
        if($request->hasFile('image')) {

            $destination = public_path("img/gallery");
            $file = $request->image;
            $extension = $file->getClientOriginalExtension();
            $filename=str_random().".".$extension;
            $file->move($destination,$filename);
            $data['image'] = $filename;
        }

        if($gallery->create($data)){
            return redirect()->route('galleries')->with('success','The record has been successfully inserted.');
        }
        return redirect()->route('galleries')->with('error','Sorry, the record couldn\'t be stored');

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
        $galleryId=$request->id;
        $gallery = Galleries::where('galleries_id',$galleryId)->first();
        return view('backend.gallery.view_gallery', compact('gallery'));
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
        $galleryId=$request->id;
        $gallery = Galleries::where('galleries_id',$galleryId)->first();

        return view('backend.gallery.edit_gallery', compact('gallery'));
    }


    public function update(Request $request)
    {
        if($request->isMethod('get')){
            return redirect()->route('galleries');
        }
        $galleryId=$request->id;
        $gallery = Galleries::where('galleries_id',$galleryId)->first();
        $this->validate($request,[
            'title'=>'required',
            'image'=>'mimes:jpeg,jpg,png,gif',
        ]);
        if($request->hasFile('image')) {
            $destination = public_path("img/gallery");
            $file = $request->image;
            $extension = $file->getClientOriginalExtension();
            $filename=str_random().".".$extension;
            $file->move($destination,$filename);
            $data['image'] = $filename;
        }
        else {
            $data['image'] = $gallery->image;
        }
        if(Galleries::where('galleries_id',$galleryId)->update($data)){
//            session()->flash('success', 'The record has been successfully updated.');
            return redirect()->route('galleries')->with('success','The record has been successfully updated');
        }
        return redirect()->route('galleries')->with('error','Sorry, the record couldn\'t be updated.');

    }

    public function destroy(Request $request)
    {
        if (!$request->id) {
            return redirect()->back();
        }
        $galleryId = $request->id;
        if ($this->deleteWithImage($galleryId) && Galleries::where('galleries_id',$galleryId)->delete()) {
            return redirect()->route('galleries')->with('success', 'The record was successfully deleted');
        }
        return redirect()->route('galleries')->with('error','Sorry,the record couldn\'t be deleted');


    }


    public function deleteWithImage($id)
    {
        $galleryId = $id;
        $gallery = Galleries::where('galleries_id',$galleryId)->first();
        $image = $gallery->image;
        $imagePath = public_path('img/gallery/' . $image);
        if (file_exists($imagePath) && is_file($imagePath)) {
            return unlink($imagePath);
        }
        return true;
    }


}
