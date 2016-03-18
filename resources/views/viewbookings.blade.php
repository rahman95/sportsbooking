@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Booking History</div>
                <div class="panel-body">
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

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
