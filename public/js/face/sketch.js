const video = document.getElementById('video')
const faceCanvas = document.getElementById("faceCanvas");
let labeledFaceDescriptors;


Promise.all([
    faceapi.nets.tinyFaceDetector.loadFromUri('./js/face/models'),
    faceapi.nets.faceLandmark68Net.loadFromUri('./js/face/models'),
    faceapi.nets.faceRecognitionNet.loadFromUri('./js/face/models'),
    faceapi.nets.faceExpressionNet.loadFromUri('./js/face/models'),
    faceapi.nets.ssdMobilenetv1.loadFromUri('./js/face/models'),
    faceapi.nets.ageGenderNet.loadFromUri('./js/face/models'),
]).then(startVideo)

async function startVideo() {
    navigator.getUserMedia({
            video: {}
        },
        stream => video.srcObject = stream,
        err => console.error(err)
    )
    labeledFaceDescriptors = await loadLabeledImages()

}

video.addEventListener('play', () => {
    console.log('video ready')

    const canvas = faceapi.createCanvasFromMedia(video)
    document.body.append(canvas)
    const displaySize = {
        width: video.width,
        height: video.height
    }
    faceapi.matchDimensions(canvas, displaySize)


    setInterval(async () => {
        const detections = await faceapi.detectAllFaces(
                video, new faceapi.TinyFaceDetectorOptions())
            .withFaceLandmarks()
            .withFaceExpressions()
            .withAgeAndGender()
            .withFaceDescriptors()

        // console.log(detections);

        const resizedDetections = faceapi.resizeResults(detections, displaySize)
        let ctx = canvas.getContext('2d')
        ctx.clearRect(0, 0, canvas.width, canvas.height)
        ctx.height = video.height;
        ctx.width = video.width;
        ctx.drawImage(video, 0, 0, video.width, video.height)

        showFace(video, detections)
        faceapi.draw.drawDetections(canvas, resizedDetections)
        faceapi.draw.drawFaceLandmarks(canvas, resizedDetections)
        faceapi.draw.drawFaceExpressions(canvas, resizedDetections)
        resizedDetections.forEach(result => {
            //todo upload to server db
            const {
                age,
                gender,
                genderProbability
            } = result
            new faceapi.draw.DrawTextField(
                [
                    `${faceapi.utils.round(age, 0)} years`,
                    `${gender} (${faceapi.utils.round(genderProbability)})`
                ],
                result.detection.box.topLeft
            ).draw(canvas)
        })

        const faceMatcher = new faceapi.FaceMatcher(labeledFaceDescriptors, 0.45)
        const results = resizedDetections.map(d =>
            faceMatcher.findBestMatch(d.descriptor)
        )
        results.forEach((result, i) => {
            // console.log(result)
            faceCtx = faceCanvas.getContext('2d');
            faceCtx.fillStyle = "red";
            faceCtx.fillText(result.toString(), i * 200, 15);
        })

        document.getElementById('loading').innerHTML = "";

    }, 150)
})


function showFace(img, resizedDetections) {
    faceCtx = faceCanvas.getContext('2d');
    faceCanvas.width = 200 * resizedDetections.length;
    faceCanvas.height = 220;



    var target = 0;
    for (let i = 0; i < resizedDetections.length; i++) {

        const alignedRect = resizedDetections[i].alignedRect;
        const x = alignedRect._box._x
        const y = alignedRect._box._y
        const boxWidth = alignedRect._box._width
        const boxHeight = alignedRect._box._height

        // var targetSize = detections[target].alignedRect._box._width * detections[target].alignedRect._box._height;
        // if (targetSize < (boxWidth * boxHeight)) {
        //     target = i;
        // }

        targetBoxSize = boxWidth > boxHeight ? boxWidth / 200 : boxHeight / 200;
        faceCtx.drawImage(img, x, y, boxHeight, boxWidth, i * 200, 20, boxHeight / targetBoxSize, boxWidth / targetBoxSize)
    }

}


// function loadLabeledImages() {
//     const labels = ['Leonardo DiCaprio','Victoria Justice']
//     return Promise.all(
//         labels.map(async label => {
//             const descriptions = []
//             for (let i = 1; i <= 2; i++) {
//                 const img = await faceapi.fetchImage(`labeled_images/${label}/${i}.jpg`)
//                 const detections = await faceapi.detectSingleFace(img).withFaceLandmarks().withFaceDescriptor()
//                 descriptions.push(detections.descriptor)
//             }
//
//             return new faceapi.LabeledFaceDescriptors(label, descriptions)
//         })
//     )
// }
