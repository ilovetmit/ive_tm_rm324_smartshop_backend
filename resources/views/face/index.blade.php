{{--todo update style--}}
<html>
<head>
    <meta charset="UTF-8">
    <title>FaceApi</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <style>
        /* body{
          margin: 0;
          padding: 0;
          width: 100vw;
          height: 100vh;
          display: flex;
          justify-content: center;
          align-items: center;
        }

        canvas {
          position: absolute;
        } */
    </style>
    <script defer src="{{asset('js/face/face-api.min.js')}}"></script>
    <script defer src="{{asset('js/face/sketch.js')}}"></script>
</head>


<body>
<h1>FaceApi Recognition</h1>
<p id="loading">Loading Model...</p>
<canvas id="faceCanvas"></canvas>
<br>
<video id="video" width="720" height="540" autoplay muted></video>
<script>
    function loadLabeledImages() {
        //todo from user db
        const labels = ['Leonardo DiCaprio','Victoria Justice']
        return Promise.all(
            labels.map(async label => {
                const descriptions = []
                for (let i = 1; i <= 2; i++) {
                    const img = await faceapi.fetchImage(`{{asset('js/face')}}/labeled_images/${label}/${i}.jpg`)
                    const detections = await faceapi.detectSingleFace(img).withFaceLandmarks().withFaceDescriptor()
                    descriptions.push(detections.descriptor)
                }

                return new faceapi.LabeledFaceDescriptors(label, descriptions)
            })
        )
    }
</script>
</body>
</html>
