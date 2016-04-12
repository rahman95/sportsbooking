<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Input;
use Session;
use Redirect;
use Auth;
use DB;
use Carbon\Carbon;
use PDF;
use App\Classes as Classes;

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

        $dt = Carbon::now();
        $today = $dt->format('Y-m-d');

        $morningfitness = Classes::where('bookingdate', '=', $today)
                     ->where('classtype', '=', "fitness")
                     ->where('bookingtime', '=', "11")
                     ->count();

        $eveningfitness = Classes::where('bookingdate', '=', $today)
                     ->where('classtype', '=', "fitness")
                     ->where('bookingtime', '=', "20")
                     ->count();

        $morningstrength = Classes::where('bookingdate', '=', $today)
                     ->where('classtype', '=', "strength")
                     ->where('bookingtime', '=', "11")
                     ->count();

        $eveningstrength = Classes::where('bookingdate', '=', $today)
                     ->where('classtype', '=', "strength")
                     ->where('bookingtime', '=', "20")
                     ->count();
                     
        $bookingclasses = Classes::all();
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

                $class = new Classes;
                $class->classtype   = Input::get('class');
                $class->bookingdate = $bookingdate;
                $class->bookingtime = Input::get('time');
                $class->bookedby = Auth::user()->id;

                $class->save();

                Session::flash('message', 'Booked Successfully!');
                return Redirect::to('book/class');
            }
            elseif($dtdate != $datenormal){

                $class = new Classes;
                $class->classtype   = Input::get('class');
                $class->bookingdate = $bookingdate;
                $class->bookingtime = Input::get('time');
                $class->bookedby = Auth::user()->id;

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
        $class = Classes::find($id);
        $dt = Carbon::now();
        $today = $dt->format('Y-m-d');

        if(Auth::user()->admin == 1){
            // Admin can see all Bookings
            return view('showclass')->with('class', $class)->with('today', $today);
        }
        elseif (Auth::user()->id == $class->bookedby){
            // Only Person who booked can see booking
            return view('showclass')->with('class', $class)->with('today', $today);
        }
        else{
            return Redirect::to('/home');
        }
    }

    public function edit($id)
    {
        
        $class = Classes::find($id);

        if(Auth::user()->admin == 1){
            // Admin can edit all Bookings
            return view('editclass')->with('class', $class);
        }
        elseif (Auth::user()->id == $class->bookedby){
            // Only Person who booked can edit booking
            return view('editclass')->with('class', $class);
        }
        else{
            return Redirect::to('/home');
        }
    }

    public function update($id)
    {
        $date = Input::get('bookingdate');
        $bookingdate = date("Y-m-d", strtotime($date));
        $datenormal = date("d-m-Y", strtotime($date));
        $dt = Carbon::now();
        $dttime = $dt->format('H:i');
        $dtdate = $dt->format('d-m-Y');

            $rules = array(
            'classtype' => 'required',
            'bookingdate' => 'required|date|after:yesterday',
            'bookingtime' => 'required'
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            Session::flash('error', 'There are error(s) on the Form!');
            return redirect('book/class/edit/' . $id)
                        ->withErrors($validator)
                        ->withInput();
        }
        else{

            if($dtdate == $datenormal && $dttime < Input::get('bookingtime')){

                $class = Classes::findOrFail($id);
                $class->classtype   = Input::get('classtype');
                $class->bookingdate = $bookingdate;
                $class->bookingtime = Input::get('bookingtime');
                $class->bookedby = $class->bookedby;

                $class->save();

                Session::flash('message', 'Updated Successfully!');
                return Redirect::to('book/class/show/' . $class->id);
            }
            elseif($dtdate != $datenormal){

                $class = Classes::findOrFail($id);
                $class->classtype   = Input::get('classtype');
                $class->bookingdate = $bookingdate;
                $class->bookingtime = Input::get('bookingtime');
                $class->bookedby = $class->bookedby;

                $class->save();

                Session::flash('message', 'Updated Successfully!');
                return Redirect::to('book/class/show/' . $class->id);
            }
            else{
                Session::flash('error', 'Booking time cannot be in the Past!');
                return Redirect::to('book/class/edit/' . $id);
            }

        
        }
    }

    public function delete($id)
    {   

        Classes::destroy($id);

        //redirect
        Session::flash('message', 'Successfully deleted Booking!');
        return Redirect::to('/home');
    }

    public function pdf($id)
    {
        $class = Classes::find($id);
        $data = array('class' => $class);

        $pdf = PDF::loadView('pdfclass', $data);
        return $pdf->stream('booking.pdf');
    }
}
