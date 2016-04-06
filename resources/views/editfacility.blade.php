@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Facility Booking</div>
                <div class="panel-body">
                    @if (Session::has('message'))
                    <div class="alert alert-success text-center">{{ Session::get('message') }}</div>
                    @endif
                    @if (Session::has('error'))
                    <div class="alert alert-danger text-center">{{ Session::get('error') }}</div>
                    @endif

                    {{ Form::model($facility, array('url' => 'book/facility/update/' . $facility->id, $facility->id)) }}
                    {{ Form::label('facilitytype', 'Facility Type') }}
                    {{ Form::select('facilitytype', array('football1' => 'Football Pitch 1', 'football2' => 'Football Pitch 2', 'tennis1' => 'Tennis Court 1', 'tennis2' => 'Tennis Court 2', 'sportshall' => 'Sports Hall'), null, array('class' => 'form-control')) }}
                    @if ($errors->has('facilitytype'))
                    <span class="help-block">
                        {{ $errors->first('facilitytype') }}
                    </span>
                    @endif

                    {{ Form::label('bookingdate', 'Booking Date') }}
                    {{ Form::date('bookingdate', null, array('class' => 'form-control')) }}
                    @if ($errors->has('bookingdate'))
                    <span class="help-block">
                        {{ $errors->first('bookingdate') }}
                    </span>
                    @endif

                    {{ Form::label('bookingtime', 'Booking Time') }}
                    {{ Form::select('bookingtime', array('11' => '11:00', '12' => '12:00', '13' => '13:00', '14' => '14:00', '15' => '15:00', '16' => '16:00', '17' => '17:00', '18' => '18:00', '19' => '19:00', '20' => '20:00', '21' => '21:00', '22' => '22:00', '23' => '23:00'), null, array('class' => 'form-control')) }}
                    @if ($errors->has('bookingtime'))
                    <span class="help-block">
                        {{ $errors->first('bookingtime') }}
                    </span>
                    @endif

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
