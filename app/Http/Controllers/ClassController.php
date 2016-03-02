<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Input;
use Session;
use Redirect;

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
        $bookingclasses = \App\Classes::all();
        return view('bookclass')->with('bookingclasses', $bookingclasses);;
    }

    public function store()
    {

         $rules = array(
            'type' => 'required',
            'date' => 'required',
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

        $class->save();

        // redirect ----------------------------------------
        // redirect our user back to the form so they can do it all over again
        Session::flash('message', 'Booked Successfully!');
        return Redirect::to('book/class');
        }

        // Store the blog post...
    }
}
