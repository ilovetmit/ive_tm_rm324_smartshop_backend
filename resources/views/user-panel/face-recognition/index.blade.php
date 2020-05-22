{{--todo update style--}}
<html>
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Face recognition analysis</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
          integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <style>
        /* body{
          margin: 0;
          padding: 0;
          width: 100vw;
          height: 100vh;
          display: flex;
          justify-content: center;
          align-items: center;
        }

        canvas {
          position: absolute;
        } */
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.min.js"></script>
    <script defer src="{{asset('js/face/face-api.min.js')}}"></script>
    <script defer src="{{asset('js/face/sketch.js')}}"></script>
</head>


<body class="bg-dark">
<video id="video" width="1" height="1" class="card-img-top" autoplay muted></video>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 mt-3 text-center text-light">
            <h1>Face recognition analysis</h1>
            <p id="loading">Initializing...</p>
        </div>
    </div>


    <div class="row">

        <div class="card text-white bg-secondary p-3 ml-auto" style="min-width: 400px;min-height: 80vh;">
            <div class="card-body align-middle" id="result">


                <div class="row pt-2 bg-gradient-primary">
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

        <div class="card text-white bg-secondary ml-3 mr-auto" style="min-width: 20rem;min-height: 80vh;">
            <div class="card-body">
                <canvas id="faceCanvas"></canvas>
            </div>
        </div>
    </div>

</div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
        crossorigin="anonymous"></script>
<script src="{{asset('js/plugins/chart.js/Chart.min.js')}}"></script>
<script>
    var male = {{ $result['gender']}};
    var female = {{ ( 1 - $result['gender'] ) }};
    var line_male = {{ '['.implode(',',$result['age_male']).']' }};
    var line_female = {{ '['.implode(',',$result['age_female']).']' }};

    //-------------------------------------------
    //- PIE CHART - Category Selling Status Chart
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
                console.log(response);
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
