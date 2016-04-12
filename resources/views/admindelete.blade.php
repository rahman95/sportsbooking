@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">All Bookings ({{$classes->count() + $facilities->count()}})</div>
                <div class="panel-body">
                <div class="col-md-6">
                <h3 class="text-center">Classes({{$classes->count()}})</h3>
                <table>
                <tr>
                <th>ID</th>
                <th>Class Type</th>
                <th>Booking Date</th>
                <th>Booking Time</th>
                <th>Manage</th>
                </tr>
                @foreach($classes as $class)
                <tr>
                <td>{{$class->id}}</td>
                <td>{{$class->classtype}}</td>
                <td>{{$class->bookingdate}}</td>
                <td>{{$class->bookingtime}}:00</td>
                <td>
                        {{ Form::open(array('url' => 'book/class/delete/' . $class->id)) }}
                        {{ Form::hidden('_method', 'DELETE') }}
                        {{ Form::submit('Delete Booking', array('class' => 'btn btn-xs btn-danger')) }}
                        {{ Form::close() }} 
                </td>
                </tr>
                @endforeach
                
                </table>
                </div>
                <div class="col-md-6">
                <h3 class="text-center">Facilities({{$facilities->count()}})</h3>
                <table>
                <tr>
                <th>ID</th>
                <th>Facility Type</th>
                <th>Booking Date</th>
                <th>Booking Time</th>
                <th colspan="2">Manage</th>
                </tr>
                @foreach($facilities as $facility)
                <tr>
                <td>{{$facility->id}}</td>
                <td>{{$facility->facilitytype}}</td>
                <td>{{$facility->bookingdate}}</td>
                <td>{{$facility->bookingtime}}:00</td>
                <td>
                        {{ Form::open(array('url' => 'book/facility/delete/' . $facility->id)) }}
                        {{ Form::hidden('_method', 'DELETE') }}
                        {{ Form::submit('Delete Booking', array('class' => 'btn btn-xs btn-danger')) }}
                        {{ Form::close() }} 
                </td>
                </tr>
                @endforeach
                </table>
                </div> 

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
