{{-- Parent Layout --}}
@extends('_layout.dark-admin-premium-1-4-5.master.s_shop_layout')
@section('page_header','Profile')


{{-- Body Main Content --}}
@section('body_main_content')
<style>
    @import url('https://fonts.googleapis.com/css?family=Space+Mono:400,400i,700,700i');

    .credit_card {
        width: 320px;
        height: 190px;
        -webkit-perspective: 600px;
        -moz-perspective: 600px;
        perspective: 600px;

    }

    .card__part {
        box-shadow: 1px 1px #aaa3a3;
        top: 0;
        position: absolute;
        z-index: 1000;
        left: 0;
        display: inline-block;
        width: 320px;
        height: 190px;
        background-image: url('https://image.ibb.co/bVnMrc/g3095.png'), linear-gradient(to right bottom, #fd696b, #fa616e,
            #f65871, #f15075, #ec4879);
        /*linear-gradient(to right bottom, #fd8369, #fc7870, #f96e78, #f56581, #ee5d8a)*/
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
        border-radius: 8px;

        -webkit-transition: all .5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        -moz-transition: all .5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        -ms-transition: all .5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        -o-transition: all .5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        transition: all .5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        -webkit-transform-style: preserve-3d;
        -moz-transform-style: preserve-3d;
        -webkit-backface-visibility: hidden;
        -moz-backface-visibility: hidden;
    }

    .card__front {
        padding: 18px;
        -webkit-transform: rotateY(0);
        -moz-transform: rotateY(0);
    }

    .card__back {
        padding: 18px 0;
        -webkit-transform: rotateY(-180deg);
        -moz-transform: rotateY(-180deg);
    }

    .card__black-line {
        margin-top: 5px;
        height: 38px;
        background-color: #303030;
    }

    .card__logo {
        height: 16px;
    }

    .card__front-logo {
        position: absolute;
        top: 18px;
        right: 18px;
    }

    .card__square {
        border-radius: 5px;
        height: 30px;
    }

    .card_numer {
        display: block;
        width: 100%;
        word-spacing: 4px;
        font-size: 20px;
        letter-spacing: 2px;
        color: #fff;
        text-align: center;
        margin-bottom: 20px;
        margin-top: 20px;
    }

    .card__space-75 {
        width: 75%;
        float: left;
    }

    .card__space-25 {
        width: 25%;
        float: left;
    }

    .card__label {
        font-size: 10px;
        text-transform: uppercase;
        color: rgba(255, 255, 255, 0.8);
        letter-spacing: 1px;
    }

    .card__info {
        margin-bottom: 0;
        margin-top: 5px;
        font-size: 16px;
        line-height: 18px;
        color: #fff;
        letter-spacing: 1px;
        text-transform: uppercase;
    }

    .card__back-content {
        padding: 15px 15px 0;
    }

    .card__secret--last {
        color: #303030;
        text-align: right;
        margin: 0;
        font-size: 14px;
    }

    .card__secret {
        padding: 5px 12px;
        background-color: #fff;
        position: relative;
    }

    .card__secret:before {
        content: '';
        position: absolute;
        top: -3px;
        left: -3px;
        height: calc(100% + 6px);
        width: calc(100% - 42px);
        border-radius: 4px;
        background: repeating-linear-gradient(45deg, #ededed, #ededed 5px, #f9f9f9 5px, #f9f9f9 10px);
    }

    .card__back-logo {
        position: absolute;
        bottom: 15px;
        right: 15px;
    }

    .card__back-square {
        position: absolute;
        bottom: 15px;
        left: 15px;
    }

    .credit_card:hover .card__front {
        -webkit-transform: rotateY(180deg);
        -moz-transform: rotateY(180deg);

    }

    .credit_card:hover .card__back {
        -webkit-transform: rotateY(0deg);
        -moz-transform: rotateY(0deg);
    }
</style>

<!-- Breadcrumb-->
<div class="container-fluid">
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Profile</li>
    </ul>
</div>
<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4">
                <div class="card card-profile">
                    <div style="background-image: url({{asset("vendor/smart_shop_user/img/photos/paul-morris-116514-unsplash.jpg")}});"
                        class="card-header"></div>
                    <div class="card-body text-center"><img src="{{$user->avatar}}" class="card-profile-img"
                            style="object-fit: cover;display: inline-block;width: 150px;height: 150px;max-width:150px;border-radius: 100%;"
                            alt="avatar">
                        <h4 class="mb-3 text-gray-light">{{$user->name}}</h4>
                        <p class="mb-4">{{$user->bio}}</p>
                        <button class="btn btn-outline-secondary"><span class="fa fa-twitter"></span> Follow</button>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <form class="card">
                    <div class="card-header">
                        <h5 class="card-title">Detail Inforamtion</h5>
                    </div>
                    <div class="card-body">
                        <div class="row mt-5">
                            <div class="col-md-6">
                                <div class="credit_card">
                                    <div class="card__front card__part">
                                        <img class="card__front-square card__square"
                                            src="https://image.ibb.co/cZeFjx/little_square.png">
                                        <img class="card__front-logo card__logo"
                                            src="https://www.nexpay.uk/res/user/204_visa-logo.png">
                                        <p class="card_numer">**** **** ****
                                            {{ ($user->credit_card) ? substr($user->credit_card,-4): rand(1000, 9999) }}
                                            <div class="card__space-75">
                                                <span class="card__label">Card holder</span>
                                                <p class="card__info">{{$user->name}}</p>
                                            </div>
                                            <div class="card__space-25">
                                                <span class="card__label">Expires</span>
                                                <p class="card__info">{{rand(1, 12)}}/{{rand(1, 28)}}</p>
                                            </div>
                                    </div>

                                    <div class="card__back card__part">
                                        <div class="card__black-line"></div>
                                        <div class="card__back-content">
                                            <div class="card__secret">
                                                <p class="card__secret--last">{{rand(100, 999)}}</p>
                                            </div>
                                            <img class="card__back-square card__square"
                                                src="https://image.ibb.co/cZeFjx/little_square.png">
                                            <img class="card__back-logo card__logo"
                                                src="https://www.nexpay.uk/res/user/204_visa-logo.png">

                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-4">
                                    <label class="form-label">Email</label>
                                    <input type="text" placeholder="Company" value="{{$user->email}}"
                                        class="form-control" disabled>
                                </div>
                                {{--todo role--}}
                                <div class="form-group mb-4">
                                    <label class="form-label">Role</label>
                                    <input type="text" placeholder="Username"
                                        value="VIP" class="form-control" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-sm-4">
                                <div class="form-group mb-4">
                                    <label class="form-label">Saving Account</label>
                                    <input type="text" placeholder="Saving Account" value="{{$user->hasBankAccount['saving_account']}}"
                                        class="form-control" disabled>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group mb-4">
                                    <label class="form-label">Current Account</label>
                                    <input type="text" placeholder="Current Account" value="{{$user->hasBankAccount['current_account']}}"
                                        class="form-control" disabled>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group mb-4">
                                    <label class="form-label">VitCoin</label>
                                    <input type="text" placeholder="VitCoin" value="TODO"
                                        class="form-control" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@stop
