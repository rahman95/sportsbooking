<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Auth;
use DateTime;
use Carbon\Carbon;
use App\User;
use Redirect;
use Validator;
use Session;
use Input;
use Hash;

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

        public function edit($id)
    {
        $user = User::find($id);
        if (Auth::user()->name == $user->name){

        return view('editprofile')->with('user', $user);

        }else{
            return Redirect::to('home');
        }

    }

        public function editpass($id)
    {
        $user = User::find($id);
        if (Auth::user()->name == $user->name){

        return view('editpassword')->with('user', $user);

        }else{
            return Redirect::to('home');
        }

    }

        public function update()
    {
        $rules = array(
            'gender' => 'required',
            'dob' => 'required|date'
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {

            Session::flash('error', 'There are errors in the form');
            return Redirect::action('HomeController@edit' , array('id'=>Auth::id()));
        }
        else{

            $id  = Auth::id();
            $user = User::findOrFail($id);
            $user->gender   = Input::get('gender');
            $user->dob = Input::get('dob');

            $user->save();

            Session::flash('message', 'Updated Successfully!');
            return Redirect::action('HomeController@edit' , array('id'=>Auth::id()));
            }
    }

         public function updatepass()
    {
        $rules = array(
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6'
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {

            Session::flash('error', 'There are errors in the form');
            return Redirect::action('HomeController@editpass' , array('id'=>Auth::id()))
                            ->withErrors($validator)
                            ->withInput();
        }
        else{

            $id  = Auth::id();
            $user = User::findOrFail($id);
            $user->password   = Hash::make(Input::get('password'));

            $user->save();

            Session::flash('message', 'Updated Successfully!');
            return Redirect::action('HomeController@index');
            }

    }
         
         public function viewbookings()
    {
        $facilityhistory = \App\Facilities::where('bookedby', Auth::user()->name)->get();
        $classhistory = \App\Classes::where('bookedby', Auth::user()->name)->get();

        return view('viewbookings')->with('facilityhistory', $facilityhistory)->with('classhistory', $classhistory);
    }
}
