<?php

namespace App\Http\Controllers\Backend;

use App\Users;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UsersController extends Controller
{

    public function index()
    {
        $users = Users::orderBy('users_id', 'DESC')->paginate(8);
        return view('backend.user.list_user', compact('users'));
    }

    
    public function create()
    {
        return view('backend.user.create_user');
    }


    public function store(Request $request)
    {

        if($request->isMethod('get')){
            return redirect()->back();
        }
        $user= new Users();
        $this->validate($request,
            [
                //'name' => 'required|min:3',
               // 'username' => 'required|min:3|unique:users,username',
                'email' => 'required|min:6|unique:users,email',
                'password' => 'required|min:4|confirmed',
                'user_type' => 'required',
//                [
//                    'username.required' => 'Username cannot be empty'
//                ]
            ]);
       // $data['name'] = $request->name;
        //$data['username'] = $request->username;
        $data['email'] = $request->email;
        $data['password'] = bcrypt($request->password);
        $data['user_type'] = $request->user_type;
        if($request->hasFile('image')) {
            $destination = public_path("img/user");
            $file = $request->image;
            $extension = $file->getClientOriginalExtension();
            $filename=str_random().".".$extension;
            $file->move($destination,$filename);
            $data['image'] = $filename;
        }

        if($user->create($data)){
            return redirect()->route('users')->with('success','The record has been successfully inserted.');
        }
        return redirect()->route('users')->with('error','Sorry, the record couldn\'t be stored');

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
        $userId=$request->id;
        $user = Users::where('users_id',$userId)->first();
        return view('backend.user.view_user', compact('user'));
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
        $userId=$request->id;
        $user = Users::where('users_id',$userId)->first();

        return view('backend.user.edit_user', compact('user'));
    }


    public function update(Request $request)
    {
        if($request->isMethod('get')){
            return redirect()->route('users');
        }
        $userId=$request->id;
        $this->validate($request,
            [
                'email' => 'required', [
                Rule::unique('users', 'email')->ignore($userId)
            ],
                'user_type' => 'required',
                'image' => 'mimes:jpg,gif,png,jpeg',
                [
                    'email.required' => 'Email cannot be empty'
                ]
            ]);
       // $data['name'] = $request->name;
        //$data['username'] = $request->username;
        $data['email'] = $request->email;
        $data['user_type'] = $request->user_type;


        $user = Users::where('users_id',$userId)->first();
        if($request->hasFile('image')) {
            $destination = public_path("img/user");
            $file = $request->image;
            $extension = $file->getClientOriginalExtension();
            $filename=str_random().".".$extension;
            $file->move($destination,$filename);
            $data['image'] = $filename;
        }
        else {
            $data['image'] = $user->image;
        }
        if(Users::where('users_id',$userId)->update($data)){

            return redirect()->route('users')->with('success','The record has been successfully updated');
        }
        return redirect()->route('users')->with('error','Sorry, the record couldn\'t be updated.');

    }

    public function destroy(Request $request)
    {
        if (!$request->id) {
            return redirect()->back();
        }
        $userId = $request->id;
        if ($this->deleteWithImage($userId) && Users::where('users_id',$userId)->delete()) {
            return redirect()->route('users')->with('success', 'The record was successfully deleted');
        }
        return redirect()->route('users')->with('error','Sorry,the record couldn\'t be deleted');

    }


    public function deleteWithImage($id)
    {
        $userId = $id;
        $user = Users::where('users_id',$userId)->first();
        $image = $user->image;
        $imagePath = public_path('img/user/' . $image);
        if (file_exists($imagePath) && is_file($imagePath)) {
            return unlink($imagePath);
        }
        return true;
    }

    public function login(Request $request)
    {

        if ($request->isMethod('get')) {
            return view('backend.login');
        }
        $email = $request->email;
        $password = $request->password;
        $remember = isset($request->remember) ? true : false;

        if (Auth::attempt(['email' => $email, 'password' => $password], $remember)) {

            return redirect()->route('admin');//gives /admin in route
        }
        return redirect()->back()->with('error', 'Invalid username and password');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }



}
