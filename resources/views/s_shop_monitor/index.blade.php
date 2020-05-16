<!DOCTYPE html>
<html>

<head>
    <title>S SHOP MONITOR</title>
    <meta http-equiv="refresh" content="5; URL={{config("app.url")}}s-shop-monitor">
    @include('_layout.dark-admin-premium-1-4-5.html_head')
    <link href='https://fonts.googleapis.com/css?family=Orbitron' rel='stylesheet' type='text/css'>
</head>

<style>

    @font-face {
        font-family: 'Digital Numbers Regular';
        font-style: normal;
        font-weight: normal;
        src: local('Digital Numbers Regular'), url('{{asset("vendor/digital-numbers-cufonfonts-webfont/DigitalNumbers-Regular.woff")}}') format('woff');
    }

    .digitText {
        font-family: 'Orbitron', sans-serif;
        height: 2rem;
        font-size: 1.5rem;
        text-align: center;
        letter-spacing: 0.2em;
        background-color: #464e56;
        color: limegreen;
        border-color: limegreen;
    }

    .digit {
        font-family: 'Digital Numbers Regular', sans-serif;
        height: 2rem;
        font-size: 1rem;
        font-weight: bold;
        text-align: center;
        letter-spacing: 0.2em;
        background-color: #2f363e;
        color: #ff3535;
        border-color: #ff3535;
    }

    .digit:focus {
        background-color: #2f363e;
        color: #ff3535;
    }

    .digit::selection {
        background-color: #2f363e;
    }
</style>

