{{-- Parent Layout --}}
@extends('_layout.user-panel.master.smart_banking_layout')
@section('page_header')
<div class="page-header">
    <div class="container-fluid">
        <h2 class="h5 no-margin-bottom">Stock Market</h2>
    </div>
</div>
@stop

{{-- Body Main Content --}}
@section('body_main_content')
<style>
    .logo-photo {
        object-fit: cover;
        display: inline-block;
        width: 35px;
        height: 35px;
        border-radius: 100%;
        margin: 0 10px;
    }
</style>

<section class="no-padding-bottom">
    <!-- Breadcrumb-->
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Market Data</li>
        </ul>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-9">
                <div class="row">
                    <div class="col-6">
                        <div class="stats-2-block block d-flex pb-5">
                            <div class="stats-2 d-flex">
                                <div class="stats-2-arrow low"><i class="fa fa-caret-down"></i></div>
                                <div class="stats-2-content"><strong class="d-block"
                                        id="yesterdayNum">5.657</strong><span class="d-block">Yesterday </span>
                                    <div class="progress progress-template progress-small">
                                        <div role="progressbar" style="width: 60%;" aria-valuenow="30" aria-valuemin="0"
                                            aria-valuemax="100"
                                            class="progress-bar progress-bar-template progress-bar-small dashbg-2">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="stats-2 d-flex">
                                <div class="stats-2-arrow height"><i class="fa fa-caret-up"></i></div>
                                <div class="stats-2-content"><strong class="d-block" id="todayNum">3.1459</strong><span
                                        class="d-block">Today</span>
                                    <div class="progress progress-template progress-small">
                                        <div role="progressbar" style="width: 35%;" aria-valuenow="30" aria-valuemin="0"
                                            aria-valuemax="100"
                                            class="progress-bar progress-bar-template progress-bar-small dashbg-3">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="stats-3-block block d-flex pb-4">
                            <div class="stats-3"><strong class="d-block">745</strong><span class="d-block">Total
                                    Volume</span>
                                <div class="progress progress-template progress-small">
                                    <div role="progressbar" style="width: 35%;" aria-valuenow="30" aria-valuemin="0"
                                        aria-valuemax="100"
                                        class="progress-bar progress-bar-template progress-bar-small dashbg-1"></div>
                                </div>
                            </div>
                            <div class="stats-3 d-flex justify-content-between text-center">
                                <div class="item"><strong class="d-block strong-sm">4.124</strong><span
                                        class="d-block span-sm">Hits</span>
                                    <div class="line"></div>
                                    <small>+246</small>
                                </div>
                                <div class="item"><strong class="d-block strong-sm">2.147</strong><span
                                        class="d-block span-sm">Social</span>
                                    <div class="line"></div>
                                    <small>+416</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="line-cahrt block" id="bankcharts">
                    <canvas id="bankchart"></canvas>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="messages-block block">
                    <div class="title"><strong>Stock List</strong></div>
                    <div class="messages">
                        @foreach($rows as $row)
                        <a href="javascript:setData('{{$row->code}}')" class="message d-flex align-items-center"
                            onclick="setData('{{$row->code}}')">
                            <div class="profile"><img src="{{unserialize($row->icon)[0]}}" alt="{{$row->name}}" class="logo-photo">
                            </div>
                            <div class="content"><strong class="d-block">{{$row->name}}</strong><span
                                    class="d-block">{{$row->code}}.HK</span></div>
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@stop

