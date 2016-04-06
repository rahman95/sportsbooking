@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Show Booking</div>
                <div class="panel-body">
                    @if (Session::has('message'))
                    <div class="alert alert-success text-center">{{ Session::get('message') }}</div>
                    @endif
                    <h1>ID: {{ $facility->id }}</h1>
                        <p>
                            <strong>Booking Type:</strong> {{ $facility->facilitytype }}<br>
                            <strong>Booking Date:</strong> {{ $facility->bookingdate }}<br>
                            <strong>Booking Time:</strong> {{ $facility->bookingtime }}:00<br>
                            <strong>Booking By:</strong> {{ $facility->bookedby }}
                        </p>
                        @if ($facility->bookingdate >= $today)
                        <a class="btn btn-small btn-danger" href="{{ URL::to('book/facility/edit/' . $facility->id) }}">Edit Booking</a>
                        @else
                        @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
