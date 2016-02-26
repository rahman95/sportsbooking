@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Opening Times</div>
                <div class="panel-body">
                <div class="col-md-4">
                <div style="overflow-x:auto;">
                <table>
                <tr>
                <th>Days</th>
                <th>Times</th>
                </tr>
                <tr>
                <td>Monday-Friday</td>
                <td>11am-11pm</td>
                </tr>
                <tr>
                <td>Saturday</td>
                <td>10am-12am</td>
                </tr>
                <tr>
                <td>Sunday</td>
                <td>11am-11pm</td> 
                </tr>
                </table>
                </div>
                </div>
                <div class="col-md-8">
                <h2>Book now to avoid disappointment!</h2>
                <h3>Call 0113 5568668</h3>
                <h3>Or <a href="{{ url('/book') }}">Book Online</a></h3>
                </div>
                </div>
                <div class="panel-heading">Map</div>
                <div class="panel-body">
                    <div class="map-responsive">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2362.6012772227023!2d-1.6291478846125393!3d53.68973135663634!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x487bdf888f895135%3A0xdfa3c8fbd8ec3dae!2sDewsbury+Sports+Centre!5e0!3m2!1sen!2suk!4v1456419639850" width="915" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="panel-heading">Contact Us</div>
                <div class="panel-body">
                    <h2 class="text-center">Drop us an Email?</h2>
                    <br>
                    <form role="form" class="lu-contact-form" method="post" action="contact.php">
            <div class="col-md-6">
              <div class="form-group">
                <div class="controls">
                  <input type="text" class="form-control" placeholder="Name" name="name">
                </div>
              </div>
              <div class="form-group">
                <div class="controls">
                  <input type="email" class="form-control email" placeholder="Email" name="email">
                </div>
              </div>
              <div class="form-group">
                <div class="controls">
                  <input type="text" class="form-control requiredField" placeholder="Subject" name="subject">
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <div class="controls">
                  <textarea rows="7" class="form-control" placeholder="Message" name="message"></textarea>
                </div>
              </div>
            </div>
            <div class="buttoncenter">
              <button type="submit" id="submit" class="btn btn-default">Send</button>
              </div>
            </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection