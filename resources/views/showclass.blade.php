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
                            <strong>Booking By:</strong> {{ Auth::User()->name }}
                        </p>
                        @if ($class->bookingdate >= $today)
                        <a class="btn btn-small btn-success" href="{{ URL::to('book/class/edit/' . $class->id) }}">Edit Booking</a>
                        @else
                        @endif
                        <a class="btn btn-small btn-warning" href="{{ URL::to('book/class/pdf/' . $class->id) }}">Print PDF</a>
                        <h4 class="text-center">Share on Social Media!</h4>
                        <div class="buttoncenter">
                        <a class="btn btn-xs btn-info" href="http://twitter.com/share?text=I just booked a Sports Class on RYSportsCentre, you can too :)"><i class="fa fa-twitter"></i></a>
                        <a class="btn btn-xs btn-danger" href="https://plus.google.com/share?url=http:www.RYSportsCentre.com"><i class="fa fa-google-plus"></i></a>
                        <a class="btn btn-xs btn-primary" href="https://www.facebook.com/sharer/sharer.php?u=www.RYSportsCentre.com"><i class="fa fa-facebook"></i></a>
                        <a class="btn btn-xs btn-default" href="mailto:?subject=Check out RYSportsCentre&body=I just booked a new Sports Class on RYSportsCentre, you can too by signing up. Get in Shape for Summer."><i class="fa fa-envelope"></i></a>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
