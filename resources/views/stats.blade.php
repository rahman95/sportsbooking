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
                <div class="panel-heading">Your Statistics</div>
                <div class="panel-body">
                @if ($totalclass->count() + $totalfacility->count() >= 10)
                <div class="col-md-4">
                <h2 class="text-center">Total Bookings</h2>
                <br>
                <br>
                <br>
                <h1 class="text-center count" id="total"></h1>
                <script>
                var options = {
                  useEasing : false, 
                  useGrouping : false, 
                  separator : ',', 
                  decimal : '.', 
                  prefix : '', 
                  suffix : '' 
                };
                var demo = new CountUp("total", 0, {{$totalclass->count() + $totalfacility->count()}}, 0, 1.5, options);
                demo.start();
                </script>
                </div>
                <div class="col-md-4">
                <h2 class="text-center">Class</h2>
                <div id="classprecentage"></div>
                <script>
                $( document ).ready(function() {
                        $("#classprecentage").circliful({
                        animationStep: 3,
                        foregroundBorderWidth: 5,
                        backgroundBorderWidth: 3,
                        percent: {{$totalclass->count() / ($totalclass->count() + $totalfacility->count()) * 100}} 
                    });
                    });
                </script>
                </div>
                <div class="col-md-4">
                <h2 class="text-center">Facility</h2>
                <div id="facilityprecentage"></div>
                <script>
                $( document ).ready(function() {
                        $("#facilityprecentage").circliful({
                        animationStep: 3,
                        foregroundBorderWidth: 5,
                        backgroundBorderWidth: 3,
                        percent: {{$totalfacility->count() / ($totalclass->count() + $totalfacility->count()) * 100}} 
                    });
                    });
                </script>
                </div>
                </div>
                <div class="panel-heading">Classes</div>
                <div class="panel-body">
                <div class="col-md-4">
                <h2 class="text-center">Total Classes</h2>
                <h1 class="text-center count" id="class"></h1>
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
                <h2 class="text-center">Class Breakdown</h2>
                <div class="col-md-6">
                <h3 class="text-center">Fitness</h3>
                <h1 class="text-center countsm" id="fitness"></h1>
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
                </div>
                <div class="col-md-6">
                <h3 class="text-center">Strength</h3>
                <h1 class="text-center countsm" id="strength"></h1>
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
                </div>
                </div>
                <div class="col-md-4">
                <h2 class="text-center">Time Breakdown</h2>

                <div class="col-md-6">
                <h3 class="text-center">11:00</h3>
                <h1 class="text-center countsm" id="11"></h1>
                <script>
                var options = {
                  useEasing : false, 
                  useGrouping : false, 
                  separator : ',', 
                  decimal : '.', 
                  prefix : '', 
                  suffix : '' 
                };
                var demo = new CountUp("11", 0, {{$class11->count()}}, 0, 1.5, options);
                demo.start();
                </script>
                </div>
                <div class="col-md-6">
                <h3 class="text-center">20:00</h3>
                <h1 class="text-center countsm" id="20"></h1>
                <script>
                var options = {
                  useEasing : false, 
                  useGrouping : false, 
                  separator : ',', 
                  decimal : '.', 
                  prefix : '', 
                  suffix : '' 
                };
                var demo = new CountUp("20", 0, {{$class20->count()}}, 0, 1.5, options);
                demo.start();
                </script>
                </div>
                </div>
                <div class="white">{{$lowest = min($classstrength->count(), $classfitness->count())}}</div>
                @if($classstrength->count() == $classfitness->count())
                @elseif ($lowest == $classstrength->count())
                <h3 class="text-center">Why not try more Strength Classes, you may like them?</h3>
                @else
                <h3 class="text-center">Why not try more Fitness Classes, you may like them?</h3>
                @endif

                <div class="white">{{$lowestt = min($class11->count(), $class20->count())}}</div>
                @if($class11->count() == $class20->count())
                @elseif ($lowestt == $class11->count())
                <h3 class="text-center">Try booking classes for 11:00, might be a little quiter?</h3>
                @else
                <h3 class="text-center">Try booking classes for 20:00, might be a little quiter?</h3>
                @endif


                </div>
                <div class="panel-heading">Facilities</div>
                <div class="panel-body">
                <div class="col-md-4">
                <h2 class="text-center">Total Facilities</h2>
                <h1 class="text-center count" id="facility"></h1>
                <script>
                var options = {
                  useEasing : false, 
                  useGrouping : false, 
                  separator : ',', 
                  decimal : '.', 
                  prefix : '', 
                  suffix : '' 
                };
                var demo = new CountUp("facility", 0, {{$totalfacility->count()}}, 0, 1.0, options);
                demo.start();
                </script>
                </div>
                <div class="col-md-8">
                <h2 class="text-center">Facility Breakdown</h2>
                <div class="row">
                    <div class="col-md-2 col-md-offset-1">
                        <h4 class="text-center">Pitch 1</h4>
                            <h1 class="text-center countsm" id="pitch1"></h1>
                            <script>
                            var options = {
                              useEasing : false, 
                              useGrouping : false, 
                              separator : ',', 
                              decimal : '.', 
                              prefix : '', 
                              suffix : '' 
                            };
                            var demo = new CountUp("pitch1", 0, {{$facilitypitch1->count()}}, 0, 1.0, options);
                            demo.start();
                            </script>
                    </div>
                    <div class="col-md-2">
                        <h4 class="text-center">Pitch 2</h4>
                        <h1 class="text-center countsm" id="pitch2"></h1>
                            <script>
                            var options = {
                              useEasing : false, 
                              useGrouping : false, 
                              separator : ',', 
                              decimal : '.', 
                              prefix : '', 
                              suffix : '' 
                            };
                            var demo = new CountUp("pitch2", 0, {{$facilitypitch2->count()}}, 0, 1.0, options);
                            demo.start();
                            </script>
                    </div>
                    <div class="col-md-2">
                        <h4 class="text-center">Court 1</h4>
                        <h1 class="text-center countsm" id="court1"></h1>
                            <script>
                            var options = {
                              useEasing : false, 
                              useGrouping : false, 
                              separator : ',', 
                              decimal : '.', 
                              prefix : '', 
                              suffix : '' 
                            };
                            var demo = new CountUp("court1", 0, {{$facilitycourt1->count()}}, 0, 1.0, options);
                            demo.start();
                            </script>
                    </div>
                    <div class="col-md-2">
                        <h4 class="text-center">Court 2</h4>
                        <h1 class="text-center countsm" id="court2"></h1>
                            <script>
                            var options = {
                              useEasing : false, 
                              useGrouping : false, 
                              separator : ',', 
                              decimal : '.', 
                              prefix : '', 
                              suffix : '' 
                            };
                            var demo = new CountUp("court2", 0, {{$facilitycourt2->count()}}, 0, 1.0, options);
                            demo.start();
                            </script>
                    </div>
                    <div class="col-md-2">
                        <h4 class="text-center">Hall</h4>
                        <h1 class="text-center countsm" id="hall"></h1>
                            <script>
                            var options = {
                              useEasing : false, 
                              useGrouping : false, 
                              separator : ',', 
                              decimal : '.', 
                              prefix : '', 
                              suffix : '' 
                            };
                            var demo = new CountUp("hall", 0, {{$facilityhall->count()}}, 0, 1.0, options);
                            demo.start();
                            </script>
                    </div>
                </div>
                </div>
                <div class="white">{{$lowest = min($facilityhall->count(), $facilitycourt2->count(), $facilitycourt1->count(), $facilitypitch1->count(), $facilitypitch2->count())}}</div>
                @if($lowest == $facilityhall->count())
                <h3 class="text-center">Looks like you could try using the Sports Hall more, you might like it? </h3>
                @elseif ($lowest == $facilitycourt1->count())
                <h3 class="text-center">Looks like you could try more Tennis on Court 1, you might like it? </h3>
                @elseif ($lowest == $facilitycourt2->count())
                <h3 class="text-center">Looks like you could try more Tennis on Court 2, you might like it? </h3>
                @elseif ($lowest == $facilitypitch1->count())
                <h3 class="text-center">Looks like you could try more Football on Pitch 1, you might like it? </h3>
                @else
                <h3 class="text-center">Looks like you could try more Football on Pitch 2, you might like it? </h3>
                @endif
                </div>
                @else
                Sorry, you dont have enough bookings to build statistics yet.
                </div>
                @endif
        </div>
    </div>
</div>
@endsection
