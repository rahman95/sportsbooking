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
use Carbon\Carbon;

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
        $dt = Carbon::now();
        $dttime = $dt->format('H:i');
        $dtdate = $dt->format('d-m-Y');
        $date = Input::get('date');
        $datenormal = date("d-m-Y", strtotime($date));
        $bookingdate = date("Y-m-d", strtotime($date));


         $rules = array(
            'class' => 'required',
            'date' => 'required|date|after:yesterday',
            'time' => 'required'
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            Session::flash('error', 'There are error(s) on the Form!');
            return redirect('book/class')
                        ->withErrors($validator)
                        ->withInput();
        }
        else{

            if($dtdate == $datenormal && $dttime < Input::get('time')){

                $class = new \App\Classes;
                $class->classtype   = Input::get('class');
                $class->bookingdate = $bookingdate;
                $class->bookingtime = Input::get('time');
                $class->bookedby = Auth::user()->name;

                $class->save();

                Session::flash('message', 'Booked Successfully!');
                return Redirect::to('book/class');
            }
            elseif($dtdate != $datenormal){

                $class = new \App\Classes;
                $class->classtype   = Input::get('class');
                $class->bookingdate = $bookingdate;
                $class->bookingtime = Input::get('time');
                $class->bookedby = Auth::user()->name;

                $class->save();

                Session::flash('message', 'Booked Successfully!');
                return Redirect::to('book/class');
            }
            else{
                Session::flash('error', 'Booking time cannot be in the Past!');
                return Redirect::to('book/class');
            }

        
        }

        }
    public function show($id)
    {
        $class = \App\Classes::find($id);

        // show the view and pass the nerd to it
        return view('showclass')->with('class', $class);
    }

    public function edit($id)
    {
        
        $class = \App\Classes::find($id);

        // show the view and pass the nerd to it
        return view('editclass')->with('class', $class);

    }

    public function update($id)
    {

    }

    public function delete($id)
    {

    }
}
