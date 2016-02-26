@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Slideshow</div>
                <div class="panel-body">
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                  <!-- Indicators -->
                  <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                  </ol>

                  <!-- Wrapper for slides -->
                  <div class="carousel-inner" role="listbox">
                    <div class="item active">
                      <img src="img/slides/slide1.png" alt="Chania">
                      <div class="carousel-caption">
                        <h3>Fitness Classes</h3>
                        <p>We offer a range of sports classes available for both Males and Females.</p>
                      </div>
                    </div>

                    <div class="item">
                      <img src="img/slides/slide2.png" alt="Chania">
                      <div class="carousel-caption">
                        <h3>Strenth Training</h3>
                        <p>We offer Strength and Powerlifiting Training for Beginners to Advanced Users.</p>
                      </div>
                    </div>

                    <div class="item">
                      <img src="img/slides/slide3.png" alt="Flower">
                      <div class="carousel-caption">
                        <h3>Sports Facilities</h3>
                        <p>We have a range of Facilities available to book.</p>
                      </div>
                    </div>

                  <!-- Left and right controls -->
                  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>
                </div>
                <div class="panel-heading">Links</div>
                <div class="panel-body">


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
