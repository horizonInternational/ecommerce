<?php

namespace App\Http\Controllers\Backend;

use App\Travellers;
use App\User;
use App\Users;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TravellersController extends Controller
{
    public function index()
    {
        $travellers = Travellers::orderBy('travellers_id', 'DESC')->paginate(10);
        return view('backend.traveller.list_traveller', compact('travellers'));
    }


    public function create()
    {
        return view('backend.traveller.create_traveller');
    }


    public function store(Request $request)
    {

        if ($request->isMethod('get')) {
            return redirect()->back();
        }
        $traveller = new Travellers();
        $user = new User();
        $this->validate($request,
            [
                // 'name' => 'required',
                // 'address' => 'required',
                // 'contact' => 'required',
                'email' => 'required|unique:travellers,email',
                'password' => 'required|confirmed',
                //'profile'=>'required',
                //'image'=>'required'
            ]);
        $data['name'] = $request->name;
        $data['address'] = $request->address;
        $data['contact'] = $request->contact;
        $data['email'] = $request->email;
        $user_data['email'] = $request->email;
        $data['password'] = $request->password;
        $user_data['password'] = $request->password;
        $user_data['user_type'] = 'traveller';
        if ($request->hasFile('image')) {
            $destination = public_path("img/traveller");
            $file = $request->image;
            $extension = $file->getClientOriginalExtension();
            $filename = str_random() . "." . $extension;
            $file->move($destination, $filename);
            $data['image'] = $filename;
        }
        if ($user->create($user_data) && $traveller->create($data)) {
            return redirect()->route('travellers')->with('success', 'The record has been successfully inserted.');
        }
        return redirect()->route('travellers')->with('error', 'Sorry, the record couldn\'t be stored');

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        if (!$request->id) {
            return redirect()->back();
        }
        $travellerId = $request->id;
        $traveller = Travellers::where('travellers_id', $travellerId)->first();
        return view('backend.traveller.view_traveller', compact('traveller'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        if (!$request->id) {
            return redirect()->back();
        }
        $travellerId = $request->id;
        $traveller = Travellers::where('travellers_id', $travellerId)->first();
        return view('backend.traveller.edit_traveller', compact('traveller'));
    }


    public function update(Request $request)
    {
        if ($request->isMethod('get')) {
            return redirect()->route('travellers');
        }
        $travellerId = $request->id;
        $this->validate($request,
            [
                'name' => 'required',
                'contact' => 'required|numeric',
                'address' => 'required'
            ]);
        $data['name'] = $request->name;
        $data['contact'] = $request->contact;
        $data['address'] = $request->address;
        $traveller = Travellers::where('travellers_id', $travellerId)->first();
        if ($request->hasFile('image')) {
            $destination = public_path("img/traveller");
            $file = $request->image;
            $extension = $file->getClientOriginalExtension();
            $filename = str_random() . "." . $extension;
            $file->move($destination, $filename);
            $data['image'] = $filename;
        } else {
            $data['image'] = $traveller->image;
        }
        if (Travellers::where('travellers_id', $travellerId)->update($data)) {
            return redirect()->route('travellers')->with('success', 'The record has been successfully updated');
        }
        return redirect()->route('travellers')->with('error', 'Sorry, the record couldn\'t be updated.');

    }

    public function destroy(Request $request)
    {
        if (!$request->id) {
            return redirect()->back();
        }
        $travellerId = $request->id;
        $traveller = Travellers::where('travellers_id', $travellerId)->first();
        if ($this->deleteWithImage($travellerId) && Travellers::where('travellers_id', $travellerId)->delete() && Users::where('email', $traveller->email)->delete()) {
            return redirect()->route('travellers')->with('success', 'The record was successfully deleted');
        }
        return redirect()->route('travellers')->with('error', 'Sorry,the record couldn\'t be deleted');
    }


    public function deleteWithImage($id)
    {
        $travellerId = $id;
        $traveller = Travellers::where('travellers_id', $travellerId)->first();
        $image = $traveller->image;
        $imagePath = public_path('img/traveller/' . $image);
        if (file_exists($imagePath) && is_file($imagePath)) {
            return unlink($imagePath);
        }
        return true;
    }


}
