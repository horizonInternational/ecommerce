<?php

namespace App\Http\Controllers\Backend;

use App\Menus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MenusController extends Controller
{

    public function index()
    {
        $menus = Menus::orderBy('menus_id', 'DESC')->paginate(8);
        return view('backend.menu.list_menu', compact('menus'));
    }


    public function create()
    {
        $menus=Menus::all();
        return view('backend.menu.create_menu',compact('menus'));
    }


    public function store(Request $request)
    {

        if($request->isMethod('get')){
            return redirect()->back();
        }
        $menu= new Menus();
        $this->validate($request,
            [
                'title' => 'required|regex:/^[a-zA-Z ]+$/',
                'order'=>'numeric'
            ]);
        $data['title'] = $request->title;
        $data['parent_id']=$request->parent_id;
        $data['order']=$request->order;
        $data['url'] = $request->url;
        if($menu->create($data)){
            return redirect()->route('menus')->with('success','The record has been successfully inserted.');
        }
        return redirect()->route('menus')->with('error','Sorry, the record couldn\'t be stored');

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
        $menuId=$request->id;
        $menu = Menus::where('menus_id',$menuId)->first();
        $parent=Menus::where('menus_id',$menu->parent_id)->first();
        return view('backend.menu.view_menu', compact('menu','parent'));
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
        $menuId=$request->id;
        $menu = Menus::where('menus_id',$menuId)->first();
        $menus=Menus::all();
        return view('backend.menu.edit_menu', compact('menu','menus'));
    }


    public function update(Request $request)
    {
        if($request->isMethod('get')){
            return redirect()->route('menus');
        }
        $menuId=$request->id;
        $data['title'] = $request->title;
        $data['url'] = $request->url;
        $data['parent_id']=$request->parent_id;
        $data['order']=$request->order;
        if(Menus::where('menus_id',$menuId)->update($data)){

            return redirect()->route('menus')->with('success','The record has been successfully updated');
        }
        return redirect()->route('menus')->with('error','Sorry, the record couldn\'t be updated.');

    }

    public function destroy(Request $request)
    {
        if (!$request->id) {
            return redirect()->back();
        }
        $menuId = $request->id;
        if ( Menus::where('menus_id',$menuId)->delete()) {
            return redirect()->route('menus')->with('success', 'The record was successfully deleted');
        }
        return redirect()->route('menus')->with('error','Sorry,the record couldn\'t be deleted');

    }



}
