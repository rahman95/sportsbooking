<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Input;
use Session;
use Redirect;
use Auth;
use DateTime;
use DB;

class ClassController extends Controller
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

        $morningfitness = DB::table('class')
                     ->select('*')
                     ->where('bookingdate', '=', new DateTime('today'))
                     ->where('classtype', '=', "fitness")
                     ->where('bookingtime', '=', "11")
                     ->count();

        $eveningfitness = DB::table('class')
                     ->select('*')
                     ->where('bookingdate', '=', new DateTime('today'))
                     ->where('classtype', '=', "fitness")
                     ->where('bookingtime', '=', "20")
                     ->count();

        $morningstrength = DB::table('class')
                     ->select('*')
                     ->where('bookingdate', '=', new DateTime('today'))
                     ->where('classtype', '=', "strength")
                     ->where('bookingtime', '=', "11")
                     ->count();

        $eveningstrength = DB::table('class')
                     ->select('*')
                     ->where('bookingdate', '=', new DateTime('today'))
                     ->where('classtype', '=', "strength")
                     ->where('bookingtime', '=', "20")
                     ->count();
                     
        $bookingclasses = \App\Classes::all();
        return view('bookclass')
        ->with('morningfitness', $morningfitness)
        ->with('eveningfitness', $eveningfitness)
        ->with('morningstrength', $morningstrength)
        ->with('eveningstrength', $eveningstrength);
    }

    public function store()
    {

         $rules = array(
            'type' => 'required',
            'date' => 'required|date|after:yesterday',
            'time' => 'required'
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return redirect('book/class')
                        ->withErrors($validator)
                        ->withInput();
        }
        else{

        $class = new \App\Classes;
        $class->classtype   = Input::get('type');
        $class->bookingdate = Input::get('date');
        $class->bookingtime = Input::get('time');
        $class->bookedby = Auth::user()->name;

        $class->save();

        // redirect ----------------------------------------
        // redirect our user back to the form so they can do it all over again
        Session::flash('message', 'Booked Successfully!');
        return Redirect::to('book/class');
        }

        // Store the blog post...
    }
}
