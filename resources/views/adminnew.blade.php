@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Admin Users</div>
                <div class="panel-body">
                @if (Session::has('message'))
                <div class="alert alert-success text-center">{{ Session::get('message') }}</div>
                @endif
                @if (Session::has('error'))
                <div class="alert alert-danger text-center">{{ Session::get('error') }}</div>
                @endif
                <div class="row">
                <div class="col-md-6">
                    <h3 class="text-center">User Ranks</h3>
                    <div class=".col-md-6">
                    {!! BootForm::open() !!}
                      <div class="form-group">
                      <label for="user">Select User</label>
                        <select class="form-control" id="user" name="user">
                        @foreach($users as $user)
                          <option value="{{$user->id}}">{{$user->name}}</option>
                        @endforeach
                        </select>
                     </div>
                     </div>

                    <div class=".col-md-6">
                      <div class="form-group">
                        {!! BootForm::select('User Rank', 'rank')->options([ '' => 'Standard', '1' => 'Admin'])->select('') !!}
                      </div>
                    </div>
                    <div class="col-sm-12 col-md-12">
                    <div class="buttoncenter">
                        {!! Form::submit('Update User', array('class' => 'btn btn-success')) !!}
                    </div>
                    </div>
                    {!! BootForm::close() !!}
                    </div>
                    </form>
                <div class="col-md-6">
                <h3 class="text-center">Current Admins({{$admins->count()}})</h3>
                <br>
                <table>
                <tr>
                <th>User ID</th>
                <th>Username</th>
                </tr>
                @foreach($admins as $admin)
                <tr>
                <td>{{$admin->id}}</td>
                <td>{{$admin->name}}</td>
                </tr>
                @endforeach
                </table>
                </div>
                </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
