@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Facilities</div>
                <div class="panel-body">
                @if (Session::has('message'))
                <div class="alert alert-success text-center">{{ Session::get('message') }}</div>
                @endif
                @if (Session::has('error'))
                <div class="alert alert-danger text-center">{{ Session::get('error') }}</div>
                @endif
                    <h3 class="text-center">Book Facility</h3>
                    <div class=".col-md-6">
                    {!! BootForm::open() !!}
                      <div class="form-group">
                         {!! BootForm::select('Type of Facility', 'facility')->options([ '' => '', 'football1' => 'Football Pitch 1', 'football2' => 'Football Pitch 2', 'tennis1' => 'Tennis Court 1', 'tennis2' => 'Tennis Court 2', 'sportshall' => 'Sports Hall'])->select('') !!}
                              </div>
                    </div>

                    <div class=".col-md-6">
                        {!!BootForm::Date('Booking Date','date')!!}
                    </div>

                    <div class=".col-md-6">
                      <div class="form-group">
                        {!! BootForm::select('Booking Time', 'time')->options([ '' => '', '1100' => '11:00', '1200' => '12:00', '1300' => '13:00', '1400' => '14:00', '1500' => '15:00', '1600' => '16:00', '1700' => '17:00', '1800' => '18:00', '1900' => '19:00', '2000' => '20:00', '2100' => '21:00', '2200' => '22:00', '2300' => '23:00'])->select('') !!}
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
                <div class="row">
                <br>
                <br>
                <br>
                <h3 class="text-center">Today's Availability</h3>
                <h4 class="text-center text-muted">(0 is free, and 1 and is booked.)</h4>
                <div class="col-md-4">
                <br>
                <br>
                <h4 class="text-center">Football Pitches</h4>
                <table>
                    <tr>
                        <th>Time</th>
                        <th>Pitch 1</th>
                        <th>Pitch 2</th>
                    </tr>
                    <tr>
                        <td>11am</td>
                        <td> {{$pitch1->where('bookingtime', '1100')->count()}} </td>
                        <td> {{$pitch2->where('bookingtime', '1100')->count()}} </td>
                    </tr>
                    <tr>
                        <td>12pm</td>
                        <td> {{$pitch1->where('bookingtime', '1200')->count()}} </td>
                        <td> {{$pitch2->where('bookingtime', '1200')->count()}} </td>
                    </tr>
                    <tr>
                        <td>1pm</td>
                        <td> {{$pitch1->where('bookingtime', '1300')->count()}} </td>
                        <td> {{$pitch2->where('bookingtime', '1300')->count()}} </td>
                    </tr>
                    <tr>
                        <td>2pm</td>
                        <td> {{$pitch1->where('bookingtime', '1400')->count()}} </td>
                        <td> {{$pitch2->where('bookingtime', '1400')->count()}} </td>
                    </tr>
                    <tr>
                        <td>3pm</td>
                        <td> {{$pitch1->where('bookingtime', '1500')->count()}} </td>
                        <td> {{$pitch2->where('bookingtime', '1500')->count()}} </td>
                    </tr>
                    <tr>
                        <td>4pm</td>
                        <td> {{$pitch1->where('bookingtime', '1600')->count()}} </td>
                        <td> {{$pitch2->where('bookingtime', '1600')->count()}} </td>
                    </tr>
                    <tr>
                        <td>5pm</td>
                        <td> {{$pitch1->where('bookingtime', '1700')->count()}} </td>
                        <td> {{$pitch2->where('bookingtime', '1700')->count()}} </td>
                    </tr>
                    <tr>
                        <td>6pm</td>
                        <td> {{$pitch1->where('bookingtime', '1800')->count()}} </td>
                        <td> {{$pitch2->where('bookingtime', '1800')->count()}} </td>
                    </tr>
                    <tr>
                        <td>7pm</td>
                        <td> {{$pitch1->where('bookingtime', '1900')->count()}} </td>
                        <td> {{$pitch2->where('bookingtime', '1900')->count()}} </td>
                    </tr>
                    <tr>
                        <td>8pm</td>
                        <td> {{$pitch1->where('bookingtime', '2000')->count()}} </td>
                        <td> {{$pitch2->where('bookingtime', '2000')->count()}} </td>
                    </tr>
                    <tr>
                        <td>9pm</td>
                        <td> {{$pitch1->where('bookingtime', '2100')->count()}} </td>
                        <td> {{$pitch2->where('bookingtime', '2100')->count()}} </td>
                    </tr>
                    <tr>
                        <td>10pm</td>
                        <td> {{$pitch1->where('bookingtime', '2200')->count()}} </td>
                        <td> {{$pitch2->where('bookingtime', '2200')->count()}} </td>
                    </tr>
                    <tr>
                        <td>11pm</td>
                        <td> {{$pitch1->where('bookingtime', '2300')->count()}} </td>
                        <td> {{$pitch2->where('bookingtime', '2300')->count()}} </td>
                    </tr>
                </table>
                </div>
                <div class="col-md-4">
                <br>
                <br>
                <h4 class="text-center">Tennis Courts</h4>
                <table>
                    <tr>
                        <th>Time</th>
                        <th>Court 1</th>
                        <th>Court 2</th>
                    </tr>
                    <tr>
                        <td>11am</td>
                        <td> {{$court1->where('bookingtime', '1100')->count()}} </td>
                        <td> {{$court2->where('bookingtime', '1100')->count()}} </td>
                    </tr>
                    <tr>
                        <td>12pm</td>
                        <td> {{$court1->where('bookingtime', '1200')->count()}} </td>
                        <td> {{$court2->where('bookingtime', '1200')->count()}} </td>
                    </tr>
                    <tr>
                        <td>1pm</td>
                        <td> {{$court1->where('bookingtime', '1300')->count()}} </td>
                        <td> {{$court2->where('bookingtime', '1300')->count()}} </td>
                    </tr>
                    <tr>
                        <td>2pm</td>
                        <td> {{$court1->where('bookingtime', '1400')->count()}} </td>
                        <td> {{$court2->where('bookingtime', '1400')->count()}} </td>
                    </tr>
                    <tr>
                        <td>3pm</td>
                        <td> {{$court1->where('bookingtime', '1500')->count()}} </td>
                        <td> {{$court2->where('bookingtime', '1500')->count()}} </td>
                    </tr>
                    <tr>
                        <td>4pm</td>
                        <td> {{$court1->where('bookingtime', '1600')->count()}} </td>
                        <td> {{$court2->where('bookingtime', '1600')->count()}} </td>
                    </tr>
                    <tr>
                        <td>5pm</td>
                        <td> {{$court1->where('bookingtime', '1700')->count()}} </td>
                        <td> {{$court2->where('bookingtime', '1700')->count()}} </td>
                    </tr>
                    <tr>
                        <td>6pm</td>
                        <td> {{$court1->where('bookingtime', '1800')->count()}} </td>
                        <td> {{$court2->where('bookingtime', '1800')->count()}} </td>
                    </tr>
                    <tr>
                        <td>7pm</td>
                        <td> {{$court1->where('bookingtime', '1900')->count()}} </td>
                        <td> {{$court2->where('bookingtime', '1900')->count()}} </td>
                    </tr>
                    <tr>
                        <td>8pm</td>
                        <td> {{$court1->where('bookingtime', '2000')->count()}} </td>
                        <td> {{$court2->where('bookingtime', '2000')->count()}} </td>
                    </tr>
                    <tr>
                        <td>9pm</td>
                        <td> {{$court1->where('bookingtime', '2100')->count()}} </td>
                        <td> {{$court2->where('bookingtime', '2100')->count()}} </td>
                    </tr>
                    <tr>
                        <td>10pm</td>
                        <td> {{$court1->where('bookingtime', '2200')->count()}} </td>
                        <td> {{$court2->where('bookingtime', '2200')->count()}} </td>
                    </tr>
                    <tr>
                        <td>11pm</td>
                        <td> {{$court1->where('bookingtime', '2300')->count()}} </td>
                        <td> {{$court2->where('bookingtime', '2300')->count()}} </td>
                    </tr>
                </table>
                </div>
                <div class="col-md-4">
                <br>
                <br>
                <h4 class="text-center">Sports Hall</h4>
                <table>
                    <tr>
                        <th>Time</th>
                        <th>Hall</th>
                    </tr>
                    <tr>
                        <td>11am</td>
                        <td> {{$hall->where('bookingtime', '1100')->count()}} </td>
                    </tr>
                    <tr>
                        <td>12pm</td>
                        <td> {{$hall->where('bookingtime', '1200')->count()}} </td>
                    </tr>
                    <tr>
                        <td>1pm</td>
                        <td> {{$hall->where('bookingtime', '1300')->count()}} </td>
                    </tr>
                    <tr>
                        <td>2pm</td>
                        <td> {{$hall->where('bookingtime', '1400')->count()}} </td>
                    </tr>
                    <tr>
                        <td>3pm</td>
                        <td> {{$hall->where('bookingtime', '1500')->count()}} </td>
                    </tr>
                    <tr>
                        <td>4pm</td>
                        <td> {{$hall->where('bookingtime', '1600')->count()}} </td>
                    </tr>
                    <tr>
                        <td>5pm</td>
                        <td> {{$hall->where('bookingtime', '1700')->count()}} </td>
                    </tr>
                    <tr>
                        <td>6pm</td>
                        <td> {{$hall->where('bookingtime', '1800')->count()}} </td>
                    </tr>
                    <tr>
                        <td>7pm</td>
                        <td> {{$hall->where('bookingtime', '1900')->count()}} </td>
                    </tr>
                    <tr>
                        <td>8pm</td>
                        <td> {{$hall->where('bookingtime', '2000')->count()}} </td>
                    </tr>
                    <tr>
                        <td>9pm</td>
                        <td> {{$hall->where('bookingtime', '2100')->count()}} </td>
                    </tr>
                    <tr>
                        <td>10pm</td>
                        <td> {{$hall->where('bookingtime', '2200')->count()}} </td>
                    </tr>
                    <tr>
                        <td>11pm</td>
                        <td> {{$hall->where('bookingtime', '2300')->count()}} </td>
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
