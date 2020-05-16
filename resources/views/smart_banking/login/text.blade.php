{{-- Parent Layout --}}
@extends('_layout.dark-admin-premium-1-4-5.master.smart_banking_login')



{{-- Body Main Content --}}
@section('body_main_content')
<style>
    header {
        position: relative;
        height: 100vh;
        min-height: 25rem;
        width: 100%;
        overflow: hidden;
    }

    /* The only rule that matters */
    header video {
        /*  making the video fullscreen  */
        position: fixed;
        right: 0;
        bottom: 0;
        min-width: 100%;
        min-height: 100%;
        width: auto;
        height: auto;
        z-index: -100;
    }
</style>
<div class="row min-vh-100">
    <header>
        <div class="col-md-5 col-lg-6 col-xl-4 px-lg-5 d-flex align-items-center bg-gray-dark h-100">
            <div class="w-100 py-5">
                <div class="text-center"><img src="{{asset("vendor/smart_shop_user/img/brand/brand-1.svg")}}" alt="..."
                        style="max-width: 6rem;" class="img-fluid mb-4">
                    <h1 class="display-4 text-gray-light mb-3">Smart Banking</h1>
                </div>
                <form class="form-validate" method="POST"
                    action="{{ URL::action('Auth\SmartBankingLoginController@login') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>Email Address</label>
                        <input name="email" type="email" placeholder="name@address.com" autocomplete="off" required
                            data-msg="Please enter your email" class="form-control" value="leonardo-dicaprio@gmail.com">
                        @if ($errors->has('email'))
                        <span class="form-text text-danger">
                            <small>{{ $errors->first('email') }}</small>
                        </span>
                        @endif
                    </div>
                    <div class="form-group mb-4">
                        <div class="row">
                            <div class="col">
                                <label>Password</label>
                            </div>
                            <div class="col-auto"><a href="#" class="form-text small text-muted" tabIndex="-1">Forgot
                                    password?</a>
                            </div>
                        </div>
                        @if ($errors->has('password'))
                        <span class="form-text text-danger">
                            <small>{{ $errors->first('password') }}</small>
                        </span>
                        @endif
                        <input name="password" placeholder="Password" type="password" required
                            data-msg="Please enter your password" class="form-control" value="ilovetmit">
                    </div>
                    <!-- Submit-->
                    <button class="btn btn-lg btn-block btn-primary mb-3">Sign in</button>
                    <!-- Link-->
                    <p class="text-center"><small class="text-muted text-center"><a
                                href="{{ URL::action('SmartBankingController@login_qr') }}">QR code Login</a></small>
                    </p>
                    {{--                        <p class="text-center"><small class="text-muted text-center">Don't have an account yet? <a href="register-2.html">Register</a>.</small></p>--}}
                </form>
                <p class="text-center text-muted small mt-5">Designed by C Group Limited</p>
            </div>
        </div>
        <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
            <source src="{{ asset("videos/bank_buildings.mp4") }}" type="video/mp4">
        </video>
    </header>
</div>
@stop