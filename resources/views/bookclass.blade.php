@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Classes</div>
                <div class="panel-body">
                <div class="alert alert-info" role="alert"><i class="fa fa-info-circle"></i> Please be advised that each class is limited to <b>10 members!</b></div>
                @if (Session::has('message'))
                <div class="alert alert-success text-center">{{ Session::get('message') }}</div>
                @endif
                <div class="row">
                <div class="col-md-6">
                    <h3 class="text-center">Book Class</h3>
                    <div class=".col-md-6">
                    {!! BootForm::open() !!}
                      <div class="form-group">
                         {!! BootForm::select('Type of Class', 'type')->options([ '' => '', 'fitness' => 'Fitness', 'strength' => 'Strength'])->select('') !!}
                              </div>
                    </div>

                    <div class=".col-md-6">
                        <label>Booking Date</label>
                         <div class="form-group date" id="datepicker1">
                             <input type="text" class="form-control" name="date" id="from_date" data-date-format="YYYY-MM-DD" value="">
                              <span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
                              <script type="text/javascript">
                                  $(function () {
                                    $('#datepicker1').datetimepicker({
                                      pickTime: false,
                                      useCurrent: false
                                    });
                                  });
                              </script>
                          </div>
                    </div>

                    <div class=".col-md-6">
                      <div class="form-group">
                        {!! BootForm::select('Preffered Time', 'time')->options([ '' => '', 'morning' => '11:00', 'evening' => '20:00'])->select('') !!}
                              </div>
                    </div>


                    <div class="col-sm-12 col-md-12">
                    <div class="buttoncenter">
                        {!! BootForm::submit('<i class="fa fa-bookmark"></i> Book Now') !!}
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
                <h3 class="text-center">Today's Availability</h3>
                <br>
                <div class="col-md-6">
                <h4 class="text-center">Fitness Classes</h4>
                <table>
                    <tr>
                        <th>Class Type</th>
                        <th>Class Date</th>
                        <th>Class Time</th>
                        <th>Availability?</th>     
                    </tr>
                @foreach($bookingclasses as $key => $value)
                    <tr>
                        <td>{{ $value->classtype }}</td>
                        <td>{{ $value->bookingdate }}</td>
                        <td>{{ $value->bookingtime }}</td>
                    </tr>
                @endforeach
                </table>
                </div>
                <div class="col-md-6">
                <h4 class="text-center">Strength Classes</h4>
                <table>
                    <tr>
                        <th>Class Type</th>
                        <th>Class Date</th>
                        <th>Class Time</th>
                        <th>Availability?</th>    
                    </tr>
                @foreach($bookingclasses as $key => $value)
                    <tr>
                        <td>{{ $value->classtype }}</td>
                        <td>{{ $value->bookingdate }}</td>
                        <td>{{ $value->bookingtime }}</td>
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
