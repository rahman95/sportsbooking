@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Classes</div>
                <div class="panel-body">
                @if (Session::has('message'))
                <div class="alert alert-success text-center">{{ Session::get('message') }}</div>
                @endif
                @if (Session::has('error'))
                <div class="alert alert-danger text-center">{{ Session::get('error') }}</div>
                @endif
                <div class="row">
                <div class="col-md-6">
                    <h3 class="text-center">Book Class</h3>
                    <div class=".col-md-6">
                    {!! BootForm::open() !!}
                      <div class="form-group">
                         {!! BootForm::select('Type of Class', 'class')->options([ '' => '', 'fitness' => 'Fitness', 'strength' => 'Strength'])->select('') !!}
                              </div>
                    </div>

                    <div class=".col-md-6">
                        {!!BootForm::Date('Booking Date','date')!!}
                    </div>

                    <div class=".col-md-6">
                      <div class="form-group">
                        {!! BootForm::select('Preffered Time', 'time')->options([ '' => '', '11' => '11:00', '20' => '20:00'])->select('') !!}
                      </div>
                    </div>
                    <div class="col-sm-12 col-md-12">
                    <div class="buttoncenter">
                        {!! Form::submit('Book Now', array('class' => 'btn btn-success')) !!}
                    </div>
                    </div>
                    {!! BootForm::close() !!}
                    </div>
                    </form>
                <div class="col-md-6">
                <h3 class="text-center">Class Schedule</h3>
                <br>
                <h4 class="text-center">Morning Classes</h4>
                <div class="text-center">Fitness Class @ 11:00</div>
                <div class="text-center">Strength Class @ 11:00</div>
                <br>
                <h4 class="text-center">Evening Classes</h4>
                <div class="text-center">Fitness Class @ 20:00</div>
                <div class="text-center">Strength Class @ 20:00</div>

                </div>
                </div>
                <div class="row">
                <br>
                <br>
                <h3 class="text-center">Today's Availability</h3>
                <br>
                <div class="col-md-6">
                <h4 class="text-center">Fitness Classes</h4>
                <table>
                    <tr>
                        <th>Class</th>
                        <th>Time</th>
                        <th>Bookings</th>     
                    </tr>
                    <tr>
                        <td>Fitness</td>
                        <td>11am</td>
                        <td><b>{{$morningfitness}}</b></td>
                    </tr>
                    <tr>
                        <td>Fitness</td>
                        <td>8pm</td>
                        <td><b>{{($eveningfitness)}}</b></td>
                    </tr>
                </table>
                </div>
                <div class="col-md-6">
                <h4 class="text-center">Strength Classes</h4>
                <table>
                    <tr>
                        <th>Class</th>
                        <th>Time</th>
                        <th>Bookings</th>     
                    </tr>
                    <tr>
                        <td>Strength</td>
                        <td>11am</td>
                        <td><b>{{$morningstrength}}</b></td>

                    </tr>
                    <tr>
                        <td>Strength</td>
                        <td>8pm</td>
                        <td><b>{{$eveningstrength}}</b></td>
   
                    </tr>
                </table>
                </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
