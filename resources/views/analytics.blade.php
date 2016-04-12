@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
                @if (Session::has('message'))
                <div class="alert alert-success text-center">{{ Session::get('message') }}</div>
                @endif
                @if (Session::has('error'))
                <div class="alert alert-danger text-center">{{ Session::get('error') }}</div>
                @endif
                <div class="panel panel-default">
                <div class="panel-heading">General</div>
                <div class="panel-body">
                @if ($totalclass->count() + $totalfacility->count() >= 10)
                <div class="col-md-3">
                <h2 class="text-center">Total Bookings</h2>
                <br>
                <h1 class="text-center countxl" id="totalbookings"></h1>
                <script>
                var options = {
                  useEasing : false, 
                  useGrouping : false, 
                  separator : ',', 
                  decimal : '.', 
                  prefix : '', 
                  suffix : '' 
                };
                var demo = new CountUp("totalbookings", 0, {{$totalclass->count() + $totalfacility->count()}}, 0, 1.5, options);
                demo.start();
                </script>

                </div>
                <div class="col-md-3">
                <h2 class="text-center">Total Class</h2>

                <h1 class="text-center count" id="totalclass"></h1>
                <script>
                var options = {
                  useEasing : false, 
                  useGrouping : false, 
                  separator : ',', 
                  decimal : '.', 
                  prefix : '', 
                  suffix : '' 
                };
                var demo = new CountUp("totalclass", 0, {{$totalclass->count()}}, 0, 1.5, options);
                demo.start();
                </script>
                <h1 class="text-center countxxsm" id="classpre"><h4 class="text-center">of all Bookings</h4></h1>
                <script>
                var options = {
                  useEasing : false, 
                  useGrouping : false, 
                  separator : ',', 
                  decimal : '.', 
                  prefix : '', 
                  suffix : '%' 
                };
                var demo = new CountUp("classpre", 0, {{$totalclass->count() / ($totalclass->count() + $totalfacility->count()) * 100}} , 0, 1.5, options);
                demo.start();
                </script>
                
                </div>
                <div class="col-md-3">
                <h2 class="text-center">Total Facility</h2>

                <h1 class="text-center count" id="totalfacility"></h1>
                <script>
                var options = {
                  useEasing : false, 
                  useGrouping : false, 
                  separator : ',', 
                  decimal : '.', 
                  prefix : '', 
                  suffix : '' 
                };
                var demo = new CountUp("totalfacility", 0, {{$totalfacility->count()}}, 0, 1.5, options);
                demo.start();
                </script>
                <h1 class="text-center countxxsm" id="facilitypre"><h4 class="text-center">of all Bookings</h4></h1>
                <script>
                var options = {
                  useEasing : false, 
                  useGrouping : false, 
                  separator : ',', 
                  decimal : '.', 
                  prefix : '', 
                  suffix : '%' 
                };
                var demo = new CountUp("facilitypre", 0, {{$totalfacility->count() / ($totalclass->count() + $totalfacility->count()) * 100}} , 0, 1.5, options);
                demo.start();
                </script>

                </div>
                <div class="col-md-3">
                <h2 class="text-center">Total Members</h2>
                <br>
                <h1 class="text-center countxl" id="totalmembers"></h1>
                <script>
                var options = {
                  useEasing : false, 
                  useGrouping : false, 
                  separator : ',', 
                  decimal : '.', 
                  prefix : '', 
                  suffix : '' 
                };
                var demo = new CountUp("totalmembers", 0, {{$totalmembers->count()}}, 0, 1.5, options);
                demo.start();
                </script>
                </div>
                </div>
                <div class="panel-heading">Class</div>
                <div class="panel-body">
                <div class="col-md-4">
                <h2 class="text-center">Total Class</h2>
                <br>
                <h1 class="text-center countxl" id="class"></h1>
                <script>
                var options = {
                  useEasing : false, 
                  useGrouping : false, 
                  separator : ',', 
                  decimal : '.', 
                  prefix : '', 
                  suffix : '' 
                };
                var demo = new CountUp("class", 0, {{$totalclass->count()}}, 0, 1.5, options);
                demo.start();
                </script>
                </div>
                <div class="col-md-4">
                <div class="col-md-6">
                <h3 class="text-center ">Fitness</h3>
                <h1 class="text-center count" id="fitness"></h1>
                <script>
                var options = {
                  useEasing : false, 
                  useGrouping : false, 
                  separator : ',', 
                  decimal : '.', 
                  prefix : '', 
                  suffix : '' 
                };
                var demo = new CountUp("fitness", 0, {{$classfitness->count()}}, 0, 1.5, options);
                demo.start();
                </script>

                <h1 class="text-center countxxsm" id="fitnesspre"><h4 class="text-center">of all Classes</h4></h1>
                <script>
                var options = {
                  useEasing : false, 
                  useGrouping : false, 
                  separator : ',', 
                  decimal : '.', 
                  prefix : '', 
                  suffix : '%' 
                };
                var demo = new CountUp("fitnesspre", 0, {{$classfitness->count() / ($classfitness->count() + $classstrength->count()) * 100}} , 0, 1.5, options);
                demo.start();
                </script>


                </div>
                <div class="col-md-6">
                <h3 class="text-center ">Strength</h3>
                <h1 class="text-center count" id="strength"></h1>
                <script>
                var options = {
                  useEasing : false, 
                  useGrouping : false, 
                  separator : ',', 
                  decimal : '.', 
                  prefix : '', 
                  suffix : '' 
                };
                var demo = new CountUp("strength", 0, {{$classstrength->count()}}, 0, 1.5, options);
                demo.start();
                </script>


                <h1 class="text-center countxxsm" id="strengthpre"><h4 class="text-center">of all Classes</h4></h1>
                <script>
                var options = {
                  useEasing : false, 
                  useGrouping : false, 
                  separator : ',', 
                  decimal : '.', 
                  prefix : '', 
                  suffix : '%' 
                };
                var demo = new CountUp("strengthpre", 0, {{$classstrength->count() / ($classfitness->count() + $classstrength->count()) * 100}} , 0, 1.5, options);
                demo.start();


                </script>
                </div>
                </div>
                <div class="col-md-4">
                <div class="col-md-6">
                <h3 class="text-center ">Morning</h3>


                <h1 class="text-center count" id="morning"></h1>
                <script>
                var options = {
                  useEasing : false, 
                  useGrouping : false, 
                  separator : ',', 
                  decimal : '.', 
                  prefix : '', 
                  suffix : '' 
                };
                var demo = new CountUp("morning", 0, {{$class11->count()}}, 0, 1.5, options);
                demo.start();
                </script>


                <h1 class="text-center countxxsm" id="11pre"><h4 class="text-center">of all Classes</h4></h1>
                <script>
                var options = {
                  useEasing : false, 
                  useGrouping : false, 
                  separator : ',', 
                  decimal : '.', 
                  prefix : '', 
                  suffix : '%' 
                };
                var demo = new CountUp("11pre", 0, {{$class11->count() / ($class11->count() + $class20->count()) * 100}} , 0, 1.5, options);
                demo.start();
                </script>


                </div>
                <div class="col-md-6">
                <h3 class="text-center ">Evening</h3>

                <h1 class="text-center count" id="evening"></h1>
                <script>
                var options = {
                  useEasing : false, 
                  useGrouping : false, 
                  separator : ',', 
                  decimal : '.', 
                  prefix : '', 
                  suffix : '' 
                };
                var demo = new CountUp("evening", 0, {{$class20->count()}}, 0, 1.5, options);
                demo.start();
                </script>


                <h1 class="text-center countxxsm" id="20pre"><h4 class="text-center">of all Classes</h4></h1>
                <script>
                var options = {
                  useEasing : false, 
                  useGrouping : false, 
                  separator : ',', 
                  decimal : '.', 
                  prefix : '', 
                  suffix : '%' 
                };
                var demo = new CountUp("20pre", 0, {{$class20->count() / ($class11->count() + $class20->count()) * 100}} , 0, 1.5, options);
                demo.start();
                </script>


                </div>
                </div>
                </div>
                <div class="panel-heading">Facilities</div>
                <div class="panel-body">
                <div class="col-md-4">
                <h2 class="text-center">Total Facility</h2>
                <br>
                <h1 class="text-center countxl" id="facility"></h1>
                <script>
                var options = {
                  useEasing : false, 
                  useGrouping : false, 
                  separator : ',', 
                  decimal : '.', 
                  prefix : '', 
                  suffix : '' 
                };
                var demo = new CountUp("facility", 0, {{$totalfacility->count()}}, 0, 1.5, options);
                demo.start();
                </script>
                </div>
                <div class="col-md-8">
                <div class="col-md-2 col-md-offset-1">
                <h2 class="text-center">Pitch 1</h2>


                <h1 class="text-center count" id="pitch1"></h1>
                <script>
                var options = {
                  useEasing : false, 
                  useGrouping : false, 
                  separator : ',', 
                  decimal : '.', 
                  prefix : '', 
                  suffix : '' 
                };
                var demo = new CountUp("pitch1", 0, {{$facilitypitch1->count()}}, 0, 1.5, options);
                demo.start();
                </script>


                <h1 class="text-center countxxsm" id="pitch1pre"><h4 class="text-center">of all Facilities</h4></h1>
                <script>
                var options = {
                  useEasing : false, 
                  useGrouping : false, 
                  separator : ',', 
                  decimal : '.', 
                  prefix : '', 
                  suffix : '%' 
                };
                var demo = new CountUp("pitch1pre", 0, {{$facilitypitch1->count() / $totalfacility->count() * 100}} , 0, 1.5, options);
                demo.start();
                </script>


                </div>
                <div class="col-md-2">
                <h2 class="text-center">Pitch 2</h2>


                <h1 class="text-center count" id="pitch2"></h1>
                <script>
                var options = {
                  useEasing : false, 
                  useGrouping : false, 
                  separator : ',', 
                  decimal : '.', 
                  prefix : '', 
                  suffix : '' 
                };
                var demo = new CountUp("pitch2", 0, {{$facilitypitch2->count()}}, 0, 1.5, options);
                demo.start();
                </script>


                <h1 class="text-center countxxsm" id="pitch2pre"><h4 class="text-center">of all Facilities</h4></h1>
                <script>
                var options = {
                  useEasing : false, 
                  useGrouping : false, 
                  separator : ',', 
                  decimal : '.', 
                  prefix : '', 
                  suffix : '%' 
                };
                var demo = new CountUp("pitch2pre", 0, {{$facilitypitch2->count() / $totalfacility->count() * 100}} , 0, 1.5, options);
                demo.start();
                </script>


                </div>
                <div class="col-md-2">
                <h2 class="text-center">Court 1</h2>


                <h1 class="text-center count" id="court1"></h1>
                <script>
                var options = {
                  useEasing : false, 
                  useGrouping : false, 
                  separator : ',', 
                  decimal : '.', 
                  prefix : '', 
                  suffix : '' 
                };
                var demo = new CountUp("court1", 0, {{$facilitycourt1->count()}}, 0, 1.5, options);
                demo.start();
                </script>


                <h1 class="text-center countxxsm" id="court1pre"><h4 class="text-center">of all Facilities</h4></h1>
                <script>
                var options = {
                  useEasing : false, 
                  useGrouping : false, 
                  separator : ',', 
                  decimal : '.', 
                  prefix : '', 
                  suffix : '%' 
                };
                var demo = new CountUp("court1pre", 0, {{$facilitycourt1->count() / $totalfacility->count() * 100}} , 0, 1.5, options);
                demo.start();
                </script>


                </div>
                <div class="col-md-2">
                <h2 class="text-center">Court 2</h2>


                <h1 class="text-center count" id="court2"></h1>
                <script>
                var options = {
                  useEasing : false, 
                  useGrouping : false, 
                  separator : ',', 
                  decimal : '.', 
                  prefix : '', 
                  suffix : '' 
                };
                var demo = new CountUp("court2", 0, {{$facilitycourt2->count()}}, 0, 1.5, options);
                demo.start();
                </script>


                <h1 class="text-center countxxsm" id="court2pre"><h4 class="text-center">of all Facilities</h4></h1>
                <script>
                var options = {
                  useEasing : false, 
                  useGrouping : false, 
                  separator : ',', 
                  decimal : '.', 
                  prefix : '', 
                  suffix : '%' 
                };
                var demo = new CountUp("court2pre", 0, {{$facilitycourt2->count() / $totalfacility->count() * 100}} , 0, 1.5, options);
                demo.start();
                </script>



                </div>
                <div class="col-md-2">
                <h2 class="text-center">Sports Hall</h2>

                <h1 class="text-center count" id="hall"></h1>
                <script>
                var options = {
                  useEasing : false, 
                  useGrouping : false, 
                  separator : ',', 
                  decimal : '.', 
                  prefix : '', 
                  suffix : '' 
                };
                var demo = new CountUp("hall", 0, {{$facilityhall->count()}}, 0, 1.5, options);
                demo.start();
                </script>


                <h1 class="text-center countxxsm" id="hallpre"><h4 class="text-center">of all Facilities</h4></h1>
                <script>
                var options = {
                  useEasing : false, 
                  useGrouping : false, 
                  separator : ',', 
                  decimal : '.', 
                  prefix : '', 
                  suffix : '%' 
                };
                var demo = new CountUp("hallpre", 0, {{$facilityhall->count() / $totalfacility->count() * 100}} , 0, 1.5, options);
                demo.start();
                </script>

                </div>
                </div>
                </div>
                <div class="panel-heading">Member</div>
                <div class="panel-body">
                <div class="col-md-3">
                <h2 class="text-center">Total Members</h2>
                <br>
                <h1 class="text-center countxl" id="member"></h1>
                <script>
                var options = {
                  useEasing : false, 
                  useGrouping : false, 
                  separator : ',', 
                  decimal : '.', 
                  prefix : '', 
                  suffix : '' 
                };
                var demo = new CountUp("member", 0, {{$totalmembers->count()}}, 0, 1.5, options);
                demo.start();
                </script>
                </div>
                <div class="col-md-3">
                <div class="col-md-6">
                <h2 class="text-center">Male</h2>

                <h1 class="text-center count" id="male"></h1>
                <script>
                var options = {
                  useEasing : false, 
                  useGrouping : false, 
                  separator : ',', 
                  decimal : '.', 
                  prefix : '', 
                  suffix : '' 
                };
                var demo = new CountUp("male", 0, {{$malemembers->count()}}, 0, 1.5, options);
                demo.start();
                </script>


                <h1 class="text-center countxxsm" id="malepre"><h4 class="text-center">of all Members</h4></h1>
                <script>
                var options = {
                  useEasing : false, 
                  useGrouping : false, 
                  separator : ',', 
                  decimal : '.', 
                  prefix : '', 
                  suffix : '%' 
                };
                var demo = new CountUp("malepre", 0, {{$malemembers->count() / $totalmembers->count() * 100}} , 0, 1.5, options);
                demo.start();
                </script>
                </div>

                <div class="col-md-6">
                <h2 class="text-center">Female</h2>

                <h1 class="text-center count" id="female"></h1>
                <script>
                var options = {
                  useEasing : false, 
                  useGrouping : false, 
                  separator : ',', 
                  decimal : '.', 
                  prefix : '', 
                  suffix : '' 
                };
                var demo = new CountUp("female", 0, {{$femalemembers->count()}}, 0, 1.5, options);
                demo.start();
                </script>


                <h1 class="text-center countxxsm" id="femalepre"><h4 class="text-center">of all Members</h4></h1>
                <script>
                var options = {
                  useEasing : false, 
                  useGrouping : false, 
                  separator : ',', 
                  decimal : '.', 
                  prefix : '', 
                  suffix : '%' 
                };
                var demo = new CountUp("femalepre", 0, {{$femalemembers->count() / $totalmembers->count() * 100}} , 0, 1.5, options);
                demo.start();
                </script>
                </div>

                </div>
                <div class="col-md-3">
                <h2 class="text-center">Average Age</h2>
                <br>
                <h1 class="text-center countxl" id="age"></h1>
                <script>
                var options = {
                  useEasing : false, 
                  useGrouping : false, 
                  separator : ',', 
                  decimal : '.', 
                  prefix : '', 
                  suffix : '' 
                };
                var demo = new CountUp("age", 0, {{$averageage}}, 0, 1.5, options);
                demo.start();
                </script>
                
                </div>
                <div class="col-md-3">
                <h2 class="text-center">Most Active</h2>
                <div class="col-md-6">
                <h3 class="text-center moveup">Classes</h3>
                <h4 class="text-center">{{$classuser}}</h4>

                <h1 class="text-center countxsm" id="activeclass"></h1>
                <script>
                var options = {
                  useEasing : false, 
                  useGrouping : false, 
                  separator : ',', 
                  decimal : '.', 
                  prefix : '(', 
                  suffix : ')' 
                };
                var demo = new CountUp("activeclass", 0, {{$activeclassno->count()}}, 0, 1.5, options);
                demo.start();
                </script>

                <h1 class="text-center countxxsm" id="activeclasspre"><h4 class="text-center">of all Bookings</h4></h1>
                <script>
                var options = {
                  useEasing : false, 
                  useGrouping : false, 
                  separator : ',', 
                  decimal : '.', 
                  prefix : '', 
                  suffix : '%' 
                };
                var demo = new CountUp("activeclasspre", 0, {{$activeclassno->count() / $totalclass->count() * 100}} , 0, 1.5, options);
                demo.start();
                </script>

                </div>
                <div class="col-md-6">
                <h3 class="text-center moveup">Facility</h3>
                <h4 class="text-center">{{$facilityuser}}</h4>

                <h1 class="text-center countxsm" id="activefacility"></h1>
                <script>
                var options = {
                  useEasing : false, 
                  useGrouping : false, 
                  separator : ',', 
                  decimal : '.', 
                  prefix : '(', 
                  suffix : ')' 
                };
                var demo = new CountUp("activefacility", 0, {{$activefacilityno->count()}}, 0, 1.5, options);
                demo.start();
                </script>

                <h1 class="text-center countxxsm" id="activefacilitypre"><h4 class="text-center">of all Bookings</h4></h1>
                <script>
                var options = {
                  useEasing : false, 
                  useGrouping : false, 
                  separator : ',', 
                  decimal : '.', 
                  prefix : '', 
                  suffix : '%' 
                };
                var demo = new CountUp("activefacilitypre", 0, {{$activefacilityno->count() / $totalfacility->count() * 100}} , 0, 1.5, options);
                demo.start();
                </script>

                </div>
                </div>
                </div>
                @else
                Sorry, you dont have enough bookings to build statistics yet. At least 10 Bookings are required!
                </div>
                @endif
        </div>
    </div>
</div>
@endsection
