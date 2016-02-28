@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Book Facilities & Classes</div>
                <div class="panel-body">
                <div class="col-md-6">

                <div id="imagelist">
                <a href="{{ url('/book/class') }}">
                <img src="img/book/1.png" class="img-responsive">
                <p class="imgtext">
                <span>
                    <span>Book Class</span>
                </span>
                </p>
                </a>
                </div>

                </div>

                <div class="col-md-6">
                <div id="imagelist">
                <a href="{{ url('/book/facility') }}">
                <img src="img/book/2.png" class="img-responsive">
                <p class="imgtext">
                <span>
                <span>Book Sports Facility</span>
                </span>
                </p>
                </a>
                </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
