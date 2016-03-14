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
                        {!! BootForm::select('Booking Time', 'time')->options([ '' => '', '11' => '11:00', '12' => '12:00', '13' => '13:00', '14' => '14:00', '15' => '15:00', '16' => '16:00', '17' => '17:00', '18' => '18:00', '19' => '19:00', '20' => '20:00', '21' => '21:00', '22' => '22:00', '23' => '23:00'])->select('') !!}
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
                <h4 class="text-center text-muted">(<i class="fa fa-check" style="color:green"></i> is <b>free</b>, and <i class="fa fa-times"style="color:red"></i> and is <b>booked</b>)</h4>
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
                    @foreach(range(11,23) as $key => $time)
                    <tr>
                        <td>{{$time}}:00</td>
                        <td> @if($pitch1->where('bookingtime', $time)->count() == 0)
                             <i class="fa fa-check" style="color:green"></i>
                             @else
                             <i class="fa fa-times"style="color:red"></i>
                             @endif 
                        </td>
                        <td> @if($pitch2->where('bookingtime', $time)->count() == 0)
                             <i class="fa fa-check" style="color:green"></i>
                             @else
                             <i class="fa fa-times"style="color:red"></i>
                             @endif 
                       </td>
                    </tr>
                    @endforeach
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
                    @foreach(range('11','23') as $time)
                    <tr>
                        <td>{{$time}}:00</td>
                        <td> @if($court1->where('bookingtime', $time)->count() == 0)
                             <i class="fa fa-check" style="color:green"></i>
                             @else
                             <i class="fa fa-times"style="color:red"></i>
                             @endif 
                        </td>
                        <td> @if($court2->where('bookingtime', $time)->count() == 0)
                             <i class="fa fa-check" style="color:green"></i>
                             @else
                             <i class="fa fa-times"style="color:red"></i>
                             @endif 
                       </td>
                    </tr>
                    @endforeach
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
                        @foreach(range('11','23') as $time)
                    <tr>
                        <td>{{$time}}:00</td>
                        <td> @if($hall->where('bookingtime', $time)->count() == 0)
                             <i class="fa fa-check" style="color:green"></i>
                             @else
                             <i class="fa fa-times"style="color:red"></i>
                             @endif 
                       </td>
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
