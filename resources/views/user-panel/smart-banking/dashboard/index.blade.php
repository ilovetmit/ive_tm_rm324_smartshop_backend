{{-- Parent Layout --}}
@extends('_layout.user-panel.master.smart_banking_layout')



@section('page_header')
<div class="page-header">
    <div class="container-fluid">
        <h2 class="h5 no-margin-bottom">Dashboard</h2>
    </div>
</div>
@stop

{{-- Body Main Content --}}
@section('body_main_content')
<section class="no-padding-top no-padding-bottom">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="statistic-block block">
                    <div class="progress-details d-flex align-items-end justify-content-between">
                        <div class="title">
                            <div class="icon"><i class="icon-user-1"></i></div><strong>Saving A/C</strong>
                        </div>
                        <div class="number dashtext-1">$ {{ $saving_account[0] }}</div>
                    </div>
                    <div class="progress progress-template">
                        <div role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-1"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="statistic-block block">
                    <div class="progress-details d-flex align-items-end justify-content-between">
                        <div class="title">
                            <div class="icon"><i class="icon-contract"></i></div><strong>Current A/C</strong>
                        </div>
                        <div class="number dashtext-2">$ {{ $current_account[0] }} </div>
                    </div>
                    <div class="progress progress-template">
                        <div role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-2"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="statistic-block block">
                    <div class="progress-details d-flex align-items-end justify-content-between">
                        <div class="title">
                            <div class="icon"><i class="icon-paper-and-pencil"></i></div><strong>VitCoin</strong>
                        </div>
                        <div class="number dashtext-3"> 0 </div>
                    </div>
                    <div class="progress progress-template">
                        <div role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-3"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="statistic-block block">
                    <div class="progress-details d-flex align-items-end justify-content-between">
                        <div class="title">
                            <div class="icon"><i class="icon-writing-whiteboard"></i></div><strong>Total
                                Balance</strong>
                        </div>
                        <div class="number dashtext-4">$ {{ $saving_account[0]+$current_account[0] }} </div>
                    </div>
                    <div class="progress progress-template">
                        <div role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-4"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- TODO: the following part was copied from the dark admin tempalte directly, fixe the JS/CSS thing so that it can display normally, do not chagne any layout, i will review the necessary change after file path corrected and make the UI correctly display -->
<!-- <section class="no-padding-bottom">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4">
                <div class="bar-chart block no-margin-bottom">
                    <canvas id="barChartExample1"></canvas>
                </div>
                <div class="bar-chart block">
                    <canvas id="barChartExample2"></canvas>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="line-cahrt block">
                    <canvas id="lineCahrt"></canvas>
                </div>
            </div>
        </div>
    </div>
