<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Facilities as Facilities;
use App\Classes as Classes;
use App\User as User;
use Auth;
use Input;
use Session;
use Redirect;
use DB;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function edit()
    {
        $facilities  = Facilities::all();
        $classes  = Classes::all();
        if (Auth::User()->admin =="1"){
        return view('adminedit')
        ->with('facilities', $facilities)
        ->with('classes', $classes);
    	}else{
    		return view('error404');
    	}
    }

    public function delete()
    {
        $facilities  = Facilities::all();
        $classes  = Classes::all();
        if (Auth::User()->admin =="1"){
        return view('admindelete')
        ->with('facilities', $facilities)
        ->with('classes', $classes);
        }else{
            return view('error404');
        }
    }

    public function new()
    {
        $users  = User::all();
        $admins = User::where('admin', "1")
                        ->get();

        return view('adminnew')
               ->with('users', $users)
               ->with('admins', $admins);
    }

    public function store()
    {
        $id = Input::get('user');
        $rank = Input::get('rank');

        $user = User::findOrFail($id);
        $user->admin   = Input::get('rank');

        $user->save();

        Session::flash('message', 'User Updated!');
        return Redirect::to('home/admin/new');
    }

    public function analytics()
    {

        $dt = Carbon::now();
        $today = $dt->format('Y-m-d');

         $totalfacility = Facilities::all();
         $totalclass = Classes::all();
         $totalmembers = User::all();

         $classfitness = Classes::where('classtype', "fitness")->get();
         $classstrength = Classes::where('classtype', "strength")->get();
         $class11 = Classes::where('bookingtime', "11")->get();
         $class20 = Classes::where('bookingtime', "20")->get();

         $facilitypitch1 = Facilities::where('facilitytype', "football1")->get();
         $facilitypitch2 = Facilities::where('facilitytype', "football2")->get();
         $facilitycourt1 = Facilities::where('facilitytype', "tennis1")->get();
         $facilitycourt2 = Facilities::where('facilitytype', "tennis2")->get();
         $facilityhall = Facilities::where('facilitytype', "sportshall")->get();

         $malemembers = User::where('gender', "male")->get();
         $femalemembers = User::where('gender', "female")->get();

         $agesql = DB::select('SELECT AVG(TIMESTAMPDIFF(YEAR, `dob`, NOW())) AS `Age` FROM `users`');
         $classsql = DB::select('SELECT `bookedby` FROM `class` GROUP BY `bookedby` ORDER BY COUNT(*) DESC LIMIT 1');
         $facilitysql = DB::select('SELECT `bookedby` FROM `facility` GROUP BY `bookedby` ORDER BY COUNT(*) DESC LIMIT 1');

         $output = array_map(function ($object) { return $object->Age; }, $agesql);
         $averageage = implode(', ', $output);

         $activeclassid = $classsql[0]->bookedby;
         $activefacilityid = $facilitysql[0]->bookedby;

         $activeclassuser = User::where('id', $activeclassid)->get();
         $activefacilityuser = User::where('id', $activefacilityid)->get();

         $classuser = $activeclassuser[0]->name;
         $facilityuser = $activefacilityuser[0]->name;


         $activeclassno = Classes::where('bookedby', $activeclassid)->get();
         $activefacilityno = Facilities::where('bookedby', $activefacilityid)->get();

        return view('analytics')
        ->with('totalfacility', $totalfacility)
        ->with('totalclass', $totalclass)
        ->with('totalmembers', $totalmembers)
        ->with('classfitness', $classfitness)
        ->with('classstrength', $classstrength)
        ->with('facilitypitch1', $facilitypitch1)
        ->with('facilitypitch2', $facilitypitch2)
        ->with('facilitycourt1', $facilitycourt1)
        ->with('facilitycourt2', $facilitycourt2)
        ->with('facilityhall', $facilityhall)
        ->with('class11', $class11)
        ->with('class20', $class20)
        ->with('malemembers', $malemembers)
        ->with('femalemembers', $femalemembers)
        ->with('averageage', $averageage)
        ->with('classuser', $classuser)
        ->with('facilityuser', $facilityuser)
        ->with('activeclassno', $activeclassno)
        ->with('activefacilityno', $activefacilityno);

         
    }

    public function reporting()
    {
        echo "Reporting Route";
    }

    public function graphs()
    {
        echo "Graphs Route";
    }
}
