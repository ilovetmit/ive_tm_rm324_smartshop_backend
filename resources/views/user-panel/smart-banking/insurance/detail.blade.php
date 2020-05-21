{{-- Parent Layout --}}
@extends('_layout.user-panel.master.smart_banking_layout')



@section('page_header')
<!-- Page Header-->
<div class="page-header no-margin-bottom">
    <div class="container-fluid">
        <h2 class="h5 no-margin-bottom">Product Information</h2>
    </div>
</div>
@stop

{{-- Body Main Content --}}
@section('body_main_content')
<!-- Breadcrumb-->
<div class="container-fluid">
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item">Insurance</li>
        <li class="breadcrumb-item active">Detail</li>
    </ul>
</div>
{{-- Main Section Begins --}}
<section class="no-padding-top">
    {{-- Flash Message --}}
    <div class="container-fluid">
        @include('_layout.user-panel.components.flash')
        <div class="row">
            <div class="col-sm-6 col-lg-3">
                <div class="card">
                    <div class="card-body text-center py-5">
                        <div class="card-category">Free</div>
                        <div class="display-3 my-5 text-light">$0</div>
                        <p>To support you in unfortunate circumstances, we will waive the future premiums for Admire
                            Life 2 if the person protected under the policy becomes totally and permanently disabled
                            before the age of 60. Offer of this benefit will be subject to our underwriting decision and
                            exclusions.</p>
                        <div class="text-center"><a
                                href="{{URL::action('SmartBankingController@insurance_subscribe',[$insurance->id,"free"])}}"
                                class="btn btn-outline-light px-4">Subscribe</a></div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="card">
                    <div class="card-body text-center py-5">
                        <div class="card-category">Monthly</div>
                        <div class="display-3 my-5 text-light">$ {{unserialize($insurance->price)['monthly']}}</div>
                        <p>With Admire Life 2, you can select from five premium payment terms according to your personal
                            financial needs. Premium amounts are guaranteed to be fixed throughout the premium payment
                            term, making it easy for you to budget.</p>
                        <div class="text-center"><a
                                href="{{URL::action('SmartBankingController@insurance_subscribe',[$insurance->id,"monthly"])}}"
                                class="btn btn-outline-light px-4">Subscribe</a></div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="card">
                    <div class="card-body text-center py-5">
                        <div class="card-category">Quarterly</div>
                        <div class="display-3 my-5 text-light">$ {{unserialize($insurance->price)['quarterly']}}</div>
                        <p>Admire Life 2 provides lifetime insurance with stable returns. If the person protected under
                            the policy, passes away, we will pay the death benefit to the person whom you select in your
                            policy as beneficiary.</p>
                        <div class="text-center"><a
                                href="{{URL::action('SmartBankingController@insurance_subscribe',[$insurance->id,"quarterly"])}}"
                                class="btn btn-outline-light px-4">Subscribe</a></div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="card">
                    <div class="card-body text-center py-5">
                        <div class="card-category">Yearly</div>
                        <div class="display-3 my-5 text-light">$ {{unserialize($insurance->price)['yearly']}}</div>
                        <p>Admire Life 2 is a participating insurance plan that provides you with both guaranteed cash
                            value and non-guaranteed dividends. The plan will provide guaranteed cash value, enabling
                            you to accumulate wealth for a prosperous future for yourself and your family.</p>
                        <div class="text-center"><a
                                href="{{URL::action('SmartBankingController@insurance_subscribe',[$insurance->id,"yearly"])}}"
                                class="btn btn-outline-light px-4">Subscribe</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@stop
