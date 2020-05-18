{{-- Parent Layout --}}
@extends('_layout.user-panel.master.smart_banking_login')



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
                <form class="form-validate">
                    <div class="text-center mb-3">
                        <img width="300"
                            src="https://chart.apis.google.com/chart?cht=qr&chs=300x300&chld=L|0&chl=BANKING-{{$token}}">
                    </div>
                    <!-- Link-->
                    <p class="text-center"><small class="text-muted text-center"><a
                                href="{{ URL::action('SmartBankingController@login') }}">Account Login </a></small></p>
                    {{--                        <p class="text-center"><small class="text-muted text-center">Don't have an account yet? <a href="register-2.html">Register</a>.</small></p>--}}
                </form>
                <p class="text-center text-muted small mt-5">Designed by C Group Limited</p>
            </div>
        </div>
        <video style="object-fit: fill;" playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
            <source src="{{ asset("videos/bank_money.mp4") }}" type="video/mp4">
        </video>
    </header>
</div>
@stop

@section('body_end_scripts')
<script src="https://cdn.jsdelivr.net/npm/laravel-echo@1.6.1/dist/echo.common.min.js"></script>
<script src="//{{ Request::getHost() }}:6001/socket.io/socket.io.js"></script>
<script>
    window.Echo = new Echo({
        broadcaster: 'socket.io',
        host: window.location.hostname + ':6001'
    });
    window.Echo.channel('qrcodeLogin')
        .listen('.{{$token}}', (e) => {
            if(e.data === 'REFRESH'){
                Swal.fire({
                type: 'error',
                title: 'Oops...',
                text: 'You need to refresh the broswer',
                preConfirm: () => {
                    window.location.reload();
                }
                })
            }else{
                window.location.href = "{{URL::action('SmartBankingController@login_qr_approve')}}?one_time_password=" + e.data;
            }

        });

</script>
@stop
