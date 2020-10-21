<!DOCTYPE html>
<html>

<head>
    <title>S SHOP MONITOR</title>
{{--    <meta http-equiv="refresh" content="3; URL={{config("app.url")}}/s-shop-monitor">--}}
    @include('_layout.user-panel.html_head')
    <link href='https://fonts.googleapis.com/css?family=Orbitron' rel='stylesheet' type='text/css'>
    <script defer src="{{asset('js/face/face-api.min.js')}}"></script>
    <script defer src="{{asset('js/face/monitor_sketch.js')}}"></script>
</head>

<style>
    @font-face {
        font-family: 'Digital Numbers Regular';
        font-style: normal;
        font-weight: normal;
        src: local('Digital Numbers Regular'),
        url('{{asset("vendor/digital-numbers-cufonfonts-webfont/DigitalNumbers-Regular.woff")}}') format('woff');
    }
</style>

<body style="overflow: hidden;">
<div class="page-content w-100 pl-4 pt-2">
    <video id="video" width="1" height="1" class="card-img-top" autoplay muted></video>
    <div class="row w-100">

        <div class="col">
            <h3>Face recognition analysis <span id="loading"> - Initializing...</span></h3>
            <div class="card text-white p-3 ml-auto" style="min-width: 400px;min-height: 80vh;">
                <div class="card-body align-middle" id="result">

                    <div class="row pt-3">
                        <div class="col-md-4">
                            <canvas id="pieChart"
                                    style="min-height: 200px; height: 200px; max-height: 200px; max-width: 100%;"></canvas>
                        </div>
                        <div class="col-md-8">
                            <canvas id="lineChart"
                                    style="min-height: 200px; height: 200px; max-height: 200px; max-width: 100%;"></canvas>
                        </div>
                    </div>
                </div>

            </div>

{{--            <div class="card text-white  ml-3 mr-auto" style="min-width: 20rem;min-height: 80vh;">--}}
{{--                <div class="card-body">--}}
{{--                    <h5 class="card-text text-center" id="time"></h5>--}}
{{--                    <canvas id="faceCanvas"></canvas>--}}
{{--                </div>--}}
{{--            </div>--}}

        </div>

        <div class="col-3">

            <h3>Locker Status</h3>
            <div class="checklist-block mb-3">
                @foreach ($result['lockersRecords'] as $locker)
                    <div class="item d-flex align-items-center pt-3 pb-3">
                        Locker #{{$locker['locker']->id}} | Status: <strong class="ml-2">@if($locker['locker']->is_using==1)
                                <i class="fa fa-check text-success mr-2"></i>Free @else <i
                                    class="fa fa-times text-danger mr-2"></i>Occupy @endif</strong>
                        @if(!is_null($locker['status']) && $locker['order']>0) &nbsp|&nbsp <strong>
                            @if($locker['order']==$result['lockerStatusCount'])
                                <div class="row">
                                    <div class="col">
                                        <span class="text-success">Opening</span>
                                        <div class="spinner-border spinner-border-sm text-success"> </div>
                                    </div>
                                </div>
                            @else <span class="text-warning">Queue {{abs($locker['order']-$result['lockerStatusCount'])+1}}</span>
                            @endif </strong>
                        @endif
                    </div>
                @endforeach
            </div>

            <h3>Vending Machine Status</h3>
            <div class="checklist-block mb-3">
                @for($i = 1;$i<=6;$i++) <div class="item d-flex align-items-center pt-3 pb-3">
                    Channel #{{$i}} &nbsp|
                    @if(!is_null($result['vendingQueue'])) <i class="fa fa-check text-success mr-2 ml-2"></i><strong>Normal</strong>
                    @else <i class="fa fa-times text-danger mr-2 ml-2"></i><span class="text-danger"> &nbspVacant</span>
                    @endif

                    @if(in_array($i,$result['vendingQueue'])) &nbsp&nbsp|&nbsp<strong>
                        @if($result['vending_queue'][0]==$i)
                            <div class="row">
                                <div class="col">
                                    <span class="text-success">Opening</span>
                                    <div class="spinner-border spinner-border-sm text-success"> </div>
                                </div>
                            </div>
                        @else
                            <span class="text-warning">Queue {{array_keys($result['vendingQueue'],$i)[0]+1}}</span>
                        @endif </strong>
                    @endif
                </div>
                @endfor
            </div>
        </div>

        <div class="col-3">
            <h3>Last Updated</h3>
            <div class="text-right align-middle mb-3 row">
                <div class="col">
                    <span class="align-middle pt-2 h5 text-warning" id="datetime"></span>
                </div>
                <div class="col-3">
                    <div class="sk-rotating-plane"></div>
                </div>
            </div>
            TODO
            temperature IOT arduino post data to server
            transaction analysis
            chart

            <div class="statistic-block block pt-1 pb-3 mb-3">
                <div class="progress-details d-flex align-items-md-center justify-content-between">
                    <div class="title">
                        <strong style="font-size: medium"><i class="icon-contract"></i> Total Order</strong>
                    </div>
                    <div class="number dashtext-2">{{$result['totalOrderCount']}}</div>
                </div>
                <div class="progress progress-template">
                    <div role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"
                         class="progress-bar progress-bar-template dashbg-2"></div>
                </div>
            </div>

            <div class="statistic-block block pt-1 pb-3 mb-3">
                <div class="progress-details d-flex align-items-md-center justify-content-between">
                    <div class="title">
                        <strong style="font-size: medium"><i class="icon-presentation"></i> Today Order</strong>
                    </div>
                    <div class="number dashtext-3">{{$result['todayOrderCount']}}</div>
                </div>
                <div class="progress progress-template">
                    <div role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"
                         class="progress-bar progress-bar-template dashbg-3"></div>
                </div>
            </div>

