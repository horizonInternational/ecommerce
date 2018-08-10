<?php

namespace App\Http\Controllers\Backend;
use App\Testimonials;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TestimonialsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonials = Testimonials::orderBy('testimonials_id', 'DESC')->paginate(8);
        return view('backend.testimonial.list_testimonial', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.testimonial.create_testimonial');
    }


    public function store(Request $request)
    {

        if($request->isMethod('get')){
            return redirect()->back();
        }

        $testimonial = new Testimonials();
        $this->validate($request,[
            'image'=>'required',
            'message'=>'required'
        ]);

        if($request->hasFile('image')) {

            $destination = public_path("img/testimonial");
            $file = $request->image;
            $extension = $file->getClientOriginalExtension();
            $filename=str_random().".".$extension;
            $file->move($destination,$filename);
            $data['image'] = $filename;
        }
        $data['name']=$request['name'];
        $data['post']=$request['post'];
        $data['message']=html_entity_decode(strip_tags($request['message']));

        if($testimonial->create($data)){
            return redirect()->route('testimonials')->with('success','The record has been successfully inserted.');
        }
        return redirect()->route('testimonials')->with('error','Sorry, the record couldn\'t be stored');

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
        $testimonialId=$request->id;
        $testimonial = Testimonials::where('testimonials_id',$testimonialId)->first();
        return view('backend.testimonial.view_testimonial', compact('testimonial'));
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
        $testimonialId=$request->id;
        $testimonial = Testimonials::where('testimonials_id',$testimonialId)->first();

        return view('backend.testimonial.edit_testimonial', compact('testimonial'));
    }


    public function update(Request $request)
    {
        if($request->isMethod('get')){
            return redirect()->route('testimonials');
        }
        $testimonialId=$request->id;
        $testimonial = Testimonials::where('testimonials_id',$testimonialId)->first();
        if($request->hasFile('image')) {
            $destination = public_path("img/testimonial");
            $file = $request->image;
            $extension = $file->getClientOriginalExtension();
            $filename=str_random().".".$extension;
            $file->move($destination,$filename);
            $data['image'] = $filename;
        }
        else {
            $data['image'] = $testimonial->image;
        }
        $data['name']=$request->name;
        $data['post']=$request->post;
        $data['message']=html_entity_decode(strip_tags($request->message));
        if(Testimonials::where('testimonials_id',$testimonialId)->update($data)){
            return redirect()->route('testimonials')->with('success','The record has been successfully inserted');
        }
        return redirect()->route('testimonials')->with('error','Sorry, the record couldn\'t be updated.');

    }

    public function destroy(Request $request)
    {
        if (!$request->id | $request->isMethod('get')) {
            return redirect()->back();
        }
        $testimonialId = $request->id;
        if ($this->deleteWithImage($testimonialId) && Testimonials::where('testimonials_id',$testimonialId)->delete()) {
            return redirect()->route('testimonials')->with('success', 'The record was successfully deleted');
        }
        return redirect()->route('testimonials')->with('error','Sorry,the record couldn\'t be deleted');


    }


    public function deleteWithImage($id)
    {
        $testimonialId = $id;
        $testimonial = Testimonials::where('testimonials_id',$testimonialId)->first();
        $image = $testimonial->image;
        $imagePath = public_path('img/testimonial/' . $image);
        if (file_exists($imagePath) && is_file($imagePath)) {
            return unlink($imagePath);
        }
        return true;
    }
}
