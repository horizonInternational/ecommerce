<?php

namespace App\Http\Controllers\Frontend;

use App\Bustypes;
use App\Travellers;
use App\Users;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SiteController extends Controller
{


    public function index()
    {
        return view('frontend.index');
    }

    public function about()
    {
        return view('frontend.about');
    }

    public function faq()
    {
        return view('frontend.faq');
    }

    public function contact()
    {
        return view('frontend.contact');
    }

    public function search(Request $request)
    {
        if (!isset($request->from) && !isset($request->to)) {
            return redirect()->back();
        }

        //for checkbox to be selected incase filter appllied
        $bustype = isset($request->bustype)?$request->bustype:'';
        $arrival_time = isset($request->arrival_time)?$request->arrival_time:'';
        $price = isset($request->price)?$request->price:'';

        //catching data from user input to display search routes
        $to = $request->to;
        $from = $request->from;
        $route = $from . "-" . $to;
        $departure_date = $request->departure_date;
        echo $departure_date;die;
        $arrival_date = $request->arrival_date;
        $seat = $request->seat;
        $results = DB::table('schedules')
            ->join('buses', 'schedules.buses_id', '=', 'buses.buses_id')
            ->join('routes', 'buses.routes_id', '=', 'routes.routes_id')
            ->join('bustypes', 'buses.bustypes_id', '=', 'bustypes.bustypes_id')
            ->select('schedules.*', 'buses.*', 'routes.*', 'buses.title as bustitle','bustypes.title as bustypes_title')
            ->where([
                ['routes.title', 'LIKE', '%' . $route . '%'],
                ])
            ->whereDate('schedules.departure_date','>',$departure_date)
            ->get();
        $count = count($results, COUNT_RECURSIVE);
        $bustypes = Bustypes::all();
        return view('frontend.searches', compact('results', 'from', 'to', 'count', 'bustypes', 'departure_date', 'arrival_date', 'seat','bustype','arrival_time','price'));
    }

    public function searchFilter(Request $request)
    {
        if (!isset($request->arrival_time) && !isset($request->bustype) && !isset($request->price)) {
            return redirect()->route('search');
        }
        //for checkbox to be selected incase filter appllied
        $bustype = isset($request->bustype)?$request->bustype:'';
        $arrival_time = isset($request->arrival_time)?$request->arrival_time:'';
        $price = isset($request->price)?$request->price:'';

        //catching form data of hidden inputs
        $from = $request->from;
        $to = $request->to;
        $route = $from . "-" . $to;
        $departure_date = $request->departure_date;
        $arrival_date = $request->arrival_date;
        $seat = $request->seat;

        if ($arrival_time == 'before') {
            $op = '<=';
        } else {
            $op = '>=';
        }

        if (isset($request->bustype) && !isset($request->arrival_time) && !isset($request->price) ) {
            $results = DB::table('schedules')
                ->join('buses', 'schedules.buses_id', '=', 'buses.buses_id')
                ->join('routes', 'buses.routes_id', '=', 'routes.routes_id')
                ->join('bustypes', 'buses.bustypes_id', '=', 'bustypes.bustypes_id')
                ->select('schedules.*', 'buses.*', 'routes.*', 'bustypes.title as bustitle')
                ->where([
                    ['bustypes.bustypes_id', $bustype],
                    ['routes.title', 'LIKE', '%' . $route . '%']
                ])
                ->get();
        }
        if (isset($request->price) && !isset($request->arrival_time) && !isset($request->bustype)) {
            $results = DB::table('schedules')
                ->join('buses', 'schedules.buses_id', '=', 'buses.buses_id')
                ->join('routes', 'buses.routes_id', '=', 'routes.routes_id')
                ->join('bustypes', 'buses.bustypes_id', '=', 'bustypes.bustypes_id')
                ->select('schedules.*', 'buses.*', 'routes.*', 'bustypes.title as bustitle')
                ->where([
                    ['routes.title', 'LIKE', '%' . $route . '%']
                ])
                ->orderBy('schedules.ticket_price',$price)
                ->get();
        }
        if (!isset($request->bustype) && isset($request->arrival_time) && !isset($request->price)) {
            $results = DB::table('schedules')
                ->join('buses', 'schedules.buses_id', '=', 'buses.buses_id')
                ->join('routes', 'buses.routes_id', '=', 'routes.routes_id')
                ->join('bustypes', 'buses.bustypes_id', '=', 'bustypes.bustypes_id')
                ->select('schedules.*', 'buses.*', 'routes.*', 'bustypes.title as bustitle')
                ->where([
                    ['routes.title', 'LIKE', '%' . $route . '%'],
                    ['schedules.departure_time', $op, '10:00']
            ])
                ->get();

        }
        if (isset($request->arrival_time) && isset($request->bustype) && !isset($request->price)) {
            $results = DB::table('schedules')
                ->join('buses', 'schedules.buses_id', '=', 'buses.buses_id')
                ->join('routes', 'buses.routes_id', '=', 'routes.routes_id')
                ->join('bustypes', 'buses.bustypes_id', '=', 'bustypes.bustypes_id')
                ->select('schedules.*', 'buses.*', 'routes.*', 'bustypes.title as bustitle')
                ->where([
                    ['routes.title', 'LIKE', '%' . $route . '%'],
                    ['bustypes.bustypes_id', $bustype],
                    ['schedules.departure_time', $op, '10:00']
                ])
                ->get();
        }
        if (!isset($request->arrival_time) && isset($request->bustype) && isset($request->price)) {
            $results = DB::table('schedules')
                ->join('buses', 'schedules.buses_id', '=', 'buses.buses_id')
                ->join('routes', 'buses.routes_id', '=', 'routes.routes_id')
                ->join('bustypes', 'buses.bustypes_id', '=', 'bustypes.bustypes_id')
                ->select('schedules.*', 'buses.*', 'routes.*', 'bustypes.title as bustitle')
                ->where([
                    ['routes.title', 'LIKE', '%' . $route . '%'],
                    ['bustypes.bustypes_id', $bustype],
                ])
                ->orderBy('schedules.ticket_price',$price)
                ->get();

        }
        if (isset($request->arrival_time) && !isset($request->bustype) && isset($request->price)) {
            $results = DB::table('schedules')
                ->join('buses', 'schedules.buses_id', '=', 'buses.buses_id')
                ->join('routes', 'buses.routes_id', '=', 'routes.routes_id')
                ->join('bustypes', 'buses.bustypes_id', '=', 'bustypes.bustypes_id')
                ->select('schedules.*', 'buses.*', 'routes.*', 'bustypes.title as bustitle')
                ->where([
                    ['routes.title', 'LIKE', '%' . $route . '%'],
                    ['schedules.departure_time', $op, '10:00']
                ])
                ->orderBy('schedules.ticket_price',$price)
                ->get();
        }
        if (isset($request->arrival_time) && isset($request->bustype) && isset($request->price)) {
            $results = DB::table('schedules')
                ->join('buses', 'schedules.buses_id', '=', 'buses.buses_id')
                ->join('routes', 'buses.routes_id', '=', 'routes.routes_id')
                ->join('bustypes', 'buses.bustypes_id', '=', 'bustypes.bustypes_id')
                ->select('schedules.*', 'buses.*', 'routes.*', 'buses.title as bustitle','bustypes.title as bustypes_title')
                ->where([
                    ['buses.bustypes_id',$bustype],
                ])
                ->orderBy('schedules.ticket_price',$price)
                ->get();
        }

        $count = count($results, COUNT_RECURSIVE);
        $bustypes = Bustypes::all();
        return view('frontend.searches', compact('results', 'from', 'to', 'count', 'bustypes', 'departure_date', 'arrival_date', 'seat','bustype','arrival_time','price'));
    }

    public function profile()
    {
        if (Auth::guest() | Auth::user()->user_type != 'traveller') {
            return redirect()->route('home');
        }
        $travellerEmail = Auth::user()->email;
        $traveller = Travellers::where('email', $travellerEmail)->first();
        return view('frontend.profile', compact('traveller'));
    }

    public function editProfile()
    {
        if (Auth::guest() | Auth::user()->user_type != 'traveller') {
            return redirect()->route('home');
        }
        $travellerEmail = Auth::user()->email;
        $traveller = Travellers::where('email', $travellerEmail)->first();
        return view('frontend.profileedit', compact('traveller'));
    }

    public function updateProfile(Request $request)
    {
        if (Auth::guest()) {
            return redirect()->route('home');
        }
        if ($request->isMethod('get')) {
            return view('frontend.profile');
        }
        if ($request->isMethod('post')) {
            $travellerEmail = Auth::user()->email;
            $this->validate($request,
                [
                    'name' => 'required',
                    'contact' => 'required|numeric',
                    'address' => 'required'
                ]);
            $data['name'] = $request->name;
            $data['contact'] = $request->contact;
            $data['address'] = $request->address;
            $traveller = Travellers::where('email', $travellerEmail)->first();
            if ($request->hasFile('image')) {
                $destination = public_path("img/traveller");
                $file = $request->image;
                $extension = $file->getClientOriginalExtension();
                $filename = str_random() . "." . $extension;
                $file->move($destination, $filename);
                $data['image'] = $filename;
            }
            if (Travellers::where('email', $travellerEmail)->update($data)) {
                return redirect()->route('profile')->with('success', 'Your account has been successfully updated');
            }
            return redirect()->route('profile')->with('error', 'Sorry, the account couldn\'t be updated.');

        }

    }

    public function history()
    {
        return view('frontend.history');
    }

    public function registerUser(Request $request)
    {
        if (Auth::user()) {
            return redirect()->route('profile');
        }
        if ($request->isMethod('get')) {
            return redirect()->back();
        }
        $traveller = new Travellers();
        $user = new Users();
        $this->validate($request,
            [
                'email' => 'required|unique:travellers,email',
                'password' => 'required|confirmed',

            ]);

        $data['email'] = $request->email;
        $user_data['email'] = $request->email;
        $data['password'] = $request->password;
        $user_data['password'] = $request->password;
        $user_data['user_type'] = 'traveller';

        if ($user->create($user_data) && $traveller->create($data)) {

            return view('frontend.index')->with('success', 'The record has been successfully inserted.');
        }
        return view('frontend.index')->with('error', 'Sorry, the record couldn\'t be stored');

    }

    public function loginUser(Request $request)
    {
        if ($request->isMethod('get')) {
            return redirect()->route('home');
        }
        $email = $request->email;
        $password = $request->password;
        $remember = isset($request->remember) ? true : false;
        if (Auth::attempt(['email' => $email, 'password' => $password], $remember)) {
            if (Auth::user()->user_type == 'traveller') {
                $data['profile'] = 'active';
                Travellers::where('email', Auth::user()->email)->update($data);
                return redirect()->route('home');
            }
        }
        return redirect()->back()->with('error', 'Invalid username and password');
    }

    public function userLogout()
    {
        Auth::logout();
        return redirect()->route('home');
    }


}
