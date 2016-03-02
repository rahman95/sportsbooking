@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Classes</div>
                <div class="panel-body">
                <div class="col-md-6">
                @if (Session::has('message'))
                <div class="alert alert-success text-center">{{ Session::get('message') }}</div>
                @endif
                    <h4 class="text-center">Book Class</h4>
                    <div class=".col-md-6">
                    {!! BootForm::open() !!}
                      <div class="form-group">
                         {!! BootForm::select('Type of Class', 'type')->options([ '' => '', 'fitness' => 'Fitness', 'strength' => 'Strength'])->select('') !!}
                              </div>
                    </div>

                    <div class=".col-md-6">
                         {!! BootForm::date('Booking Date', 'date') !!}
                    </div>

                    <div class=".col-md-6">
                      <div class="form-group">
                        {!! BootForm::select('Preffered Time', 'time')->options([ '' => '', 'morning' => 'Morning', 'evening' => 'Evening'])->select('') !!}
                              </div>
                    </div>


                    <div class="col-sm-12 col-md-12">
                    <div class="buttoncenter">
                        {!! BootForm::submit('<i class="fa fa-bookmark"></i> Book') !!}
                    </div>
                    </div>
                    {!! BootForm::close() !!}
                    </div>
                    </form>
                <div class="col-md-6">
                <h3 class="text-center"><br><br><br><i class="fa fa-search-plus"></i> Available Classes will be displayed here after search</h3>
                @foreach($bookingclasses as $key => $value)
                        <tr>
                        <td>{{ $value->id }}</td>
                        <td>{{ $value->classtype }}</td>
                        <td>{{ $value->bookingdate }}</td>
                        <td>{{ $value->bookingtime }}</td>

                        <!-- we will also add show, edit, and delete buttons -->
                        <td>

                            <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
                            <!-- we will add this later since its a little more complicated than the other two buttons --

                            <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
                            <a class="btn btn-small btn-success" href="{{ URL::to('nerds/' . $value->id) }}">Show</a>

                            <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
                            <a class="btn btn-small btn-info" href="{{ URL::to('nerds/' . $value->id . '/edit') }}">Edit</a><br><br>

                        </td>
                    </tr>
                @endforeach

                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