</section> -->
<section class="no-padding-bottom">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="stats-2-block block d-flex">
                    <div class="stats-2 d-flex">
                        <div class="stats-2-arrow low">
                        </div>
                        <div class="stats-2-content">
                            <strong class="d-block">Saving A/C</strong>
                            <span class="d-block">latest transaction</span>
                        </div>
                    </div>
                    <div class="stats-2 d-flex">
                        <div class="stats-2-arrow height">
                        </div>
                        <div class="stats-2-content">
                            <span class="d-block">&nbsp;</span>
                            <strong class="d-block">+ HKD$ 30</strong>
                        </div>
                    </div>
                </div>

                <div class="stats-2-block block d-flex">
                    <div class="stats-2 d-flex">
                        <div class="stats-2-arrow low">
                        </div>
                        <div class="stats-2-content">
                            <strong class="d-block">Current A/C</strong>
                            <span class="d-block">latest transaction</span>
                        </div>
                    </div>
                    <div class="stats-2 d-flex">
                        <div class="stats-2-arrow height">
                        </div>
                        <div class="stats-2-content">
                            <span class="d-block">&nbsp;</span>
                            <strong class="d-block">- HKD$ 130</strong>
                        </div>
                    </div>
                </div>

                <div class="stats-2-block block d-flex">
                    <div class="stats-2 d-flex">
                        <div class="stats-2-arrow low">
                        </div>
                        <div class="stats-2-content">
                            <strong class="d-block">VITCOIN</strong>
                            <span class="d-block">latest transaction</span>
                        </div>
                    </div>
                    <div class="stats-2 d-flex">
                        <div class="stats-2-arrow height">
                        </div>
                        <div class="stats-2-content">
                            <span class="d-block">&nbsp;</span>
                            <strong class="d-block">HKD$ 0</strong>
                        </div>
                    </div>
                </div>


            </div>
            <div class="col-lg-6">
                <div class="drills-chart block">
                    <canvas id="lineChart1"></canvas>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- <section class="no-padding-bottom">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4">
                <div class="user-block block text-center">
                    <div class="avatar"><img src="{{ asset("vendor/smart_shop_user/img/avatar-1.jpg") }}" alt="..."
                            class="img-fluid">
                        <div class="order dashbg-2">1st</div>
                    </div><a href="#" class="user-title">
                        <h3 class="h5">Richard Nevoreski</h3><span>@richardnevo</span>
                    </a>
                    <div class="contributions">950 Contributions</div>
                    <div class="details d-flex">
                        <div class="item"><i class="icon-info"></i><strong>150</strong></div>
                        <div class="item"><i class="fa fa-gg"></i><strong>340</strong></div>
                        <div class="item"><i class="icon-flow-branch"></i><strong>460</strong></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="user-block block text-center">
                    <div class="avatar"><img src="{{ asset("vendor/smart_shop_user/img/avatar-4.jpg") }}" alt="..."
                            class="img-fluid">
                        <div class="order dashbg-1">2nd</div>
                    </div><a href="#" class="user-title">
                        <h3 class="h5">Samuel Watson</h3><span>@samwatson</span>
                    </a>
                    <div class="contributions">772 Contributions</div>
                    <div class="details d-flex">
                        <div class="item"><i class="icon-info"></i><strong>80</strong></div>
                        <div class="item"><i class="fa fa-gg"></i><strong>420</strong></div>
                        <div class="item"><i class="icon-flow-branch"></i><strong>272</strong></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="user-block block text-center">
                    <div class="avatar"><img src="{{ asset("vendor/smart_shop_user/img/avatar-6.jpg") }}" alt="..."
                            class="img-fluid">
                        <div class="order dashbg-4">3rd</div>
                    </div><a href="#" class="user-title">
                        <h3 class="h5">Sebastian Wood</h3><span>@sebastian</span>
                    </a>
                    <div class="contributions">620 Contributions</div>
                    <div class="details d-flex">
                        <div class="item"><i class="icon-info"></i><strong>150</strong></div>
                        <div class="item"><i class="fa fa-gg"></i><strong>280</strong></div>
                        <div class="item"><i class="icon-flow-branch"></i><strong>190</strong></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="public-user-block block">
            <div class="row d-flex align-items-center">
                <div class="col-lg-4 d-flex align-items-center">
                    <div class="order">4th</div>
                    <div class="avatar"> <img src="{{ asset("vendor/smart_shop_user/img/avatar-1.jpg") }}" alt="..."
                            class="img-fluid"></div><a href="#" class="name"><strong class="d-block">Tomas
                            Hecktor</strong><span class="d-block">@tomhecktor</span></a>
                </div>
                <div class="col-lg-4 text-center">
                    <div class="contributions">410 Contributions</div>
                </div>
                <div class="col-lg-4">
                    <div class="details d-flex">
                        <div class="item"><i class="icon-info"></i><strong>110</strong></div>
                        <div class="item"><i class="fa fa-gg"></i><strong>200</strong></div>
                        <div class="item"><i class="icon-flow-branch"></i><strong>100</strong></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="public-user-block block">
            <div class="row d-flex align-items-center">
                <div class="col-lg-4 d-flex align-items-center">
                    <div class="order">5th</div>
                    <div class="avatar"> <img src="{{ asset("vendor/smart_shop_user/img/avatar-2.jpg") }}" alt="..."
                            class="img-fluid"></div><a href="#" class="name"><strong class="d-block">Alexander
                            Shelby</strong><span class="d-block">@alexshelby</span></a>
                </div>
                <div class="col-lg-4 text-center">
                    <div class="contributions">320 Contributions</div>
                </div>
                <div class="col-lg-4">
                    <div class="details d-flex">
                        <div class="item"><i class="icon-info"></i><strong>150</strong></div>
                        <div class="item"><i class="fa fa-gg"></i><strong>120</strong></div>
                        <div class="item"><i class="icon-flow-branch"></i><strong>50</strong></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="public-user-block block">
            <div class="row d-flex align-items-center">
                <div class="col-lg-4 d-flex align-items-center">
                    <div class="order">6th</div>
                    <div class="avatar"> <img src="{{ asset("vendor/smart_shop_user/img/avatar-6.jpg") }}" alt="..."
                            class="img-fluid"></div><a href="#" class="name"><strong class="d-block">Arther
                            Kooper</strong><span class="d-block">@artherkooper</span></a>
                </div>
                <div class="col-lg-4 text-center">
                    <div class="contributions">170 Contributions</div>
                </div>
                <div class="col-lg-4">
                    <div class="details d-flex">
                        <div class="item"><i class="icon-info"></i><strong>60</strong></div>
                        <div class="item"><i class="fa fa-gg"></i><strong>70</strong></div>
                        <div class="item"><i class="icon-flow-branch"></i><strong>40</strong></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->
