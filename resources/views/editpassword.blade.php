@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Password</div>
                <div class="panel-body">
                    @if (Session::has('error'))
                    <div class="alert alert-danger text-center">{{ Session::get('error') }}</div>
                    @endif

                    {{ Form::model($user, array('url' => 'home/editpass', $user->id)) }}
                    {{ Form::label('oldpassword', 'Old Password') }}
                    <input class="form-control" name="oldpassword" type="oldpassword" value="">
                    @if ($errors->has('oldpassword'))
                    <span class="help-block">
                        {{ $errors->first('oldpassword') }}
                    </span>
                    @endif

                    {{ Form::label('password', 'New Password') }}
                    <input class="form-control" name="password" type="password" value="">
                    @if ($errors->has('password'))
                    <span class="help-block">
                        {{ $errors->first('password') }}
                    </span>
                    @endif

                    {{ Form::label('password_confirmation', ' Confirm New Password') }}
                    <input class="form-control" name="password_confirmation" type="password" value="">
                    @if ($errors->has('password_confirmation'))
                    <span class="help-block">
                         {{ $errors->first('password_confirmation')  }} 
                    </span>
                    @endif

                    <div class="buttoncenter">
                    {!! Form::submit('Update Password', array('class' => 'btn btn-success')) !!}
                    </div>
                    {{ Form::close() }}

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
