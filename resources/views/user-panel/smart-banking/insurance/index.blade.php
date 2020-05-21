{{-- Parent Layout --}}
@extends('_layout.user-panel.master.smart_banking_layout')



@section('page_header')
<div class="page-header no-margin-bottom">
    <div class="container-fluid">
        <h2 class="h5 no-margin-bottom">Insurance</h2>
    </div>
</div>
@stop

{{-- Body Main Content --}}
@section('body_main_content')
<!-- Breadcrumb-->
<div class="container-fluid">
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Insurance</li>
        <li class="breadcrumb-item active"> {{$rows}}</li>
    </ul>
</div>

<section>
    <div class="pl-3 pr-3">
        <div class="row">
            <div class="card-deck-wrapper">
                <div class="card-deck">
                    <div class="card-columns">
                        @foreach ($rows as $row)
                        <div class="card">

                            <img src="{{ asset(unserialize($row->image)[0]) }}" alt="{{$row->name}}" class="card-img-top img-fluid">

                            <div class="card-body">
                                <h5 class="card-title text-uppercase">{{$row->name}}</h5>
                                <p class="card-text">{{$row->description}}</p>
                            </div>
                            <div class="card-footer">
                                <a href="{{ URL::action('SmartBankingController@insurance_detail',$row->id) }}"
                                    class="btn btn-outline-primary">Detail</a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
@stop
