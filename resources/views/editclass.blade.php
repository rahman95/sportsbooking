@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Class</div>
                <div class="panel-body">
                    @if (Session::has('message'))
                    <div class="alert alert-success text-center">{{ Session::get('message') }}</div>
                    @endif
                    @if (Session::has('error'))
                    <div class="alert alert-danger text-center">{{ Session::get('error') }}</div>
                    @endif

                    {{ Form::model($class, array('url' => 'book/class/edit', $class->id)) }}
                    {{ Form::label('class', 'Class Type') }}
                    {{ Form::select('class', array('fitness' => 'Fitness', 'strength' => 'Strength'), null, array('class' => 'form-control')) }}

                    {{ Form::label('bookingdate', 'Booking Date') }}
                    {{ Form::date('bookingdate', null, array('class' => 'form-control')) }}

                    {{ Form::label('bookingtime', 'Booking Time') }}
                    {{ Form::select('bookingtime', array('11' => '11:00', '20' => '20:00'), null, array('class' => 'form-control')) }}

                    <div class="buttoncenter">
                    {!! Form::submit('Update Booking', array('class' => 'btn btn-success')) !!}
                    </div>
                    {{ Form::close() }}

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
