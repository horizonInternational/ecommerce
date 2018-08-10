<?php

namespace App\Http\Controllers\Backend;

use App\Teams;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeamsController extends Controller
{
    public function index()
    {
        $teams = Teams::orderBy('teams_id', 'DESC')->paginate(8);
        return view('backend.team.list_team', compact('teams'));
    }


    public function create()
    {
        return view('backend.team.create_team');
    }


    public function store(Request $request)
    {

        if($request->isMethod('get')){
            return redirect()->back();
        }
        $team= new Teams();
        $this->validate($request,
            [
                'name' => 'required',
                'post' => 'required',
                'image' => 'required',
            ]);
        $data['title']=$request->title;
        $data['name'] = $request->name;
        $data['post'] = $request->post;
        $data['title'] = $request->title;
        $data['twitter'] = $request->twitter;
        $data['facebook'] = $request->facebook;
        if($request->hasFile('image')) {
            $destination = public_path("img/team");
            $file = $request->image;
            $extension = $file->getClientOriginalExtension();
            $filename=str_random().".".$extension;
            $file->move($destination,$filename);
            $data['image'] = $filename;
        }

        if($team->create($data)){
            return redirect()->route('teams')->with('success','The record has been successfully inserted.');
        }
        return redirect()->route('teams')->with('error','Sorry, the record couldn\'t be stored');

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
        $teamId=$request->id;
        $team = Teams::where('teams_id',$teamId)->first();
        return view('backend.team.view_team', compact('team'));
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
        $teamId=$request->id;
        $team = Teams::where('teams_id',$teamId)->first();
        return view('backend.team.edit_team', compact('team'));
    }


    public function update(Request $request)
    {
        if($request->isMethod('get')){
            return redirect()->route('teams');
        }
        $teamId=$request->id;
        $data['name']=$request->name;
        $data['title'] = $request->title;
        $data['post'] = $request->post;
        $data['facebook'] = $request->facebook;
        $data['twitter'] = $request->twitter;


        $team = Teams::where('teams_id',$teamId)->first();
        if($request->hasFile('image')) {
            $destination = public_path("img/team");
            $file = $request->image;
            $extension = $file->getClientOriginalExtension();
            $filename=str_random().".".$extension;
            $file->move($destination,$filename);
            $data['image'] = $filename;
        }
        else {
            $data['image'] = $team->image;
        }
        if(Teams::where('teams_id',$teamId)->update($data)){

            return redirect()->route('teams')->with('success','The record has been successfully updated');
        }
        return redirect()->route('teams')->with('error','Sorry, the record couldn\'t be updated.');

    }

    public function destroy(Request $request)
    {
        if (!$request->id) {
            return redirect()->back();
        }
        $teamId = $request->id;
        if ($this->deleteWithImage($teamId) && Teams::where('teams_id',$teamId)->delete()) {
            return redirect()->route('teams')->with('success', 'The record was successfully deleted');
        }
        return redirect()->route('teams')->with('error','Sorry,the record couldn\'t be deleted');

    }


    public function deleteWithImage($id)
    {
        $teamId = $id;
        $team = Teams::where('teams_id',$teamId)->first();
        $image = $team->image;
        $imagePath = public_path('img/team/' . $image);
        if (file_exists($imagePath) && is_file($imagePath)) {
            return unlink($imagePath);
        }
        return true;
    }


}
