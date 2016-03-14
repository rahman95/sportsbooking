<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Auth;
use DateTime;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dt = Carbon::now();
        $dtdate = $dt->format('Y-m-d');

        $classbookings = \App\Classes::where('bookingdate', '>=', $dtdate)->where('bookedby', '=', Auth::user()->name)->count();

        $facilitybookings = \App\Facilities::where('bookingdate', '>=', $dtdate)->where('bookedby', '=', Auth::user()->name)->count();

        $facilityhistory = \App\Facilities::where('bookedby', Auth::user()->name)->get();

        $classhistory = \App\Classes::where('bookedby', Auth::user()->name)->get();

        if($classbookings == "0"){
            $myclass = "No Upcoming Bookings";
        }
        else{
            $myclass = \App\Classes::where('bookingdate', '>=', $dtdate)->where('bookedby', '=', Auth::user()->name)->get();
        }

        if($facilitybookings == "0"){
            $myfacility = "No Upcoming Bookings";
        }
        else{
            $myfacility = \App\Facilities::where('bookingdate', '>=', $dtdate)->where('bookedby', '=', Auth::user()->name)->get();
        }
        return view('home')
        ->with('myclass', $myclass)
        ->with('myfacility', $myfacility)
        ->with('facilityhistory', $facilityhistory)
        ->with('classhistory', $classhistory);
    }
}
