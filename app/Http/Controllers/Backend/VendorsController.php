<?php

namespace App\Http\Controllers\Backend;

use App\Users;
use App\Vendors;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VendorsController extends Controller
{

    public function index()
    {
        $vendors = Vendors::orderBy('vendors_id', 'DESC')->paginate(10);
        return view('backend.vendor.list_vendor', compact('vendors'));
    }


    public function create()
    {
        return view('backend.vendor.create_vendor');
    }


    public function store(Request $request)
    {

        if ($request->isMethod('get')) {
            return redirect()->back();
        }
        $vendor = new Vendors();
        $user = new Users();
        $this->validate($request,
            [
                // 'name' => 'required',
                // 'address' => 'required',
                // 'contact' => 'required',
                'email' => 'required|unique:vendors,email',
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
        $user_data['user_type'] = 'vendor';
        if ($request->hasFile('image')) {
            $destination = public_path("img/vendor");
            $file = $request->image;
            $extension = $file->getClientOriginalExtension();
            $filename = str_random() . "." . $extension;
            $file->move($destination, $filename);
            $data['image'] = $filename;
        }
        if ($user->create($user_data) && $vendor->create($data)) {
            return redirect()->route('vendors')->with('success', 'The record has been successfully inserted.');
        }
        return redirect()->route('vendors')->with('error', 'Sorry, the record couldn\'t be stored');

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
        $vendorId = $request->id;
        $vendor = Vendors::where('vendors_id', $vendorId)->first();
        return view('backend.vendor.view_vendor', compact('vendor'));
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
        $vendorId = $request->id;
        $vendor = Vendors::where('vendors_id', $vendorId)->first();
        return view('backend.vendor.edit_vendor', compact('vendor'));
    }


    public function update(Request $request)
    {
        if ($request->isMethod('get')) {
            return redirect()->route('vendors');
        }
        $vendorId = $request->id;
        $this->validate($request,
            [
                'name' => 'required',
                'contact' => 'required|numeric',
                'address' => 'required'
            ]);
        $data['name'] = $request->name;
        $data['contact'] = $request->contact;
        $data['address'] = $request->address;
        $vendor = Vendors::where('vendors_id', $vendorId)->first();
        if ($request->hasFile('image')) {
            $destination = public_path("img/vendor");
            $file = $request->image;
            $extension = $file->getClientOriginalExtension();
            $filename = str_random() . "." . $extension;
            $file->move($destination, $filename);
            $data['image'] = $filename;
        } else {
            $data['image'] = $vendor->image;
        }
        if (Vendors::where('vendors_id', $vendorId)->update($data)) {
            return redirect()->route('vendors')->with('success', 'The record has been successfully updated');
        }
        return redirect()->route('vendors')->with('error', 'Sorry, the record couldn\'t be updated.');

    }

    public function destroy(Request $request)
    {
        if (!$request->id) {
            return redirect()->back();
        }
        $vendorId = $request->id;
        $vendor = Vendors::where('vendors_id', $vendorId)->first();
        if ($this->deleteWithImage($vendorId) && Vendors::where('vendors_id', $vendorId)->delete() && Users::where('email', $vendor->email)->delete()) {
            return redirect()->route('vendors')->with('success', 'The record was successfully deleted');
        }
        return redirect()->route('vendors')->with('error', 'Sorry,the record couldn\'t be deleted');
    }


    public function deleteWithImage($id)
    {
        $vendorId = $id;
        $vendor = Vendors::where('vendors_id', $vendorId)->first();
        $image = $vendor->image;
        $imagePath = public_path('img/vendor/' . $image);
        if (file_exists($imagePath) && is_file($imagePath)) {
            return unlink($imagePath);
        }
        return true;
    }


}