{{-- Body End Scripts --}}
@section('body_end_scripts')
<script>
    @if(sizeof($rows)>0)

        // ------------------------------------------------------- //
        // Line Chart
        // ------------------------------------------------------ //
        var data = [];
        var label = [];
        var name = "";

        var legendState = true;
        if ($(window).outerWidth() < 576) {
            legendState = false;
        }
        setData("{{$rows[0]->code}}");

        for (i = 1; i <= 50; i++) {
            label.push(i.toString());
        }

        var LINECHART = $('#bankchart');
        var myLineChart = new Chart(LINECHART, {
            type: 'line',
            options: {
                scales: {
                    xAxes: [{
                        display: true,
                        gridLines: {
                            display: false
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            max: Math.max(...data) + 1.0,
                            min: Math.min(...data) - 1.0
                        },
                        display: true,
                        gridLines: {
                            display: false
                        }
                    }]
                },
                legend: {
                    display: legendState
                }
            },
            data: {
                labels: label,
                datasets: [
                    // {
                    //     label: "HSI",
                    //     fill: true,
                    //     lineTension: 0.2,
                    //     backgroundColor: "transparent",
                    //     borderColor: '#864DD9',
                    //     pointBorderColor: '#864DD9',
                    //     pointHoverBackgroundColor: '#864DD9',
                    //     borderCapStyle: 'butt',
                    //     borderDash: [],
                    //     borderDashOffset: 0.0,
                    //     borderJoinStyle: 'miter',
                    //     borderWidth: 2,
                    //     pointBackgroundColor: "#fff",
                    //     pointBorderWidth: 5,
                    //     pointHoverRadius: 5,
                    //     pointHoverBorderColor: "#fff",
                    //     pointHoverBorderWidth: 2,
                    //     pointRadius: 1,
                    //     pointHitRadius: 0,
                    //     data: data,
                    //     spanGaps: false
                    // },
                    {
                        label: name,
                        fill: true,
                        lineTension: 0.2,
                        backgroundColor: "transparent",
                        borderColor: "#EF8C99",
                        pointBorderColor: '#EF8C99',
                        pointHoverBackgroundColor: "#EF8C99",
                        borderCapStyle: 'butt',
                        borderDash: [],
                        borderDashOffset: 0.0,
                        borderJoinStyle: 'miter',
                        borderWidth: 2,
                        pointBackgroundColor: "#fff",
                        pointBorderWidth: 5,
                        pointHoverRadius: 5,
                        pointHoverBorderColor: "#fff",
                        pointHoverBorderWidth: 2,
                        pointRadius: 1,
                        pointHitRadius: 10,
                        data: data,
                        spanGaps: false
                    }
                ]
            }
        });

        function setData(type) {
            switch (type) {
                
                @foreach($rows as $row)
                case "{{$row->code}}":
                    name = "{{$row->name}}";
                    data = [
                        @foreach(unserialize($row->data) as $data)
                        {{$data}},
                        @endforeach
                    ];
                    break;
                @endforeach
                
            }
            $('#yesterdayNum').text(data[1]);
            $('#todayNum').text(data[0]);
            $('#bankchart').remove(); // this is my <canvas> element
            $('#bankcharts').append('<canvas id="bankchart"><canvas>');
            LINECHART = $('#bankchart');
            myLineChart = new Chart(LINECHART, {
                type: 'line',
                options: {
                    scales: {
                        xAxes: [{
                            display: true,
                            gridLines: {
                                display: false
                            }
                        }],
                        yAxes: [{
                            ticks: {
                                max: Math.max(...data) + 1.0,
                                min: Math.min(...data) - 1.0
                            },
                            display: true,
                            gridLines: {
                                display: false
                            }
                        }]
                    },
                    legend: {
                        display: legendState
                    }
                },
                data: {
                    labels: label,
                    datasets: [
                        // {
                        //     label: "HSI",
                        //     fill: true,
                        //     lineTension: 0.2,
                        //     backgroundColor: "transparent",
                        //     borderColor: '#864DD9',
                        //     pointBorderColor: '#864DD9',
                        //     pointHoverBackgroundColor: '#864DD9',
                        //     borderCapStyle: 'butt',
                        //     borderDash: [],
                        //     borderDashOffset: 0.0,
                        //     borderJoinStyle: 'miter',
                        //     borderWidth: 2,
                        //     pointBackgroundColor: "#fff",
                        //     pointBorderWidth: 5,
                        //     pointHoverRadius: 5,
                        //     pointHoverBorderColor: "#fff",
                        //     pointHoverBorderWidth: 2,
                        //     pointRadius: 1,
                        //     pointHitRadius: 0,
                        //     data: data,
                        //     spanGaps: false
                        // },
                        {
                            label: name,
                            fill: true,
                            lineTension: 0.2,
                            backgroundColor: "transparent",
                            borderColor: "#EF8C99",
                            pointBorderColor: '#EF8C99',
                            pointHoverBackgroundColor: "#EF8C99",
                            borderCapStyle: 'butt',
                            borderDash: [],
                            borderDashOffset: 0.0,
                            borderJoinStyle: 'miter',
                            borderWidth: 2,
                            pointBackgroundColor: "#fff",
                            pointBorderWidth: 5,
                            pointHoverRadius: 5,
                            pointHoverBorderColor: "#fff",
                            pointHoverBorderWidth: 2,
                            pointRadius: 1,
                            pointHitRadius: 10,
                            data: data,
                            spanGaps: false
                        }
                    ]
                }
            });
        }

        @endif


</script>
@stop
