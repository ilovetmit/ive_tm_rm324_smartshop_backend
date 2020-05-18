{{-- Parent Layout --}}
@extends('_layout.user-panel.master.smart_banking_layout')



@section('page_header')
<!-- Page Header-->
<div class="page-header no-margin-bottom">
    <div class="container-fluid">
        <h2 class="h5 no-margin-bottom">Transaction</h2>
    </div>
</div>
@stop

{{-- Body Main Content --}}
@section('body_main_content')
<!-- Breadcrumb-->
<div class="container-fluid">
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Transaction</li>
    </ul>
</div>
<section class="no-padding-top">
    <div class="container-fluid">
        @include('_layout.user-panel.components.flash')
        <div class="block">
            <div class="title"><strong>Detail</strong></div>
            <div class="block-body">
                <div class="table-responsive">
                    <table id="datatable1" style="width: 100%;" class="table">
                        <thead>
                            <tr>
                                <th>Date/Time</th>
                                <th>A/C</th>
                                <th>Item</th>
                                <th>Amount</th>
                                <th>Balance</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rows as $row)
                            <tr>
                                <td><a href="javascript: return(void(0));" class="text-muted">{{$row->created_at}}</a>
                                </td>
                                <td>
                                    {!! config('variables.money_type.'.$row->account) !!}
                                </td>
                                <td>{{$row->title}}</td>
                                <td>{{($row->account=='VitCoin')?$row->amount:"$ ".$row->amount}}</td>
                                <td>{{($row->account=='VitCoin')?$row->balance:"$ ".$row->balance}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@stop


{{-- Body End Scripts --}}
@section('body_end_scripts')
<script src="{{asset("vendor/smart_shop_user/js/tables-datatable.js")}}"></script>
@stop
