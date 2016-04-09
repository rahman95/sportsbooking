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
use App\Facilities as Facilities;

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
        $dt = Carbon::now();
        $today = $dt->format('Y-m-d');

        $pitch1 = Facilities::where('facilitytype', "football1")
                                 ->where('bookingdate', $today)
                                 ->get();
        $pitch2 = Facilities::where('facilitytype', "football2")
                                 ->where('bookingdate', $today)
                                 ->get();
        $court1 = Facilities::where('facilitytype', "tennis1")
                                 ->where('bookingdate', $today)
                                 ->get();
        $court2 = Facilities::where('facilitytype', "tennis2")
                                 ->where('bookingdate', $today)
                                 ->get();
        $hall   = Facilities::where('facilitytype', "sportshall")
                                 ->where('bookingdate', $today)
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
        $datenormal = date("d-m-Y", strtotime($date));
        $dt = Carbon::now();
        $dttime = $dt->format('H:i');
        $dtdate = $dt->format('d-m-Y');

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

            if($dtdate == $datenormal && $dttime < Input::get('time')){

                $facility = new Facilities;
                $facility->facilitytype   = Input::get('facility');
                $facility->bookingdate = $bookingdate;
                $facility->bookingtime = Input::get('time');
                $facility->bookedby = Auth::user()->id;

                $facility->save();

                Session::flash('message', 'Booked Successfully!');
                return Redirect::to('book/facility');
            }
            elseif($dtdate != $datenormal){

                $facility = new Facilities;
                $facility->facilitytype   = Input::get('facility');
                $facility->bookingdate = $bookingdate;
                $facility->bookingtime = Input::get('time');
                $facility->bookedby = Auth::user()->id;

                $facility->save();

                Session::flash('message', 'Booked Successfully!');
                return Redirect::to('book/facility');
            }
            else{
                Session::flash('error', 'Booking time cannot be in the Past!');
                return Redirect::to('book/facility');
            }

        
        }
    }

     public function show($id)
    {
        $facility = Facilities::find($id);
        $dt = Carbon::now();
        $today = $dt->format('Y-m-d');

        // show the view and pass the nerd to it
        return view('showfacility')->with('facility', $facility)->with('today', $today);
    }

    public function edit($id)
    {
        
        $facility = Facilities::find($id);

        // show the view and pass the nerd to it
        return view('editfacility')->with('facility', $facility);

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
            'facilitytype' => 'required',
            'bookingdate' => 'required|date|after:yesterday',
            'bookingtime' => 'required'
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return redirect('book/facility/edit/' . $id)
                        ->withErrors($validator)
                        ->withInput();
        }
        else{
            if($dtdate == $datenormal && $dttime < Input::get('bookingtime')){

                if (Facilities::where('facilitytype', '=', Input::get('facilitytype'))
                ->where('bookingdate', '=', $bookingdate)
                ->where('bookingtime', '=', Input::get('bookingtime'))
                ->exists()){

                Session::flash('error', 'Booking time already taken');
                return Redirect::to('book/facility/edit/' . $id);

               }
                else{

                    $facility = Facilities::findOrFail($id);
                    $facility->facilitytype   = Input::get('facilitytype');
                    $facility->bookingdate = $bookingdate;
                    $facility->bookingtime = Input::get('bookingtime');
                    $facility->bookedby = Auth::user()->id;
                    $facility->save();

                    Session::flash('message', 'Booking Successfully Updated');
                    return Redirect::to('book/facility/show/' . $id);
               }
            }
            else{
                Session::flash('error', 'Booking time cannot be in the Past!');
                return Redirect::to('book/facility/edit/' . $id);
            }

           
        }
    }

    public function delete($id)
    {
        $facility = Facilities::find($id);
        $facility->delete();

        // redirect
        Session::flash('message', 'Successfully deleted Booking!');
        return Redirect::to('/home');
    }

    public function pdf($id)
    {
        $facility = Facilities::find($id);
        $data = array('facility' => $facility);

        $pdf = PDF::loadView('pdffacility', $data);
        return $pdf->stream('booking.pdf');
    }

}
