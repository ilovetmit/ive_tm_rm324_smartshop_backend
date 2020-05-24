<!DOCTYPE html>
<html>

<head>
    <title>{{config("constants.WORDINGS.HTML_TITLE")}}</title>
    <link rel="shortcut icon" href="{{asset('images/S-Shop_logo.png')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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

    <video autoplay muted loop id="myVideo">
        <source src="{{ asset("videos/shop_esculator.mp4") }}" type="video/mp4">
        Your browser does not support HTML5 video.
    </video>

    <div class="content">
        <h1>S-SHOP@TMIT</h1>
        <p>Artificial Intelligence (AI) | Internet of Things (IoT) | Financial Technology (Fintech) | Network
            Communication | Cloud Technology</p>
        <a href="{{ URL::action('SShopController@advertisement') }}" class="btn btn-light btn-lg">Start the Journey</a>
    </div>

    <div class="text-center qrcode">
        <img width="300" src="https://chart.apis.google.com/chart?cht=qr&chs=300x300&chld=L|0&chl=BANKING-{{$token}}">
        <h3 class="text">START BY QRCODE</h3>
    </div>

    <script>
        var video = document.getElementById("myVideo");
	var btn = document.getElementById("myBtn");

	function myFunction() {
		if (video.paused) {
			video.play();
			btn.innerHTML = "Pause";
		} else {
			video.pause();
			btn.innerHTML = "Play";
		}
	}
    </script>
</body>
<script src="{{asset('js/app.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>

<script>

    window.Echo.channel('qrcodeLogin')
        .listen('.{{$token}}', (e) => {
            if(e.data === 'REFRESH'){
                window.location.reload();
            }else{
                window.location.href = "{{URL::action('SShopController@login_qr_approve')}}?one_time_password=" + e.data;
            }

        });

</script>

</html>
