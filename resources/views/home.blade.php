@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-primary">
                <div class="panel-heading text-center">Your Dashboard</div>
                </div>
                <div class="panel panel-default">
                <div class="panel-heading">Upcoming Bookings</div>
                <div class="panel-body">
                <div class="col-md-6">
                <h3 class="text-center">Classes</h3>
                <br>

                @if($myclass == "No Upcoming Bookings")
                <h4 class="text-center text-muted"><i class="fa fa-search-plus"></i> <b>{{$myclass}}</b> <a href={{ URL::to('book') }}>click here to make a booking</a></h4>
                @else
                <table>
                <tr>
                    <th>Class Type</th>
                    <th>Booking Date</th>
                    <th>Booking Time</th>
                    <th colspan="2">Manage</th>

                </tr>
                @foreach($myclass as $class)
                <tr>
                    <td>{{ $class->classtype }}</td>
                    <td>{{ $class->bookingdate }}</td>
                    <td>{{ $class->bookingtime }}:00</td>
                    <td>
                        <a class="btn btn-small btn-success" href="{{ URL::to('book/class/show/' . $class->id) }}">Show</a>
                    </td>
                    <td>
                        <a class="btn btn-small btn-info" href="{{ URL::to('book/class/edit/' . $class->id) }}">Edit</a>
                    </td>
                </tr>
                @endforeach
                </table>
                @endif
                </div>

                <div class="col-md-6">
                <h3 class="text-center">Facilities</h3>
                <br>
                @if($myclass == "No Upcoming Bookings")
                <h4 class="text-center text-muted"><i class="fa fa-search-plus"></i> <b>{{$myclass}}</b> <a href={{ URL::to('book') }}>click here to make a booking</a></h4>
                @else
                <table>
                <tr>
                    <th>Class Type</th>
                    <th>Booking Date</th>
                    <th>Booking Time</th>
                    <th colspan="2">Manage</th>

                </tr>
                @foreach($myfacility as $facility)
                <tr>
                    <td>{{ $facility->facilitytype }}</td>
                    <td>{{ $facility->bookingdate }}</td>
                    <td>{{ $facility->bookingtime }}:00</td>
                    <td>
                        <a class="btn btn-small btn-success" href="{{ URL::to('book/class/show/' . $class->id) }}">Show</a>
                    </td>
                    <td>
                        <a class="btn btn-small btn-info" href="{{ URL::to('book/class/edit/' . $class->id) }}">Edit</a>
                    </td>
                </tr>
                @endforeach
                </table>
                @endif
                </div>
                </div>
                <div class="panel-heading">My Account</div>
                <div class="panel-body">
                    <h4 class="text-center"><b>Name:</b> {{ Auth::user()->name }}</h4>
                    <h4 class="text-center"><b>Email:</b> {{ Auth::user()->email }}</h4>
                    <h4 class="text-center"><b>Member Since:</b> {{ Auth::user()->created_at->format('d/m/Y') }}</h4>
                    <div class="buttoncenter"><a class="btn btn-small btn-success" href="{{ URL::to('profile/edit/' . Auth::user()->id) }}">Edit Details</a></div>
                </div>
                <div class="panel-heading">Booking History</div>
                <div class="panel-body">
                @if($facilityhistory->count() == 0)
                <h3 class="text-center">You have not made any Bookings yet, you can do so by <a href="{{ URL::to('book') }}">clicking here</a></h3>
                @else
                <h4 class="text-center">You have made <b>{{$facilityhistory->count() + $classhistory->count()}}</b> Bookings in total since you became a member</h4>
                <div class="col-md-6">
                <h3 class="text-center">Classes</h3>
                <table>
                <tr>
                <th>Class Type</th>
                <th>Booking Date</th>
                <th>Booking Time</th>
                </tr>
                @foreach($classhistory as $chistory)
                <tr>
                <td>{{$chistory->classtype}}</td>
                <td>{{$chistory->bookingdate}}</td>
                <td>{{$chistory->bookingtime}}:00</td>
                </tr>
                @endforeach
                </table>
                </div>
                <div class="col-md-6">
                <h3 class="text-center">Facilities</h3>
                <table>
                <tr>
                <th>Facility Type</th>
                <th>Booking Date</th>
                <th>Booking Time</th>
                </tr>
                @foreach($facilityhistory as $fhistory)
                <tr>
                <td>{{$fhistory->facilitytype}}</td>
                <td>{{$fhistory->bookingdate}}</td>
                <td>{{$fhistory->bookingtime}}:00</td>
                </tr>
                @endforeach
                </table>
                </div> 
                @endif
                </div>
                </div>
        </div>
    </div>
</div>
@endsection
