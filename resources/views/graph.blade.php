@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
                @if (Session::has('message'))
                <div class="alert alert-success text-center">{{ Session::get('message') }}</div>
                @endif
                @if (Session::has('error'))
                <div class="alert alert-danger text-center">{{ Session::get('error') }}</div>
                @endif
                <div class="panel panel-default">
                <div class="panel-heading">Graphs and Charts</div>
                <div class="panel-body">
                <div class="col-md-6">
                <h2 class="text-center">Classes(All Time)</h2>

                <canvas id="Classpie" width=500 height=500></canvas>
                <script>
                  var options = {
                    inGraphDataShow: true,
                    inGraphDataRadiusPosition: 2,
                    responsive: true,
                    inGraphDataFontColor: 'white'
                }
                var pieData = [
                    {
                        value: {{$fitnesspre}},
                        color: "#c0392b",
                        label: "Fitness"
                    },
                    {
                       value: {{$strengthpre}},
                       color: "#bdc3c7",
                       label: "Strength"
                    }
                ]
                var pieCtx = document.getElementById('Classpie').getContext('2d');
                new Chart(pieCtx).Pie(pieData, options);
                </script>

                    
                </div>
                <div class="col-md-6">
                <h2 class="text-center">Facilities(All Time)</h2>
                <canvas id="Facilitypie" width=500 height=500></canvas>
                <script>
                  var options = {
                    inGraphDataShow: true,
                    inGraphDataRadiusPosition: 2,
                    responsive: true,
                    inGraphDataFontColor: 'white'
                }
                var pieData = [
                    {
                        value: {{$pitch1pre}},
                        color: "#1abc9c",
                        label: "Pitch 1"
                    },
                    {
                       value: {{$pitch2pre}},
                       color: "#2ecc71",
                       label: "Pitch 2"
                    },
                    {
                        value: {{$court1pre}},
                        color: "#3498db",
                        label: "Court 1"
                    },
                    {
                        value: {{$court2pre}},
                        color: "#9b59b6",
                        label: "Court 2"
                    },
                    {
                        value: {{$hallpre}},
                        color: "#34495e",
                        label: "Hall"
                    }
                ]
                var pieCtx = document.getElementById('Facilitypie').getContext('2d');
                new Chart(pieCtx).Pie(pieData, options);
                </script>
                </div>
                <br>
                <br>
                <canvas id="member" width="400" height="200"></canvas>
                <script>
                    var lineChartData = {
                        labels: ["15-22 March", "22-29 March", "29-05 April", "05-12 April", "12-19 April" ],
                        datasets: [{
                            fillColor: "rgba(231, 76, 60,0)",
                            strokeColor: "rgba(41, 128, 185,1)",
                            pointColor: "rgba(41, 128, 185,1)",
                            label: "Classes",
                            data: [{{$classW1}}, {{$classW2}}, {{$classW3}}, {{$classW4}}, {{$classW5}}]
                        }, {
                            fillColor: "rgba(231, 76, 60,0)",
                            strokeColor: "rgba(231, 76, 60,1)",
                            pointColor: "rgba(231, 76, 60,1)",
                            label: "Facilities",
                            data: [{{$facilityW1}}, {{$facilityW2}}, {{$facilityW3}}, {{$facilityW4}}, {{$facilityW5}}]
                        }]

                    }

                    Chart.defaults.global.animationSteps = 50;
                    Chart.defaults.global.tooltipYPadding = 16;
                    Chart.defaults.global.tooltipCornerRadius = 0;
                    Chart.defaults.global.tooltipTitleFontStyle = "normal";
                    Chart.defaults.global.tooltipFillColor = "rgba(0,160,0,0.8)";
                    Chart.defaults.global.animationEasing = "easeOutBounce";
                    Chart.defaults.global.responsive = true;
                    Chart.defaults.global.scaleLineColor = "black";
                    Chart.defaults.global.scaleFontSize = 16;

                    var ctx = document.getElementById("member").getContext("2d");
                    var LineChartDemo = new Chart(ctx).Line(lineChartData, {
                        pointDotRadius: 10,
                        bezierCurve: true,
                        responsive: true,
                        scaleShowVerticalLines: false,
                        scaleGridLineColor: "black"
                    });
                </script>
                </div>
                </div>
        </div>
    </div>
</div>
@endsection
