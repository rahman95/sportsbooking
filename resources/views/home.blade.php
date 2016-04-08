@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-primary">
                <div class="panel-heading text-center">Your Dashboard</div>
                </div>
                @if (Session::has('message'))
                <div class="alert alert-success text-center">{{ Session::get('message') }}</div>
                @endif
                @if (Session::has('error'))
                <div class="alert alert-danger text-center">{{ Session::get('error') }}</div>
                @endif
                <div class="panel panel-default">
                <div class="panel-heading">Upcoming Bookings</div>
                <div class="panel-body">
                <div class="col-md-6">
                <h3 class="text-center">Classes</h3>
                <br>
                @if($myclass == "No Upcoming Bookings")
                <h4 class="text-center text-muted"><i class="fa fa-search-plus"></i> <b>{{$myclass}}</b> <a href={{ URL::to('book') }}>click here to make a booking</a></h4>
                @else
                <div class="table-responsive">
                <table>
                <tr>
                    <th>Class Type</th>
                    <th>Booking Date</th>
                    <th>Booking Time</th>
                    <th colspan="3">Manage</th>

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
                        <a class="btn btn-small btn-warning" href="{{ URL::to('book/class/edit/' . $class->id) }}">Edit</a>
                    </td>
                    <td>
                    <button type="button" class="btn btn-small btn-danger" data-toggle="modal" data-target="#classModal">Delete</button>
                    <div id="classModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                         <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Delete Booking</h4>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete the Booking?</p>
                    </div>
                    <div class="modal-footer">
                        {{ Form::open(array('url' => 'book/class/delete/' . $class->id)) }}
                        {{ Form::hidden('_method', 'DELETE') }}
                        {{ Form::submit('Delete Booking', array('class' => 'btn btn-danger')) }}
                         <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                        {{ Form::close() }} 
                    </div>
                    </div>
                    </div>
                    </div>
                    </td>
                </tr>
                @endforeach
                </table>
                </div>
                @endif
                </div>

                <div class="col-md-6">
                <h3 class="text-center">Facilities</h3>
                <br>
                @if($myfacility == "No Upcoming Bookings")
                <h4 class="text-center text-muted"><i class="fa fa-search-plus"></i> <b>{{$myfacility}}</b> <a href={{ URL::to('book') }}>click here to make a booking</a></h4>
                @else
                <div class="table-responsive">
                <table>
                <tr>
                    <th>Facility Type</th>
                    <th>Booking Date</th>
                    <th>Booking Time</th>
                    <th colspan="3">Manage</th>
                </tr>
                @foreach($myfacility as $facility)
                <tr>
                    <td>{{ $facility->facilitytype }}</td>
                    <td>{{ $facility->bookingdate }}</td>
                    <td>{{ $facility->bookingtime }}:00</td>
                    <td>
                        <a class="btn btn-small btn-success" href="{{ URL::to('book/facility/show/' . $facility->id) }}">Show</a>
                    </td>
                    <td>
                        <a class="btn btn-small btn-warning" href="{{ URL::to('book/facility/edit/' . $facility->id) }}">Edit</a>
                    </td>
                    <td>
                    <button type="button" class="btn btn-small btn-danger" data-toggle="modal" data-target="#facilityModal">Delete</button>
                    <div id="facilityModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                         <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Delete Booking</h4>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete the Booking?</p>
                    </div>
                    <div class="modal-footer">
                        {{ Form::open(array('url' => 'book/facility/delete/' . $facility->id)) }}
                        {{ Form::hidden('_method', 'DELETE') }}
                        {{ Form::submit('Delete Booking', array('class' => 'btn btn-danger')) }}
                        <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                        {{ Form::close() }} 

                    </div>
                    </div>
                    </div>
                    </div>
                    </td>
                </tr>
                @endforeach
                </table>
                </div>
                @endif
                </div>
                </div>
                
                <div class="panel-heading">My Account</div>
                <div class="panel-body">
                <div class="col-md-6">
                @if (Auth::user()->pic == "" && Auth::user()->gender == "male")
                <img src="img/default/default-male.png" class="center-block img-responsive img-circle" style="width: 35%; height: 35%" alt="profilepic">
                @elseif (Auth::user()->pic == "" && Auth::user()->gender == "female")
                <img src="img/default/default-female.png" class="center-block img-responsive img-circle" style="width: 35%; height: 35%" alt="profilepic">
                @else
                <img src="uploads/{{Auth::user()->pic}}.png" class="center-block img-responsive img-circle" style="width: 35%; height: 35%" alt="profilepic">
                @endif
                </div>
                <div class="col-md-6">
                    <h4 class="text-center"><b>Name:</b> {{ Auth::user()->name }}</h4>
                    <h4 class="text-center"><b>Email:</b> {{ Auth::user()->email }}</h4>
                    <h4 class="text-center"><b>Gender:</b> {{ Auth::user()->gender }}</h4>
                    <h4 class="text-center"><b>Date of Birth:</b> {{ Auth::user()->dob }}</h4>
                    <h4 class="text-center"><b>Member Since:</b> {{ Auth::user()->created_at->format('Y-m-d') }}</h4>
                
                </div>
                <div class="buttoncenter"><a class="btn btn-small btn-warning" href="{{ URL::to('home/edit/' . Auth::user()->id) }}">Edit Profile</a></div>
                </div>
                <div class="panel-heading">Booking History</div>
                <div class="panel-body">
                @if($facilityhistory->count() == 0)
                <h3 class="text-center">You have not made any Bookings yet, you can do so by <a href="{{ URL::to('book') }}">clicking here</a></h3>
                @else
                <h4 class="text-center">You have made <b>{{$facilityhistory->count() + $classhistory->count()}}</b> Bookings in total since you became a member, thats <b>{{$facilityhistory->count()}}</b> Facility and <b>{{$classhistory->count()}}</b> Class bookings.</h4>
                <div class="buttoncenter">
                <a class="btn btn-small btn-success" href="{{ URL::to('home/viewbookings/') }}">View History</a>
                <a class="btn btn-small btn-info" href="{{ URL::to('home/statistics/') }}">More Statistics</a>
                </div>
                @endif
                </div>
                </div>
        </div>
    </div>
</div>
@endsection
