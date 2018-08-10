<?php

namespace App\Http\Controllers\Backend;

use App\Blogs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogsController extends Controller
{
    public function index()
    {
        $blogs = Blogs::orderBy('blogs_id', 'DESC')->paginate(8);
        return view('backend.blog.list_blog', compact('blogs'));
    }


    public function create()
    {
        return view('backend.blog.create_blog');
    }


    public function store(Request $request)
    {

        if($request->isMethod('get')){
            return redirect()->back();
        }
        $blog= new Blogs();
        $this->validate($request,
            [
                'title' => 'required',
                'image' => 'required',
                'description' => 'required',
                'posted_by' => 'required',
            ]);
        $data['title'] = $request->title;
        $data['description'] = html_entity_decode(strip_tags($request->description));
        $data['posted_by'] = $request->posted_by;
        if($request->hasFile('image')) {
            $destination = public_path("img/blog");
            $file = $request->image;
            $extension = $file->getClientOriginalExtension();
            $filename=str_random().".".$extension;
            $file->move($destination,$filename);
            $data['image'] = $filename;
        }

        if($blog->create($data)){
            return redirect()->route('blogs')->with('success','The record has been successfully inserted.');
        }
        return redirect()->route('blogs')->with('error','Sorry, the record couldn\'t be stored');

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
        $blogId=$request->id;
        $blog = Blogs::where('blogs_id',$blogId)->first();
        return view('backend.blog.view_blog', compact('blog'));
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
        $blogId=$request->id;
        $blog = Blogs::where('blogs_id',$blogId)->first();

        return view('backend.blog.edit_blog', compact('blog'));
    }


    public function update(Request $request)
    {
        if($request->isMethod('get')){
            return redirect()->route('blogs');
        }
        $blogId=$request->id;

        $data['description'] = $request->description;
        $data['title'] = $request->title;
        $data['posted_by'] = $request->posted_by;

        $blog = Blogs::where('blogs_id',$blogId)->first();
        if($request->hasFile('image')) {
            $destination = public_path("img/blog");
            $file = $request->image;
            $extension = $file->getClientOriginalExtension();
            $filename=str_random().".".$extension;
            $file->move($destination,$filename);
            $data['image'] = $filename;
        }
        else {
            $data['image'] = $blog->image;
        }
        if(Blogs::where('blogs_id',$blogId)->update($data)){

            return redirect()->route('blogs')->with('success','The record has been successfully updated');
        }
        return redirect()->route('blogs')->with('error','Sorry, the record couldn\'t be updated.');

    }

    public function destroy(Request $request)
    {
        if (!$request->id) {
            return redirect()->back();
        }
        $blogId = $request->id;
        if ($this->deleteWithImage($blogId) && Blogs::where('blogs_id',$blogId)->delete()) {
            return redirect()->route('blogs')->with('success', 'The record was successfully deleted');
        }
        return redirect()->route('blogs')->with('error','Sorry,the record couldn\'t be deleted');

    }


    public function deleteWithImage($id)
    {
        $blogId = $id;
        $blog = Blogs::where('blogs_id',$blogId)->first();
        $image = $blog->image;
        $imagePath = public_path('img/blog/' . $image);
        if (file_exists($imagePath) && is_file($imagePath)) {
            return unlink($imagePath);
        }
        return true;
    }


}
