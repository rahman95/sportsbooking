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

class FacilityController extends Controller
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
        $pitch1 = \App\Facilities::where('facilitytype', "football1")
                                 ->get();
        $pitch2 = \App\Facilities::where('facilitytype', "football2")
                                 ->get();
        $court1 = \App\Facilities::where('facilitytype', "tennis1")
                                 ->get();
        $court2 = \App\Facilities::where('facilitytype', "tennis2")
                                 ->get();
        $hall   = \App\Facilities::where('facilitytype', "sportshall")
                                 ->get();


        return view('bookfacility')
        ->with('pitch1', $pitch1)
        ->with('pitch2', $pitch2)
        ->with('court1', $court1)
        ->with('court2', $court2)
        ->with('hall', $hall);
    }

    public function store()
    {
        $date = Input::get('date');
        $bookingdate = date("Y-m-d", strtotime($date));
        $dt = Carbon::now();
        $dttime = $dt->format('H:i');

         $rules = array(
            'facility' => 'required',
            'date' => 'required|date|after:yesterday',
            'time' => 'required'
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return redirect('book/facility')
                        ->withErrors($validator)
                        ->withInput();
        }
        else{
            if($dttime < Input::get('time')){

            if (\App\Facilities::where('facilitytype', '=', Input::get('facility'))
            ->where('bookingdate', '=', $bookingdate)
            ->where('bookingtime', '=', Input::get('time'))
            ->exists()){

            Session::flash('error', 'Booking already exists, please choose alternative time!');
            return Redirect::to('book/facility');

           }
            else{

                $facility = new \App\Facilities;
                $facility->facilitytype   = Input::get('facility');
                $facility->bookingdate = $bookingdate;
                $facility->bookingtime = Input::get('time');
                $facility->bookedby = Auth::user()->name;

                $facility->save();

                Session::flash('message', 'Booked Successfully!');
                return Redirect::to('book/facility');

           }
            }
            else{
                Session::flash('error', 'Booking time cannot be in the Past!');
                return Redirect::to('book/facility');
            }

           
        }
    }
}
