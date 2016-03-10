<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Auth;
use DateTime;

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

        $classbookings = \App\Classes::where('bookingdate', '>=', new DateTime('today'))->where('bookedby', '=', Auth::user()->name)->count();

        $facilitybookings = \App\Facilities::where('bookingdate', '>=', new DateTime('today'))->where('bookedby', '=', Auth::user()->name)->count();

        if($classbookings = "0"){
            $myclass = "No Upcoming Bookings";
        }
        else{
            $myclass = \App\Classes::where('bookingdate', '>=', new DateTime('today'))->where('bookedby', '=', Auth::user()->name)->get();
        }

        if($facilitybookings = "0"){
            $myfacility = "No Upcoming Bookings";
        }
        else{
            $myfacility = \App\Facilities::where('bookingdate', '>=', new DateTime('today'))->where('bookedby', '=', Auth::user()->name)->get();
        }
        return view('home')
        ->with('myclass', $myclass)
        ->with('myfacility', $myfacility);
    }
}
