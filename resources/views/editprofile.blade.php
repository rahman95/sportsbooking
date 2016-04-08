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
                    @if (Auth::user()->pic == "" && Auth::user()->gender == "male")
                    <img src="/img/default/default-male.png" class="center-block img-responsive img-circle" style="width: 20%; height: 20%" alt="profilepic">
                    @elseif (Auth::user()->pic == "" && Auth::user()->gender == "female")
                    <img src="/img/default/default-female.png" class="center-block img-responsive img-circle" style="width: 20%; height: 20%" alt="profilepic">
                    @else
                    <img src="/uploads/{{Auth::user()->pic}}.png" class="center-block img-responsive img-circle" style="width: 20%; height: 20%" alt="profilepic">
                    @endif
                    <p class="text-center">
                    <br>
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
                    <a class="btn btn-small btn-info" data-toggle="modal" data-target="#myModal">Change Profile Picture</a>
                    </div>
                    {{ Form::close() }}
                    </div>
                    
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="vertical-alignment-helper">
                        <div class="modal-dialog vertical-align-center">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span>

                                    </button>
                                     <h4 class="modal-title" id="myModalLabel">Change Profile Picture</h4>

                                </div>
                                <div class="modal-body">
                                    <form action="{{ URL::to('home/edit/upload') }}" method="post" enctype="multipart/form-data">
                                    <label>Select image to Upload:</label>
                                    <input type="file" name="file" id="file">
                                </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" name="submit" class="btn btn-primary">Upload Image</button>
                                    <input type="hidden" value="{{ csrf_token() }}" name="_token">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
