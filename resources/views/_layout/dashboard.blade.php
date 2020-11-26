@extends('_layout.admin')
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        Dashboard
                    </div>
                    <div class="card-body">
                        @if(session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <a class="btn btn-primary" href="{{route('ProductCheckout.index')}}" target="_blank">
                            Product Checkout
                        </a>
                        <a class="btn btn-primary" href="{{route('face.index')}}" target="_blank">
                            Face
                        </a>
                        <a class="btn btn-primary" target="_blank" href="{{ route('sbanking.login') }}">
                            Smart Banking Login
                        </a>
                        <a class="btn btn-primary" target="_blank" href="{{route('sshop.advertisement')}}">
                            S-Shop
                        </a>
                        <a class="btn btn-primary" target="_blank" href="{{route('smonitor.index')}}">
                            S-Shop Monitor
                        </a>

                        <a href="{{route('migrate')}}" class="btn btn-danger">
                            Database: Migrations (reset database)
                        </a>
                        <a href="{{route('git_pull')}}" class="btn btn-danger">
                            Version: Git Pull (update system version)
                        </a>

                    </div>
                </div>
            </div>
        </div>
        <!-- ----------------------------------------------------------------------------------------------------- -->
        <div class="container-fluid">
            <div class="row">
                <!-- LEFT -->
                <div class="col-md-6">
                    <!-- Tag Analysis -->
                    <div class="card card-danger">
                        <div class="card-header">
                            <h3 class="card-title">Tag Selling Status Chart</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                        class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                                        class="fas fa-times"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <canvas id="donutChart"
                                    style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                    </div>
                    <!-- END Tag Analysis -->
                    <!-- Category Analysis -->
                    <div class="card card-danger">
                        <div class="card-header">
                            <h3 class="card-title">Category Selling Status Chart</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                        class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                                        class="fas fa-times"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <canvas id="pieChart"
                                    style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                    </div>
                    <!-- END Category Analysis -->
                </div>
                <!-- END LEFT -->
                <!-- RIGHT -->
                <div class="col-md-6">
                    <!-- STACKED BAR CHART -->
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Total profit Status Chart</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                        class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                                        class="fas fa-times"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart">
                                <canvas id="stackedBarChart"
                                        style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                            </div>
                        </div>
                    </div>
                    <!-- END STACKED BAR CHART -->
                    <!-- Vending/Window Analysis -->
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Vending/WindowShop Selling Status Chart</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                        class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                                        class="fas fa-times"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart">
                                <canvas id="barChart"
                                        style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                            </div>
                        </div>
                    </div>
                    <!-- END Vending/Window Analysis -->

                </div>
                <!-- END RIGHT -->
            </div>
        </div>

        <!-- ----------------------------------------------------------------------------------------------------- -->
    </div>
@endsection

@section('scripts')
    <script src="{{asset('js/plugins/chart.js/Chart.min.js')}}"></script>
    <script>
        $(function () {
            /* ChartJS
             * -------
             * Here we will create a few charts using ChartJS
             */

            //----------------------------------------
            //- DONUT CHART - Tag Selling Status Chart
            //----------------------------------------
            var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
            var array = {!!$tags_name!!};
            var tagData = {
                labels: {!!$tags_name!!},
                datasets: [{
                    data: {{ $tagData }},
                    backgroundColor: [
                        '#f56954', // 1
                        '#00a65a', // 2
                        '#f39c12', // 3
                        '#00c0ef', // 4
                        '#3c8dbc', // 5
                        '#F2D325', // 6
                        '#FF3333', // 7
                        '#DE6C83', // 8
                        '#2CF6B3', // 9
                        '#CCA674', // 10
                    ],
                }]
            }
            var donutOptions = {
                maintainAspectRatio: false,
                responsive: true,
            }
            var donutChart = new Chart(donutChartCanvas, {
                type: 'doughnut',
                data: tagData,
                options: donutOptions
            })

            //-------------------------------------------
            //- PIE CHART - Category Selling Status Chart
            //-------------------------------------------
            var array = {!!$categories_name!!};
            var categoryData = {
                labels: {!!$categories_name!!},
                datasets: [{
                    data: {{ $categoryData }},
                    backgroundColor: [
                        '#f56954', // 1
                        '#00a65a', // 2
                        '#f39c12', // 3
                        '#00c0ef', // 4
                        '#3c8dbc', // 5
                        '#F2D325', // 6
                        '#FF3333', // 7
                        '#DE6C83', // 8
                        '#2CF6B3', // 9
                        '#CCA674', // 10
                    ],
                }]
            }
            var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
            var pieData = categoryData;
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
            //- STACKED BAR CHART - Total profit Status Chart
            //-------------------------------------------------
            var profitData = {
                labels: ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'],
                datasets: [{
                    label: 'Vending',
                    backgroundColor: 'rgba(60,141,188,0.9)',
                    borderColor: 'rgba(60,141,188,0.8)',
                    pointRadius: false,
                    pointColor: '#3b8bba',
                    pointStrokeColor: 'rgba(60,141,188,1)',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data: {!!$VP_profit_data!!},
                },
                    {
                        label: 'WindowShop',
                        backgroundColor: 'rgba(210, 214, 222, 1)',
                        borderColor: 'rgba(210, 214, 222, 1)',
                        pointRadius: false,
                        pointColor: 'rgba(210, 214, 222, 1)',
                        pointStrokeColor: '#c1c7d1',
                        pointHighlightFill: '#fff',
                        pointHighlightStroke: 'rgba(220,220,220,1)',
                        data: {!!$WSP_profit_data!!},
                    },
                ]
            }
            var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
            var stackedBarChartData = jQuery.extend(true, {}, profitData)
            var stackedBarChartOptions = {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    xAxes: [{
                        stacked: true,
                    }],
                    yAxes: [{
                        stacked: true
                    }]
                }
            }
            var stackedBarChart = new Chart(stackedBarChartCanvas, {
                type: 'bar',
                data: stackedBarChartData,
                options: stackedBarChartOptions
            })

            //-------------------------------------------------
            //- BAR CHART - Vending/Window Selling Status Chart
            //-------------------------------------------------
            var barChartCanvas = $('#barChart').get(0).getContext('2d')
            var barChartData = jQuery.extend(true, {}, profitData)
            var temp0 = profitData.datasets[0]
            var temp1 = profitData.datasets[1]
            barChartData.datasets[0] = temp1
            barChartData.datasets[1] = temp0
            var barChartOptions = {
                responsive: true,
                maintainAspectRatio: false,
                datasetFill: false
            }
            var barChart = new Chart(barChartCanvas, {
                type: 'bar',
                data: barChartData,
                options: barChartOptions
            })
        })
    </script>
@endsection
