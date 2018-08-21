<?php

namespace App\Http\Controllers\Backend;

use App\Admins;
use App\Users;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminsController extends Controller
{
    public function index()
    {
        $admins = Admins::orderBy('admins_id', 'DESC')->paginate(10);
        return view('backend.admin.list_admin', compact('admins'));
    }


    public function create()
    {
        return view('backend.admin.create_admin');
    }


    public function store(Request $request)
    {
        if ($request->isMethod('get')) {
            return redirect()->back();
        }
        $admin = new Admins();
        $user = new Users();
        $this->validate($request,
            [
                // 'name' => 'required',
                // 'address' => 'required',
                'contact' => 'numeric',
                'email' => 'required|unique:admins,email',
                'password' => 'required|confirmed',
                //'profile'=>'required',
                //'image'=>'required'
            ]);
        $data['address'] = $request->address;
        $data['contact'] = $request->contact;
        $data['email'] = $request->email;
        $user_data['email'] = $request->email;
        $data['password'] = $request->password;
        $user_data['password'] = $request->password;
        $user_data['user_type'] = 'admin';
        if ($request->hasFile('image')) {
            $destination = public_path("img/admin");
            $file = $request->image;
            $extension = $file->getClientOriginalExtension();
            $filename = str_random() . "." . $extension;
            $file->move($destination, $filename);
            $data['image'] = $filename;
        }
        if ($user->create($user_data) && $admin->create($data)) {
            return redirect()->route('admins')->with('success', 'The record has been successfully inserted.');
        }
        return redirect()->route('admins')->with('error', 'Sorry, the record couldn\'t be stored');

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
        $adminId = $request->id;
        $admin = Admins::where('admins_id', $adminId)->first();
        return view('backend.admin.view_admin', compact('admin'));
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
        $adminId = $request->id;
        $admin = Admins::where('admins_id', $adminId)->first();
        return view('backend.admin.edit_admin', compact('admin'));
    }


    public function update(Request $request)
    {
        if ($request->isMethod('get')) {
            return redirect()->route('admins');
        }
        $adminId = $request->id;
        $this->validate($request,
            [
                'contact' => 'required|numeric',
                'address' => 'required'
            ]);
        $data['contact'] = $request->contact;
        $data['address'] = $request->address;
        $admin = Admins::where('admins_id', $adminId)->first();
        if ($request->hasFile('image')) {
            $destination = public_path("img/admin");
            $file = $request->image;
            $extension = $file->getClientOriginalExtension();
            $filename = str_random() . "." . $extension;
            $file->move($destination, $filename);
            $data['image'] = $filename;
        } else {
            $data['image'] = $admin->image;
        }
        if (Admins::where('admins_id', $adminId)->update($data)) {
            return redirect()->route('admins')->with('success', 'The record has been successfully updated');
        }
        return redirect()->route('admins')->with('error', 'Sorry, the record couldn\'t be updated.');

    }

    public function destroy(Request $request)
    {
        if (!$request->id) {
            return redirect()->back();
        }

        $adminId = $request->id;
        $admin = Admins::where('admins_id', $adminId)->first();
        if ($this->deleteWithImage($adminId) && Admins::where('admins_id', $adminId)->delete() && Users::where('email', $admin->email)->delete()) {
            return redirect()->route('admins')->with('success', 'The record was successfully deleted');
        }
        return redirect()->route('admins')->with('error', 'Sorry,the record couldn\'t be deleted');
    }


    public function deleteWithImage($id)
    {
        $adminId = $id;
        $admin = Admins::where('admins_id', $adminId)->first();
        $image = $admin->image;
        $imagePath = public_path('img/admin/' . $image);
        if (file_exists($imagePath) && is_file($imagePath)) {
            return unlink($imagePath);
        }
        return true;
    }


}