<section class="margin-bottom-sm">
    <div class="container-fluid">
        <div class="row d-flex align-items-stretch">
            <div class="col-lg-4">
                <div class="stats-with-chart-1 block">
                    <div class="title"> <strong class="d-block">Sales Difference</strong><span class="d-block">Lorem
                            ipsum dolor sit</span></div>
                    <div class="row d-flex align-items-end justify-content-between">
                        <div class="col-5">
                            <div class="text"><strong class="d-block dashtext-3">$740</strong><span class="d-block">May
                                    2017</span><small class="d-block">320 Sales</small></div>
                        </div>
                        <div class="col-7">
                            <div class="bar-chart chart">
                                <canvas id="salesBarChart1"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="stats-with-chart-1 block">
                    <div class="title"> <strong class="d-block">Visit Statistics</strong><span class="d-block">Lorem
                            ipsum dolor sit</span></div>
                    <div class="row d-flex align-items-end justify-content-between">
                        <div class="col-4">
                            <div class="text"><strong class="d-block dashtext-1">$457</strong><span class="d-block">May
                                    2017</span><small class="d-block">210 Sales</small></div>
                        </div>
                        <div class="col-8">
                            <div class="bar-chart chart">
                                <canvas id="visitPieChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="stats-with-chart-1 block">
                    <div class="title"> <strong class="d-block">Sales Activities</strong><span class="d-block">Lorem
                            ipsum dolor sit</span></div>
                    <div class="row d-flex align-items-end justify-content-between">
                        <div class="col-5">
                            <div class="text"><strong class="d-block dashtext-2">80%</strong><span class="d-block">May
                                    2017</span><small class="d-block">+35 Sales</small></div>
                        </div>
                        <div class="col-7">
                            <div class="bar-chart chart">
                                <canvas id="salesBarChart2"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- <section class="no-padding-bottom">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="checklist-block block">
                    <div class="title"><strong>To Do List</strong></div>
                    <div class="checklist">
                        <div class="item d-flex align-items-center">
                            <input type="checkbox" id="input-1" name="input-1" class="checkbox-template">
                            <label for="input-1">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</label>
                        </div>
                        <div class="item d-flex align-items-center">
                            <input type="checkbox" id="input-2" name="input-2" checked class="checkbox-template">
                            <label for="input-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</label>
                        </div>
                        <div class="item d-flex align-items-center">
                            <input type="checkbox" id="input-3" name="input-3" class="checkbox-template">
                            <label for="input-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</label>
                        </div>
                        <div class="item d-flex align-items-center">
                            <input type="checkbox" id="input-4" name="input-4" class="checkbox-template">
                            <label for="input-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</label>
                        </div>
                        <div class="item d-flex align-items-center">
                            <input type="checkbox" id="input-5" name="input-5" class="checkbox-template">
                            <label for="input-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</label>
                        </div>
                        <div class="item d-flex align-items-center">
                            <input type="checkbox" id="input-6" name="input-6" class="checkbox-template">
                            <label for="input-6">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="messages-block block">
                    <div class="title"><strong>New Messages</strong></div>
                    <div class="messages"><a href="#" class="message d-flex align-items-center">
                            <div class="profile"><img src="{{ asset("vendor/smart_shop_user/img/avatar-3.jpg") }}"
                                    alt="..." class="img-fluid">
                                <div class="status online"></div>
                            </div>
                            <div class="content"> <strong class="d-block">Nadia Halsey</strong><span
                                    class="d-block">lorem ipsum dolor sit amit</span><small
                                    class="date d-block">9:30am</small></div>
                        </a><a href="#" class="message d-flex align-items-center">
                            <div class="profile"><img src="{{ asset("vendor/smart_shop_user/img/avatar-2.jpg") }}"
                                    alt="..." class="img-fluid">
                                <div class="status away"></div>
                            </div>
                            <div class="content"> <strong class="d-block">Peter Ramsy</strong><span
                                    class="d-block">lorem ipsum dolor sit amit</span><small
                                    class="date d-block">7:40am</small></div>
                        </a><a href="#" class="message d-flex align-items-center">
                            <div class="profile"><img src="{{ asset("vendor/smart_shop_user/img/avatar-1.jpg") }}"
                                    alt="..." class="img-fluid">
                                <div class="status busy"></div>
                            </div>
                            <div class="content"> <strong class="d-block">Sam Kaheil</strong><span class="d-block">lorem
                                    ipsum dolor sit amit</span><small class="date d-block">6:55am</small></div>
                        </a><a href="#" class="message d-flex align-items-center">
                            <div class="profile"><img src="{{ asset("vendor/smart_shop_user/img/avatar-5.jpg") }}"
                                    alt="..." class="img-fluid">
                                <div class="status offline"></div>
                            </div>
                            <div class="content"> <strong class="d-block">Sara Wood</strong><span class="d-block">lorem
                                    ipsum dolor sit amit</span><small class="date d-block">10:30pm</small></div>
                        </a><a href="#" class="message d-flex align-items-center">
                            <div class="profile"><img src="{{ asset("vendor/smart_shop_user/img/avatar-1.jpg") }}"
                                    alt="..." class="img-fluid">
                                <div class="status online"></div>
                            </div>
                            <div class="content"> <strong class="d-block">Nader Magdy</strong><span
                                    class="d-block">lorem ipsum dolor sit amit</span><small
                                    class="date d-block">9:47pm</small></div>
                        </a></div>
                </div>
            </div>
        </div>
    </div>
