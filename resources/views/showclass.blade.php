@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Show Booking</div>
                <div class="panel-body">
                    <h1>ID: {{ $class->id }}</h1>
                        <p>
                            <strong>Booking Type:</strong> {{ $class->classtype }}<br>
                            <strong>Booking Date:</strong> {{ $class->bookingdate }}<br>
                            <strong>Booking Time:</strong> {{ $class->bookingtime }}<br>
                            <strong>Booking By:</strong> {{ $class->bookedby }}
                        </p>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
