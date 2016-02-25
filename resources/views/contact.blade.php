@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Opening Times</div>
                <div class="panel-body">
                    Monday-Friday
                    <br>
                    11am-11pm
                    <br>
                    Saturday & Sunday
                    <br>
                    9am-11pm
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

@extends('layouts.footer')
