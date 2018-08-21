<?php

namespace App\Http\Controllers\Backend;

use App\Guests;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GuestsController extends Controller
{
    public function index()
    {
        $guests = Guests::orderBy('guests_id', 'DESC')->paginate(10);
        //$guests= DB::table('guests')->skip(1)->take(1)->get();
        return view('backend.guest.list_guest', compact('guests'));
    }

    public function create()
    {
        return view('backend.guest.create_guest');
    }


    public function store(Request $request)
    {

        if ($request->isMethod('get')) {
            return redirect()->back();
        }
        $guest = new Guests();
        $this->validate($request,
            [

            ]);
        $data['name'] = $request->name;
        $data['contact'] = $request->contact;
        if ( $guest->create($data)) {
            return redirect()->route('guests')->with('success', 'The record has been successfully inserted.');
        }
        return redirect()->route('guests')->with('error', 'Sorry, the record couldn\'t be stored');

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
        $guestId = $request->id;
        $guest = Guests::where('guests_id', $guestId)->first();
        return view('backend.guest.view_guest', compact('guest'));
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
        $guestId = $request->id;
        $guest = Guests::where('guests_id', $guestId)->first();
        return view('backend.guest.edit_guest', compact('guest'));
    }


    public function update(Request $request)
    {
        if ($request->isMethod('get')) {
            return redirect()->route('guests');
        }
        $guestId = $request->id;
        $this->validate($request,
            [
                'name' => 'required',
                'contact' => 'required|numeric',
            ]);
        $data['name'] = $request->name;
        $data['contact'] = $request->contact;
        if (Guests::where('guests_id', $guestId)->update($data)) {
            return redirect()->route('guests')->with('success', 'The record has been successfully updated');
        }
        return redirect()->route('guests')->with('error', 'Sorry, the record couldn\'t be updated.');
    }

    public function destroy(Request $request)
    {
        if (!$request->id) {
            return redirect()->back();
        }
        $guestId = $request->id;
        if ( Guests::where('guests_id', $guestId)->delete()) {
            return redirect()->route('guests')->with('success', 'The record was successfully deleted');
        }
        return redirect()->route('guests')->with('error', 'Sorry,the record couldn\'t be deleted');
    }

}
