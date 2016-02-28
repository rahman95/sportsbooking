@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Facility</div>
                <div class="panel-body">
                <div class="col-md-6">
                <h4 class="text-center">Search Availability</h4>
                    <div class=".col-md-6">
                      <div class="form-group">
                        <label for="facility">Facility</label>
                        <select class="form-control" name="from" id="from">
                                      <option value="football">Football Pitch</option>
                                      <option value="tennis">Tennis Court</option>
                                      <option value="sportshall">Sports Hall</option>
                                  </select>
                              </div>
                    </div>

                    <div class=".col-md-6">
                    <label>Booking Date</label>
                      <div class="form-group date" id="datepicker1">
                         <input type="text" class="form-control" name="from_date" id="from_date" data-date-format="DD-MM-YYYY" value="">
                          <span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
                          <script type="text/javascript">
                              $(function () {
                                $('#datepicker1').datetimepicker({
                                  pickTime: false,
                                  useCurrent: true
                                });
                              });
                          </script>
                      </div>
                    </div>

                    <div class=".col-md-6">
                      <div class="form-group">
                        <label for="time">Preffered Time</label>
                        <select class="form-control" name="from" id="from">
                                      <option value="morning">Morning</option>
                                      <option value="evening">Evening</option>
                                  </select>
                              </div>
                    </div>

                    <div class=".col-md-6">
                      <div class="form-group">
                        <label for="gear">Require Gear</label>
                        <span class="text-muted">(e.g. balls, rackets etc.)</span>
                        <select class="form-control" name="from" id="from">
                                      <option value="y">Yes</option>
                                      <option value="n">No, bringing own</option>
                                  </select>
                              </div>
                    </div>


                    <div class="col-sm-12 col-md-12">
                    <div class="buttoncenter">
                        <button type="button" id="check" class="btn btn-success" value="submit"><i class="fa fa-search"></i> Search</button>
                    </div>
                    </div>
                    </div>
                <div class="col-md-6">
                <h3 class="text-center"><br><br><br><br><br><i class="fa fa-search-plus"></i> Available times will be displayed here after search</h3>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