<body style="overflow: hidden;">
<div class="page-content w-100 pl-4 pt-4">
    <div class="row w-100">
        <div class="col">
            <h3>BlockChain Stream Info</h3>
            <table class="table table-striped table-bordered mb-3">
                <tbody>
                <tr>
                    <th>Name</th>
                    <td>{{$blockchainStream['name']}}</td>
                </tr>
                <tr>
                    <th>createtxid</th>
                    <td>{{$blockchainStream['createtxid']}}</td>
                </tr>
                <tr>
                    <th>Items</th>
                    <td>{{$blockchainStream['items']}}</td>
                </tr>
                <tr>
                    <th>Publishers</th>
                    <td>{{$blockchainStream['publishers']}}</td>
                </tr>
                </tbody>
            </table>
            <h3>BlockChain Stream Data</h3>
            @for($i = sizeof($blockchains)-1;$i>sizeof($blockchains)-3;$i--)
                <table class="table table-striped table-bordered table-sm mb-3">
                    <tbody>
                    <tr>
                        <th>Publishers</th>
                        <td>{{$blockchains[$i]["publishers"][0]}}</td>
                    </tr>
                    <tr>
                        <th>JSON</th>
                        <td>
                            @php echo '<pre class="m-0">'.json_encode($blockchains[$i]['data']['json'], JSON_PRETTY_PRINT).'</pre>' @endphp
                        </td>
                    </tr>
                    <tr>
                        <th>txid</th>
                        <td>{{$blockchains[$i]["txid"]}}</td>
                    </tr>
                    <tr>
                        <th>Added</th>
                        <td>
                            @if(isset($blockchains[$i]["blocktime"]))
                                {{gmdate('Y-m-d H:i:s', isset($blockchains[$i]['blocktime']) ? $blockchains[$i]['blocktime'] : 'NULL')}} GMT{{ isset($blockchains[$i]['blocktime']) ? ' (confirmed ['.$blockchains[$i]["confirmations"].'])' : ''}}
                            @else
                                unconfirmed
                            @endif
                        </td>
                    </tr>
                    </tbody>
                </table>
            @endfor

        </div>
        <div class="col">

            {{--            <h3>Real-time Statistics</h3>--}}

            {{--            <div class="statistic-block block pt-1 pb-3">--}}
            {{--                <div class="progress-details d-flex align-items-md-center justify-content-between">--}}
            {{--                    <div class="title">--}}
            {{--                        <strong style="font-size: medium"><i class="icon-user"></i> Total User</strong>--}}
            {{--                    </div>--}}
            {{--                    <div class="number dashtext-1">{{$userCount}}</div>--}}
            {{--                </div>--}}
            {{--                <div class="progress progress-template">--}}
            {{--                    <div role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-1"></div>--}}
            {{--                </div>--}}
            {{--            </div>--}}

            {{--            <div class="statistic-block block pt-1 pb-3">--}}
            {{--                <div class="progress-details d-flex align-items-md-center justify-content-between">--}}
            {{--                    <div class="title">--}}
            {{--                        <strong style="font-size: medium"><i class="icon-light-bulb"></i> Total Product</strong>--}}
            {{--                    </div>--}}
            {{--                    <div class="number dashtext-4">{{$productCount}}</div>--}}
            {{--                </div>--}}
            {{--                <div class="progress progress-template">--}}
            {{--                    <div role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-4"></div>--}}
            {{--                </div>--}}
            {{--            </div>--}}

            <h3>Locker Status</h3>
            <div class="checklist-block mb-3">
                @foreach ($lockersRecords as $locker)
                    <div class="item d-flex align-items-center pt-3 pb-3">
                        Locker #{{$locker['locker']->locker_id}} | Status:  <strong class="ml-2">@if($locker['locker']->using==0) <i class="fa fa-check text-success mr-2"></i>Free @else <i class="fa fa-times text-danger mr-2"></i>Occupy @endif</strong>
                        @if(!is_null($locker['status']))  &nbsp|&nbsp <strong>
                            @if($locker['order']==1)
                                <div class="row">
                                    <div class="col">
                                        <span class="text-success">Opening</span>
                                        <div class="spinner-border spinner-border-sm text-success"> </div>
                                    </div>
                                </div>
                            @else <span class="text-warning">Queue {{$locker['order']}}</span>
                            @endif </strong>
                        @endif
                    </div>
                @endforeach
            </div>

            <h3>Vending Machine Status</h3>
            <div class="checklist-block mb-3">
                @for($i = 0;$i<=8;$i++)
                    <div class="item d-flex align-items-center pt-3 pb-3">
                        Channel #{{$i+1}} &nbsp|
                        @if(!is_null($vendings[$i]['product'])) <i class="fa fa-check text-success mr-2 ml-2"></i><strong>Normal</strong>
                        @else <i class="fa fa-times text-danger mr-2 ml-2"></i><span class="text-danger"> &nbspVacant</span> @endif

                        @if(!is_null($vendings[$i]['status'])) &nbsp&nbsp|&nbsp<strong>
                            @if($vendings[$i]['order']==1)
                                <div class="row">
                                    <div class="col">
                                        <span class="text-success">Opening</span>
                                        <div class="spinner-border spinner-border-sm text-success"> </div>
                                    </div>
                                </div>
                            @else
                                <span class="text-warning">Queue {{$vendings[$i]['order']}}</span>
                            @endif </strong>
                        @endif
                    </div>
                @endfor
            </div>
        </div>


        <div class="col">

            <h3>Real-time Statistics</h3>

            <div class="statistic-block block pt-1 pb-3 mb-3">
                <div class="progress-details d-flex align-items-md-center justify-content-between">
                    <div class="title">
                        <strong style="font-size: medium"><i class="icon-contract"></i> Total Order</strong>
                    </div>
                    <div class="number dashtext-2">{{$orderCount}}</div>
                </div>
                <div class="progress progress-template">
                    <div role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-2"></div>
                </div>
            </div>

            <div class="statistic-block block pt-1 pb-3 mb-3">
                <div class="progress-details d-flex align-items-md-center justify-content-between">
                    <div class="title">
                        <strong style="font-size: medium"><i class="icon-presentation"></i> Today Order</strong>
                    </div>
                    <div class="number dashtext-3">{{$totalOrderCount}}</div>
                </div>
                <div class="progress progress-template">
                    <div role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-3"></div>
                </div>
            </div>

            @if(sizeof($newOrder)>0)
                <h3>Recently Sold</h3>
                <div class="card bg-dark text-white mb-3">
                    <img src="{{asset($newOrder[0]->product->url)}}" class="card-img" alt="{{$newOrder[0]->product->name}}" style="object-fit: cover;display: inline-block;max-height: 300px;height: auto;">
                </div>
            @endif


            @if($transactionTypeCount[0]+$transactionTypeCount[1]+$transactionTypeCount[2]+$transactionTypeCount[3]+$transactionTypeCount[4]!=0)
                <h3>Transaction Type</h3>
                <div class="doughnut-chart chart block mb-2">
                    <div class="doughnut-chart chart">
                        <canvas id="doughnutChartCustom1"></canvas>
                    </div>
                </div>
            @endif

            <h3>Sensor LED</h3>
            <div class="row pl-3 pr-3 mb-3">
                <div class="col m-0 pl-0 pr-2">
                    <label class="m-0">Temperature (°C)</label>
                    <input type="text" autocomplete="off" class="digit form-control" name="sensor1" value="{{$ledSensor[0]/10}}">
                </div>
                <div class="col m-0 p-0">
                    <label class="m-0">Humidity (%)</label>
                    <input type="text" autocomplete="off" class="digit form-control" name="sensor2" value="{{$ledSensor[1]/10}}">
                </div>
            </div>

            <h3>Price LED</h3>
            <div class="row pl-3 pr-3 mb-3">
                <div class="col m-0 pl-0 pr-2">
                    <input type="text" autocomplete="off" class="digit form-control" name="price1" value="{{$ledPrice[0]}}">
                </div>
                <div class="col m-0 pl-0 pr-2">
                    <input type="text" autocomplete="off" class="digit form-control" name="price2" value="{{$ledPrice[1]}}">
                </div>
                <div class="col m-0 p-0">
                    <input type="text" autocomplete="off" class="digit form-control" name="price3" value="{{$ledPrice[2]}}">
                </div>
            </div>

            {{--            <h3>String LED</h3>--}}
            {{--            <div class="row pl-3 pr-3">--}}
            {{--                <div class="col m-0 pl-0 pr-2">--}}
            {{--                    <input type="text" autocomplete="off" class="digitText form-control" name="string1" value="{{$ledString[0]}}">--}}
            {{--                </div>--}}
            {{--                <div class="col m-0 p-0">--}}
            {{--                    <input type="text" autocomplete="off" class="digitText form-control" name="string2" value="{{$ledString[1]}}">--}}
            {{--                </div>--}}
            {{--            </div>--}}


        </div>

        <div class="col-2">
            <h3>Last Updated</h3>
            <div class="text-right align-middle mb-3 row">
                <div class="col">
                    <span class="align-middle pt-2 h5 text-warning" id="datetime"></span>
                </div>
                <div class="col-3">
                    <div class="sk-rotating-plane"></div>
                </div>
            </div>

            <h3>Advertisement</h3>
            @foreach($advertisements as $advertisement)
                <div class="card mb-3">
                    <img src="{{$advertisement->image}}" alt="{{$advertisement->title}}" class="img-fluid">
                </div>
            @endforeach
        </div>

    </div>
</div>

<script>
  var dt = new Date();
  document.getElementById("datetime").innerHTML = dt.toLocaleString('en-GB');
</script>

@include('_layout.dark-admin-premium-1-4-5.html_end_scripts')

<script>
  $(document).ready(function () {
    var PIECHART = $('#doughnutChartCustom1');
    var myPieChart = new Chart(PIECHART, {
      type: 'doughnut',
      options: {
        cutoutPercentage: 80,
        legend: {
          display: true,
          position: "left"
        },
        animation: {
          duration: 0, // general animation time
        },
        hover: {
          animationDuration: 0, // duration of animations when hovering an item
        },
        responsiveAnimationDuration: 0, // animation duration after a resize
      },
      data: {
        labels: [
          "Spending",
          "Insurance",
          "Vending",
          "Transfer",
          "Locker"
        ],
        datasets: [
          {
            data: [{{$transactionTypeCount[0]}}, {{$transactionTypeCount[1]}}, {{$transactionTypeCount[2]}}, {{$transactionTypeCount[3]}},{{$transactionTypeCount[4]}}],
            borderWidth: [0, 0, 0, 0, 0],
            backgroundColor: [
              '#723ac3',
              "#864DD9",
              "#9762e6",
              "#a678eb",
              "#bf97ff",
            ],
            hoverBackgroundColor: [
              '#723ac3',
              "#864DD9",
              "#9762e6",
              "#a678eb",
              "#bf97ff",
            ]
          }]
      }
    });

  });
</script>

</body>
</html>