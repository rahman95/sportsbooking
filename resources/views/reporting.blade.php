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
                <div class="panel-heading">Members</div>
                <div class="panel-body">
                @if ($totalmembers->count() < 25)
                <h3 class="text-center">RYSportsCentre has less than 25 Members, try offering more promotions or joining bonuses. <i>Aim for at least 25 members, currently you have {{$totalmembers->count()}}.</i></h3>
                @elseif ($totalmembers->count() < 50)
                <h3 class="text-center">RYSportsCentre has less than 50 Members, try offering more promotions or joining bonuses. Aim for at least 50 members, currently you have {{$totalmembers->count()}}.</h3>
                @elseif ($totalmembers->count() < 75)
                <h3 class="text-center">RYSportsCentre has less than 75 Members, try offering more promotions or joining bonuses. Aim for at least 75 members, currently you have {{$totalmembers->count()}}.</h3>
                @elseif ($totalmembers->count() < 100)
                <h3 class="text-center">RYSportsCentre has less than 100 Members, try offering more promotions or joining bonuses. Aim for at least 100 members, currently you have {{$totalmembers->count()}}.</h3>
                @else
                <h3 class="text-center">Well Done, the Business has more than 100 members!</h3>
                @endif
                <br>
                @if($malemembers == $femalemembers)
                @elseif($malemembers > $femalemembers)
                <h4 class="text-center">There are more Male members at the SportsCentre,<i> try get more Female signups.</i></h4>
                @else
                <h4 class="text-center">There are more Female members at the SportsCentre,<i> try get more Male signups.</i></h4>
                @endif
                </div>
                <div class="panel-heading">Class</div>
                <div class="panel-body">

                
                @if ($totalclass->count() < 25)
                <h3 class="text-center">The Business has less than 25 Bookings, try offering more promotions. <i>Aim for at least 25 Bookings, currently you have {{$totalclass->count()}}.</i></h3>
                @elseif ($totalclass->count() < 50)
                <h3 class="text-center">The Business has less than 50 Bookings, try offering more promotions. Aim for at least 50 Bookings, currently you have {{$totalclass->count()}}.</h3>
                @elseif ($totalclass->count() < 75)
                <h3 class="text-center">The Business has less than 75 Bookings, try offering more promotions. Aim for at least 75 Bookings, currently you have {{$totalclass->count()}}.</h3>
                @elseif ($totalclass->count() < 100)
                <h3 class="text-center">The Business has less than 100 Bookings, try offering more promotions. Aim for at least 100 Bookings, currently you have {{$totalclass->count()}}.</h3>
                @else
                <h3 class="text-center">Well Done, the Business has more than 100 Class Bookings!</h3>
                @endif
                <br>
                <ul>

                @if($classthisweek < 25)
                <li><h4 class="text-center">This week there has been {{$classthisweek}} Bookings, try aim for at least 25 per week. <i>Try offering Discounts or Promotions?</i></h4></li>
                @elseif ($classthisweek < 50)
                <li><h4 class="text-center">This week there has been {{$classthisweek}} Bookings, try aim for at least 50 per week. <i>Try offering Discounts or Promotions?</i></h4></li>
                @elseif ($classthisweek < 75)
                <li><h4 class="text-center">This week there has been {{$classthisweek}} Bookings, try aim for at least 75 per week. <i>Try offering Discounts or Promotions?</i></h4></li>
                @elseif ($classthisweek < 100)
                <li><h4 class="text-center">This week there has been {{$classthisweek}} Bookings, try aim for at least 100 per week. <i>Try offering Discounts or Promotions?</i></h4></li>
                @else
                @endif

                @if($classthismonth < 25)
                <li><h4 class="text-center">This month there has been {{$classthismonth}} Bookings, try aim for at least 25 per month. <i>Try offering Discounts or Promotions?</i></h4></li>
                @elseif ($classthismonth < 50)
                <li><h4 class="text-center">This month there has been {{$classthismonth}} Bookings, try aim for at least 50 per month. <i>Try offering Discounts or Promotions?</i></h4></li>
                @elseif ($classthismonth < 75)
                <li><h4 class="text-center">This month there has been {{$classthismonth}} Bookings, try aim for at least 75 per month. <i>Try offering Discounts or Promotions?</i></h4></li>
                @elseif ($classthismonth < 100)
                <li><h4 class="text-center">This month there has been {{$classthismonth}} Bookings, try aim for at least 100 per month. <i>Try offering Discounts or Promotions?</i></h4></li>
                @else
                @endif

                @if($class11 == $class20)
                @elseif($class11 > $class20)
                <li><h4 class="text-center">Morning Classes are more popular, <i>why not try offer discount to get more Evening Bookings?</i></h4></li>
                @else
                <li><h4 class="text-center">Evening Classes are more popular, <i>why not try offer discount to get more Morning Bookings?</i></h4></li>
                @endif

                @if($classfitness == $classstrength)
                @elseif($classfitness > $classstrength)
                <li><h4 class="text-center">The Fitness Classes are selling better than Strength Classes, <i>why not try offer discount to get more Strength Classes?</i></h4></li>
                @else
                <li><h4 class="text-center">The Strength Classes are selling better than Fitness Classes, <i>why not try offer discount to get more Fitness Classes?</i></h4></li>
                @endif
                </ul>
                </div>

                <div class="panel-heading">Facilities</div>
                <div class="panel-body">
                @if ($totalfacility->count() < 25)
                <h3 class="text-center">The Business has less than 25 Facility Bookings, try offering more promotions or joining bonuses. Aim for at least 25 Facility Bookings, <i>currently you have {{$totalfacility->count()}}.</i></h3>
                @elseif ($totalfacility->count() < 50)
                <h3 class="text-center">The Business has less than 50 Facility Bookings, try offering more promotions or joining bonuses. Aim for at least 50 Facility Bookings, <i>currently you have {{$totalfacility->count()}}.</i></h3>
                @elseif ($totalfacility->count() < 75)
                <h3 class="text-center">The Business has less than 75 Facility Bookings, try offering more promotions or joining bonuses. Aim for at least 75 Facility Bookings, <i>currently you have {{$totalfacility->count()}}.</i></h3>
                @elseif ($totalfacility->count() < 100)
                <h3 class="text-center">The Business has less than 75 Facility Bookings, try offering more promotions or joining bonuses. Aim for at least 75 Facility Bookings, <i>currently you have {{$totalfacility->count()}}.</i></h3>
                @else
                <h3 class="text-center">Well Done, the Business has more than 100 Facility Bookings!</h3>
                @endif

                <br>
                <ul>
                @if($facilitythisweek < 25)
                <li><h4 class="text-center">This week there has been {{$facilitythisweek}} Bookings, try aim for at least 25 per week. <i>Try offering Discounts or Promotions?</i></h4></li>
                @elseif ($facilitythisweek < 50)
                <li><h4 class="text-center">This week there has been {{$facilitythisweek}} Bookings, try aim for at least 50 per week. <i>Try offering Discounts or Promotions?</i></h4></li>
                @elseif ($facilitythisweek < 75)
                <li><h4 class="text-center">This week there has been {{$facilitythisweek}} Bookings, try aim for at least 75 per week. <i>Try offering Discounts or Promotions?</i></h4></li>
                @elseif ($facilitythisweek < 100)
                <li><h4 class="text-center">This week there has been {{$facilitythisweek}} Bookings, try aim for at least 100 per week. <i>Try offering Discounts or Promotions?</i></h4></li>
                @else
                @endif

                @if($facilitythismonth < 25)
                <li><h4 class="text-center">This month there has been {{$facilitythismonth}} Bookings, try aim for at least 25 per month. <i>Try offering Discounts or Promotions?</i></h4></li>
                @elseif ($facilitythismonth < 50)
                <li><h4 class="text-center">This month there has been {{$facilitythismonth}} Bookings, try aim for at least 50 per month. <i>Try offering Discounts or Promotions?</i></h4></li>
                @elseif ($facilitythismonth < 75)
                <li><h4 class="text-center">This month there has been {{$facilitythismonth}} Bookings, try aim for at least 75 per month. <i>Try offering Discounts or Promotions?</i></h4></li>
                @elseif ($facilitythismonth < 100)
                <li><h4 class="text-center">This month there has been {{$facilitythismonth}} Bookings, try aim for at least 100 per month. <i>Try offering Discounts or Promotions?</i></h4></li>
                @else
                @endif
                </ul>
                </div>
                </div>
        </div>
    </div>
</div>
@endsection
