@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Show Booking</div>
                <div class="panel-body">
                    <h1>ID: {{ $class->id }}</h1>

                    {{ Form::model($class, array('route' => array('user.update', $class->id))) }}
                    {{ Form::label('first_name', 'First Name:', array('class' => 'address')) }}
                    {{ Form::text('first_name') }}

                    {{ Form::label('last_name', 'Last Name:', array('class' => 'address')) }}
                    {{ Form::text('last_name') }}

                    {{ Form::label('email', 'E-Mail Address', array('class' => 'address')) }}
                    {{ Form::text('email') }}

                    {{ Form::label('address[street1]', 'Address (Street 1)', array('class' => 'address')) }}
                    {{ Form::text('address[street1]') }}

                    {{ Form::label('address[street2]', 'Address (Street 2)', array('class' => 'address')) }}
                    {{ Form::text('address[street2]') }}

                    {{ Form::label('ddress[city]', 'City', array('class' => 'address')) }}
                    {{ Form::text('address[city]') }}

                    {{ Form::label('address[state]', 'State', array('class' => 'address')) }}
                    {{ Form::text('address[state]') }}

                    {{ Form::label('address[zip]', 'Zip Code', array('class' => 'address')) }}
                    {{ Form::text('address[zip]') }}

                    {{ Form::submit('Send this form!') }}
                    {{ Form::close() }}

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