</section> -->
<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4">
                <div class="stats-with-chart-2 block">
                    <div class="title"><strong class="d-block">Credit Sales</strong><span class="d-block">Lorem ipsum
                            dolor sit</span></div>
                    <div class="piechart chart">
                        <canvas id="pieChartHome1"></canvas>
                        <div class="text"><strong class="d-block">$2.145</strong><span class="d-block">Sales</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="stats-with-chart-2 block">
                    <div class="title"><strong class="d-block">Channel Sales</strong><span class="d-block">Lorem ipsum
                            dolor sit</span></div>
                    <div class="piechart chart">
                        <canvas id="pieChartHome2"></canvas>
                        <div class="text"><strong class="d-block">$7.784</strong><span class="d-block">Sales</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="stats-with-chart-2 block">
                    <div class="title"><strong class="d-block">Direct Sales</strong><span class="d-block">Lorem ipsum
                            dolor sit</span></div>
                    <div class="piechart chart">
                        <canvas id="pieChartHome3"></canvas>
                        <div class="text"><strong class="d-block">$4.957</strong><span class="d-block">Sales</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@stop

@section('body_end')
<div class="modal fade" id="product" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Buy Product
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <img width="300" src="https://chart.apis.google.com/chart?cht=qr&chs=300x300&chld=L|0&chl=akshdkjajhdksahslkdhdlksdydiudysiusydaiosydaoiuysaoiydasoiusydsaoidyduisadasdasdaadsaadd1ad3sads4d6sadsad45dsadddsa/,sad/sadsad/.,sadd,.y">
                </div>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-secondary" data-dismiss="modal">
                    Close
                </a>
            </div>
        </div>
    </div>
</div>
@stop
{{-- Body End Scripts --}}
@section('body_end_scripts')
<script src="{{asset("vendor/smart_shop_user/vendor/chart.js/Chart.min.js")}}"></script>
<script src="{{asset("vendor/smart_shop_user/vendor/jquery-validation/jquery.validate.min.js")}}"></script>
<script src="{{asset("vendor/smart_shop_user/js/charts-home.js")}}"></script>
@stop