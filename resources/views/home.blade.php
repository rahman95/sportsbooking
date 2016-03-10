@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-primary">
                <div class="panel-heading text-center">Your Dashboard</div>
                <div class="panel-body">
                </div>
                <div class="panel-heading">Upcoming Bookings</div>
                <div class="panel-body">
                <div class="col-md-6">
                <h4 class="text-center">Classes</h4>
                <br>
                @foreach($myclass as $class)
                <table>
                <tr>
                    <td>{{ $class->classtype }}</td>
                    <td>{{ $class->bookingdate }}</td>
                    <td>{{ $class->bookingtime }}</td>
                    <td>
                        <a class="btn btn-small btn-success" href="{{ URL::to('book/class/show/' . $class->id) }}">Show</a>
                    </td>
                    <td>
                        <a class="btn btn-small btn-info" href="{{ URL::to('book/class/edit/' . $class->id) }}">Edit</a>
                    </td>
                </tr>
                </table>
                @endforeach
                </div>
                <div class="col-md-6">
                <h4 class="text-center">Facilities</h4>
                <br>
                @foreach($myfacility as $facility)
                <table>
                <tr>
                    <td>{{ $facility->facilitytype }}</td>
                    <td>{{ $facility->bookingdate }}</td>
                    <td>{{ $facility->bookingtime }}</td>
                    <td>
                        <a class="btn btn-small btn-success" href="{{ URL::to('book/facility/show/' . $facility->id) }}">Show</a>
                    </td>
                    <td>
                        <a class="btn btn-small btn-info" href="{{ URL::to('book/facility/edit/' . $facility->id) }}">Edit</a>
                    </td>
                </tr>
                </table>
                @endforeach
                </div>
                </div>
                <div class="panel-heading">My Account</div>
                <div class="panel-body">
                </div>
                <div class="panel-heading">Booking History</div>
                <div class="panel-body">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
