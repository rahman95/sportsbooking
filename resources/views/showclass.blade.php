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
                    <h1>ID: {{ $class->id }}</h1>
                        <p>
                            <strong>Booking Type:</strong> {{ $class->classtype }}<br>
                            <strong>Booking Date:</strong> {{ $class->bookingdate }}<br>
                            <strong>Booking Time:</strong> {{ $class->bookingtime }}:00<br>
                            <strong>Booking By:</strong> {{ $class->bookedby }}
                        </p>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
