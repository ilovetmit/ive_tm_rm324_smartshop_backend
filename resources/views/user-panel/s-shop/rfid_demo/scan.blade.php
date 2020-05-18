<!DOCTYPE html>
<html>

<head>
    <title>{{config("constants.WORDINGS.HTML_TITLE")}}</title>
    <link rel="shortcut icon" href="{{asset('images/S-Shop_logo.png')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial;
            font-size: 17px;
        }

        #myVideo {
            position: fixed;
            right: 0;
            bottom: 0;
            min-width: 100%;
            min-height: 100%;
        }

        .content {
            position: fixed;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            color: #f1f1f1;
            width: 100%;
            padding: 20px;
        }

        #myBtn {
            width: 200px;
            font-size: 18px;
            padding: 10px;
            border: none;
            background: #000;
            color: #fff;
            cursor: pointer;
        }

        #myBtn:hover {
            background: #ddd;
            color: black;
        }

        .qrcode {
            position: absolute;
            bottom: 2vh;
            right: 5vh;
        }

        .text {
            color: #fff;
            margin-top: 1vh
        }
    </style>
</head>

<body>

<div class="jumbotron">
    <h1 class="display-4">RFID Scan</h1>
    <p class="lead">Place items on the RFID scanner.</p>
    <hr class="my-4">
    <a class="btn btn-primary btn-lg" href="{{route('sshop.splash')}}" role="button">Back</a>
</div>

</body>
<script src="{{asset('js/app.js')}}"></script>

<script>

  window.Echo.channel('rfid_scan')
    .listen('RFID', (e) => {
      window.location.href = "{{asset('s-shop/shopping/detail')}}/"+e.data;
    });

</script>

</html>