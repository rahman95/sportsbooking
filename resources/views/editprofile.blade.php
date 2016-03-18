@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Profile</div>
                <div class="panel-body">
                    @if (Session::has('message'))
                    <div class="alert alert-success text-center">{{ Session::get('message') }}</div>
                    @endif
                    @if (Session::has('error'))
                    <div class="alert alert-danger text-center">{{ Session::get('error') }}</div>
                    @endif
                    <p class="text-center">
                       <strong>Name:</strong> {{ $user->name }}<br>
                       <strong>Email:</strong> {{ $user->email }}<br>
                   </p>

                    {{ Form::model($user, array('url' => 'home/edit', $user->id)) }}
                    {{ Form::label('gender', 'Gender') }}
                    {{ Form::select('gender', array('female' => 'Female', 'male' => 'Male'), null, array('class' => 'form-control')) }}

                    {{ Form::label('dob', 'Date of Birth') }}
                    {{ Form::date('dob', null, array('class' => 'form-control')) }}

                    <div class="buttoncenter">
                    {!! Form::submit('Update Details', array('class' => 'btn btn-success')) !!}
                    <a class="btn btn-small btn-danger" href="{{ URL::to('home/editpass/' . $user->id) }}">Change Password</a>
                    </div>
                    {{ Form::close() }}

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