{{--            @if(sizeof($newOrder)>0)--}}
{{--                <h3>Recently Sold</h3>--}}
{{--                <div class="card bg-dark text-white mb-3">--}}
{{--                    <img src="{{asset($newOrder[0]->product->url)}}" class="card-img" alt="{{$newOrder[0]->product->name}}"--}}
{{--                         style="object-fit: cover;display: inline-block;max-height: 300px;height: auto;">--}}
{{--                </div>--}}
{{--            @endif--}}


{{--            @if($transactionTypeCount[0]+$transactionTypeCount[1]+$transactionTypeCount[2]+$transactionTypeCount[3]+$transactionTypeCount[4]!=0)--}}
{{--                <h3>Transaction Type</h3>--}}
{{--                <div class="doughnut-chart chart block mb-2">--}}
{{--                    <div class="doughnut-chart chart">--}}
{{--                        <canvas id="doughnutChartCustom1"></canvas>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            @endif--}}

        </div>
    </div>
</div>

<script>
    var dt = new Date();
    document.getElementById("datetime").innerHTML = dt.toLocaleString('en-GB');
</script>

@include('_layout.user-panel.html_end_scripts')

<script src="{{asset('js/plugins/chart.js/Chart.min.js')}}"></script>
<script>
    var male = {{ $result['faceResult']['gender']}};
    var female = {{ ( 1 - $result['faceResult']['gender'] ) }};
    var line_male = {{ '['.implode(',',$result['faceResult']['age_male']).']' }};
    var line_female = {{ '['.implode(',',$result['faceResult']['age_female']).']' }};

    //-------------------------------------------
    //- PIE CHART - Gender
    //-------------------------------------------
    Chart.defaults.global.defaultFontColor = 'white';
    var genderData = {
        labels: ['Male', 'Female'],
        datasets: [{
            data: [male, female],
            backgroundColor: [
                '#00c0ef', // male
                '#f3d3ff', // female
            ],
        }],
    }
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieData = genderData;
    var pieOptions = {
        maintainAspectRatio: false,
        responsive: true,
    }
    var pieChart = new Chart(pieChartCanvas, {
        type: 'pie',
        data: pieData,
        options: pieOptions
    })

    //-------------------------------------------------
    //- LINE CHART - Age group and Sex
    //-------------------------------------------------

    var areaChartData = {
        labels: ['0-9', '10-19', '20-29', '30-39', '40-49', '50-59', '60-69', '70-79', '80-89', '>=90'],
        datasets: [
            {
                label: 'Male',
                backgroundColor: '#00c0ef',
                borderColor: '#00c0ef',
                pointRadius: false,
                pointColor: '#3b8bba',
                pointStrokeColor: '#00c0ef',
                pointHighlightFill: '#fff',
                pointHighlightStroke: '#00c0ef',
                data: line_male
            },
            {
                label: 'Female',
                backgroundColor: 'rgb(241,177,255)',
                borderColor: 'rgb(241,177,255)',
                pointRadius: false,
                pointColor: 'rgb(241,177,255)',
                pointStrokeColor: '#ca97d8',
                pointHighlightFill: '#f3d3ff',
                pointHighlightStroke: 'rgb(241,177,255)',
                data: line_female
            },
        ]
    }

    var areaChartOptions = {
        maintainAspectRatio: false,
        responsive: true,
        legend: {
            display: false
        },
        scales: {
            xAxes: [{
                gridLines: {
                    display: false,
                }
            }],
            yAxes: [{
                gridLines: {
                    display: false,
                }
            }]
        }
    }

    var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
    var lineChartOptions = jQuery.extend(true, {}, areaChartOptions)
    var lineChartData = jQuery.extend(true, {}, areaChartData)
    lineChartData.datasets[0].fill = false;
    lineChartData.datasets[1].fill = false;
    lineChartOptions.datasetFill = false

    var lineChart = new Chart(lineChartCanvas, {
        type: 'line',
        data: lineChartData,
        options: lineChartOptions
    })


    window.axios.defaults.headers.common = {
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        'X-Requested-With': 'XMLHttpRequest'
    };

    async function postData(people, gender, age_group, expression, detail) {
        axios({
            method: 'post',
            url: '{{'face/post'}}',
            data: {
                people: people,
                gender: gender,
                age: age_group,
                expression: expression,
                // detail: detail
            }
        })
            .then(function (response) {
                // console.log(response);
                male = response.data.gender * 100;
                female = (1 - response.data.gender) * 100;

                lineChart.data.datasets[0].data = response.data.age_male;
                lineChart.data.datasets[1].data = response.data.age_female;

                pieChart.data.datasets[0].data[0] = male;
                pieChart.data.datasets[0].data[1] = female;

                pieChart.update();
                lineChart.update();
            })
            .catch(function (error) {
                console.log(error);
            });
    }

</script>

</body>

</html>
