<!-- @//extends('adminlte::register') -->

<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3</title>
    <link rel="stylesheet" href="http://127.0.0.1:8000/vendor/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="http://127.0.0.1:8000/vendor/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="http://127.0.0.1:8000/vendor/adminlte/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="register-page" style="min-height: 454.391px;">

    <div class="register-box">
        <div class="register-logo">
            <a href="http://127.0.0.1:8000/home"><b>Admin</b>LTE</a>
        </div>
        <div class="card">
            <div class="card-body register-card-body">
                <p class="login-box-msg">Register a new membership</p>
                <form action="http://127.0.0.1:8000/register" method="post">
                    <input type="hidden" name="_token" value="JJbkphnQctZN10WiIGAAnOwvafdeg9IdLyJYuFpA">

                    <div class="input-group mb-3">
                        <input type="text" name="name" class="form-control " value="" placeholder="Full name">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>

                    </div>
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control " value="" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control " placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password_confirmation" class="form-control " placeholder="Retype password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block btn-flat">
                        Register
                    </button>
                </form>
                <p class="mt-2 mb-1">
                    <a href="http://127.0.0.1:8000/login">
                        I already have a membership
                    </a>
                </p>
            </div>
            <!-- /.form-box -->
        </div><!-- /.register-box -->

        <script src="http://127.0.0.1:8000/vendor/jquery/jquery.min.js"></script>
        <script src="http://127.0.0.1:8000/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="http://127.0.0.1:8000/vendor/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>


        <script src="http://127.0.0.1:8000/vendor/adminlte/dist/js/adminlte.min.js"></script>



    </div>
</body>

</html>