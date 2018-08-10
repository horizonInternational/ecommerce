<?php

namespace App\Http\Controllers\Backend;

use App\Banners;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BannersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banners::orderBy('banners_id', 'DESC')->paginate(8);
        return view('backend.banner.list_banner', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.banner.create_banner');
    }


    public function store(Request $request)
    {

        if($request->isMethod('get')){
            return redirect()->back();
        }

        $banner = new Banners();
        $this->validate($request,[
            'image'=>'required'
        ]);
        if($request->hasFile('image')) {

            $destination = public_path("img/banner");
            $file = $request->image;
            $extension = $file->getClientOriginalExtension();
            $filename=str_random().".".$extension;
            $file->move($destination,$filename);
            $data['image'] = $filename;
        }

        if($banner->create($data)){
        return redirect()->route('banners')->with('success','The record has been successfully inserted.');
    }
        return redirect()->route('banners')->with('error','Sorry, the record couldn\'t be stored');

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
        $bannerId=$request->id;
        $banner = Banners::where('banners_id',$bannerId)->first();
        return view('backend.banner.view_banner', compact('banner'));
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
        $bannerId=$request->id;
        $banner = Banners::where('banners_id',$bannerId)->first();

        return view('backend.banner.edit_banner', compact('banner'));
    }


    public function update(Request $request)
    {
        if($request->isMethod('get')){
            return redirect()->route('banners');
        }
        $bannerId=$request->id;
        $banner = Banners::where('banners_id',$bannerId)->first();
        if($request->hasFile('image')) {
            $destination = public_path("img/banner");
            $file = $request->image;
            $extension = $file->getClientOriginalExtension();
            $filename=str_random().".".$extension;
            $file->move($destination,$filename);
            $data['image'] = $filename;
        }
        else {
            $data['image'] = $banner->image;
        }
        if(Banners::where('banners_id',$bannerId)->update($data)){
            session()->flash('success', 'The record has been successfully updated.');
            return $this->index();
        }
        return redirect()->route('banners')->with('error','Sorry, the record couldn\'t be updated.');

    }

    public function destroy(Request $request)
    {
            if (!$request->id) {
                return redirect()->back();
            }
            $bannerId = $request->id;
            if ($this->deleteWithImage($bannerId) && Banners::where('banners_id',$bannerId)->delete()) {
                return redirect()->route('banners')->with('success', 'The record was successfully deleted');
            }
            return redirect()->route('banners')->with('error','Sorry,the record couldn\'t be deleted');


    }


    public function deleteWithImage($id)
    {
        $bannerId = $id;
        $banner = Banners::where('banners_id',$bannerId)->first();
        $image = $banner->image;
        $imagePath = public_path('img/banner/' . $image);
        if (file_exists($imagePath) && is_file($imagePath)) {
            return unlink($imagePath);
        }
        return true;
    }



}
