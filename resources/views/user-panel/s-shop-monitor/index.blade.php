<!DOCTYPE html>
<html>

<head>
    <title>S SHOP MONITOR</title>
    <meta http-equiv="refresh" content="3; URL={{config("app.url")}}/s-shop-monitor">
    @include('_layout.user-panel.html_head')
    <link href='https://fonts.googleapis.com/css?family=Orbitron' rel='stylesheet' type='text/css'>
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
<div class="page-content w-100 pl-4 pt-4">
    <div class="row w-100">

        <div class="col">
            TODO
            face analysis
        </div>

        <div class="col-3">

            <h3>Locker Status</h3>
            <div class="checklist-block mb-3">
                @foreach ($lockersRecords as $locker)
                    <div class="item d-flex align-items-center pt-3 pb-3">
                        Locker #{{$locker['locker']->id}} | Status: <strong class="ml-2">@if($locker['locker']->is_using==1)
                                <i class="fa fa-check text-success mr-2"></i>Free @else <i
                                    class="fa fa-times text-danger mr-2"></i>Occupy @endif</strong>
                        @if(!is_null($locker['status']) && $locker['order']>0) &nbsp|&nbsp <strong>
                            @if($locker['order']==$lockerStatusCount)
                                <div class="row">
                                    <div class="col">
                                        <span class="text-success">Opening</span>
                                        <div class="spinner-border spinner-border-sm text-success"> </div>
                                    </div>
                                </div>
                            @else <span class="text-warning">Queue {{abs($locker['order']-$lockerStatusCount)+1}}</span>
                            @endif </strong>
                        @endif
                    </div>
                @endforeach
            </div>

            <h3>Vending Machine Status</h3>
            <div class="checklist-block mb-3">
                @for($i = 1;$i<=9;$i++) <div class="item d-flex align-items-center pt-3 pb-3">
                    Channel #{{$i}} &nbsp|
                    @if(!is_null($vending_queue)) <i class="fa fa-check text-success mr-2 ml-2"></i><strong>Normal</strong>
                    @else <i class="fa fa-times text-danger mr-2 ml-2"></i><span class="text-danger"> &nbspVacant</span>
                    @endif

                    @if(in_array($i,$vending_queue)) &nbsp&nbsp|&nbsp<strong>
                        @if($vending_queue[0]==$i)
                            <div class="row">
                                <div class="col">
                                    <span class="text-success">Opening</span>
                                    <div class="spinner-border spinner-border-sm text-success"> </div>
                                </div>
                            </div>
                        @else
                            <span class="text-warning">Queue {{array_keys($vending_queue,$i)[0]+1}}</span>
                        @endif </strong>
                    @endif
                </div>
                @endfor
            </div>
        </div>

        <div class="col-3">
            TODO
            temperature IOT arduino post data to server
            transaction analysis
            chart
        </div>
    </div>
</div>

<script>
    var dt = new Date();
    document.getElementById("datetime").innerHTML = dt.toLocaleString('en-GB');
</script>

@include('_layout.user-panel.html_end_scripts')


</body>

</html>
