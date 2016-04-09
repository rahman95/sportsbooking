<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use App\User;
use Redirect;
use Validator;
use Session;
use Input;
use Hash;
use Image;
use App\Classes as Classes;
use App\Facilities as Facilities;

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

        $classbookings = Classes::where('bookingdate', '>=', $dtdate)->where('bookedby', '=', Auth::user()->id)->count();
        $facilitybookings = Facilities::where('bookingdate', '>=', $dtdate)->where('bookedby', '=', Auth::user()->id)->count();
        $facilityhistory = Facilities::where('bookedby', Auth::user()->id)->get();
        $classhistory = Classes::where('bookedby', Auth::user()->id)->get();

        if($classbookings == "0"){
            $myclass = "No Upcoming Bookings";
        }
        else{
            $myclass = Classes::where('bookingdate', '>=', $dtdate)->where('bookedby', '=', Auth::user()->id)->get();
        }

        if($facilitybookings == "0"){
            $myfacility = "No Upcoming Bookings";
        }
        else{
            $myfacility = Facilities::where('bookingdate', '>=', $dtdate)->where('bookedby', '=', Auth::user()->id)->get();
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
        if (Auth::user()->id == $user->id){

        return view('editprofile')->with('user', $user);

        }else{
            return Redirect::to('home');
        }

    }

        public function editpass($id)
    {
        $user = User::find($id);
        if (Auth::user()->id == $user->id){

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
        $facilityhistory = Facilities::where('bookedby', Auth::user()->id)->get();
        $classhistory = Classes::where('bookedby', Auth::user()->id)->get();

        return view('viewbookings')->with('facilityhistory', $facilityhistory)->with('classhistory', $classhistory);
    }

        public function upload(){

        if(Input::hasFile('file')){

            $file = Input::file('file');
            $fileArray = array('image' => $file);
            $rules = array('image' => 'mimes:jpeg,jpg,png,gif|required|max:7000'); //Max 7MB Limit
            $validator = Validator::make($fileArray, $rules);

            if ($validator->fails()) {
            Session::flash('error', 'Image could not be uploaded');
            return redirect('book/class')
                        ->withErrors($validator)
                        ->withInput();
            }else{
                Image::make($file)->resize(500, 500)->save('uploads/' . Auth::user()->id . '.png');
                $id  = Auth::id();
                $user = User::findOrFail($id);
                $user->pic = Auth::id();
                
                $user->save();

                Session::flash('message', 'Profile Picture changed successfully');
                    return Redirect::to('/home');
            }
        }
        else{
           Session::flash('error', 'Please select an image file!');
                    return Redirect::to('/home/edit/' . Auth::id()); 
        }

    }

    public function stats(){

         $totalfacility = Facilities::where('bookedby', Auth::user()->id)->get();
         $totalclass = Classes::where('bookedby', Auth::user()->id)->get();
         $classfitness = Classes::where('bookedby', Auth::user()->id)->where('classtype', "fitness")->get();
         $classstrength = Classes::where('bookedby', Auth::user()->id)->where('classtype', "strength")->get();
         $facilitypitch1 = Facilities::where('bookedby', Auth::user()->id)->where('facilitytype', "football1")->get();
         $facilitypitch2 = Facilities::where('bookedby', Auth::user()->id)->where('facilitytype', "football2")->get();
         $facilitycourt1 = Facilities::where('bookedby', Auth::user()->id)->where('facilitytype', "tennis1")->get();
         $facilitycourt2 = Facilities::where('bookedby', Auth::user()->id)->where('facilitytype', "tennis2")->get();
         $facilityhall = Facilities::where('bookedby', Auth::user()->id)->where('facilitytype', "sportshall")->get();




         $class11 = Classes::where('bookedby', Auth::user()->id)->where('bookingtime', "11")->get();
         $class20 = Classes::where('bookedby', Auth::user()->id)->where('bookingtime', "20")->get();


        return view('stats')
        ->with('totalfacility', $totalfacility)
        ->with('totalclass', $totalclass)
        ->with('classfitness', $classfitness)
        ->with('classstrength', $classstrength)
        ->with('facilitypitch1', $facilitypitch1)
        ->with('facilitypitch2', $facilitypitch2)
        ->with('facilitycourt1', $facilitycourt1)
        ->with('facilitycourt2', $facilitycourt2)
        ->with('facilityhall', $facilityhall)
        ->with('class11', $class11)
        ->with('class20', $class20);

    }
}
