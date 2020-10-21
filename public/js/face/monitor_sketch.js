const video = document.getElementById('video')
// const faceCanvas = document.getElementById("faceCanvas");
// let labeledFaceDescriptors;

const average = list => list.reduce((prev, curr) => prev + curr);

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
    // labeledFaceDescriptors = await loadLabeledImages()

}

video.addEventListener('play', () => {
    console.log('video ready')

    const canvas = faceapi.createCanvasFromMedia(video);
    $('#result').prepend(canvas);
    // document.body.append(canvas)
    const displaySize = {
        width: 720,
        height: 540
    }
    faceapi.matchDimensions(canvas, displaySize)

    var frame = 0;
    var facedata = [];
    var face_amount = [];
    var face_gender = [];
    var face_group = {
        0: [], //'0-9'
        1: [], //'10-19'
        2: [], //'20-29'
        3: [], //'30-39'
        4: [], //'40-49'
        5: [], //'50-59'
        6: [], //'60-69'
        7: [], //'70-79'
        8: [], //'80-89'
        9: [], //'>=90'
    };
    var face_expression = {
        'angry': [],
        'disgusted': [],
        'fearful': [],
        'happy': [],
        'neutral': [],
        'sad': [],
        'surprised': [],
    };


    setInterval(async () => {
        var people = 0;
        var gender = 0;
        var detail = [];
        frame++;

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
        ctx.height = 720;
        ctx.width = 540;
        ctx.drawImage(video, 0, 0, 720, 540)

        // showFace(video, detections)
        faceapi.draw.drawDetections(canvas, resizedDetections)
        faceapi.draw.drawFaceLandmarks(canvas, resizedDetections)
        faceapi.draw.drawFaceExpressions(canvas, resizedDetections)

        resizedDetections.forEach((result, i) => {
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

            var expr = result.expressions;
            var sorted = expr.asSortedArray();
            var resultsToDisplay = sorted.filter(function (expr) {
                return expr.probability > 0.2;
            });

            // console.log(resultsToDisplay);

            // faceCtx = faceCanvas.getContext('2d');
            // faceCtx.font = "14pt Arial";
            // faceCtx.fillStyle = "#ddefff";
            // faceCtx.fillText(faceapi.utils.round(age, 0) + " years", 210, i * 220 + 40);
            // faceCtx.fillText(gender + " (" + faceapi.utils.round(result.genderProbability) + ")", 210, i * 220 + 60);

            // resultsToDisplay.forEach((e, n) => {
            //     face_expression[e.expression].push(gender === 'male' ? 1 : 0);
            //     faceCtx.fillText(e.expression + " (" + faceapi.utils.round(e.probability) + ")", 210, i * 220 + 100 + n * 20);
            // });

            face_gender.push(gender === 'male' ? 1 : 0);
            face_group = age_group(age, gender === 'male' ? 1 : 0, face_group)
        })

        // todo match face not now plan
        // const faceMatcher = new faceapi.FaceMatcher(labeledFaceDescriptors, 0.45)
        // const results = resizedDetections.map(d =>
        //     faceMatcher.findBestMatch(d.descriptor)
        // )
        // results.forEach((result, i) => {
        //     // console.log(result)
        //     faceCtx = faceCanvas.getContext('2d');
        //     faceCtx.fillStyle = "red";
        //     faceCtx.fillText(result.toString(), i * 200, 15);
        // })

        document.getElementById('loading').innerHTML = "";


        if (resizedDetections.length > 0) {
            face_amount.push(resizedDetections.length);
            facedata.push(resizedDetections);
            // console.log(resizedDetections);
            if (facedata.length >= 100 || frame >= 100) {
                people = average(face_amount) / face_amount.length;
                gender = average(face_gender) / face_gender.length;

                detail = facedata;

                if (facedata.length > 0) {
                    await postData(people, gender, face_group, face_expression, detail)
                }

                frame = 0;
                facedata = [];
                face_amount = [];
                face_expression = {
                    'angry': [],
                    'disgusted': [],
                    'fearful': [],
                    'happy': [],
                    'neutral': [],
                    'sad': [],
                    'surprised': [],
                };
                face_group = {
                    0: [], //'0-9'
                    1: [], //'10-19'
                    2: [], //'20-29'
                    3: [], //'30-39'
                    4: [], //'40-49'
                    5: [], //'50-59'
                    6: [], //'60-69'
                    7: [], //'70-79'
                    8: [], //'80-89'
                    9: [], //'>=90'
                };

            }
        }

    }, 100)
})


function showFace(img, resizedDetections) {
    faceCtx = faceCanvas.getContext('2d');
    faceCanvas.width = 350;
    faceCanvas.height = 220 * resizedDetections.length;

    var target = 0;
    for (let i = 0; i < resizedDetections.length; i++) {

        const alignedRect = resizedDetections[i].alignedRect;
        const x = alignedRect._box._x;
        const y = alignedRect._box._y;
        const boxWidth = alignedRect._box._width;
        const boxHeight = alignedRect._box._height;

        // var targetSize = detections[target].alignedRect._box._width * detections[target].alignedRect._box._height;
        // if (targetSize < (boxWidth * boxHeight)) {
        //     target = i;
        // }

        let targetBoxSize = boxWidth > boxHeight ? boxWidth / 200 : boxHeight / 200;
        faceCtx.drawImage(img, x, y, boxHeight, boxWidth, 0, i * 220, boxHeight / targetBoxSize, boxWidth / targetBoxSize)
    }

}


function age_group(age, gender, group) {
    // ['0-9', '10-19', '20-29', '30-39', '40-49', '50-59', '60-69', '70-79', '80-89', '>=90']
    if (age >= 0 && age <= 9) {
        group[0].push(gender);
    } else if (age >= 10 && age <= 19) {
        group[1].push(gender);
    } else if (age >= 20 && age <= 29) {
        group[2].push(gender);
    } else if (age >= 30 && age <= 39) {
        group[3].push(gender);
    } else if (age >= 40 && age <= 49) {
        group[4].push(gender);
    } else if (age >= 50 && age <= 59) {
        group[5].push(gender);
    } else if (age >= 60 && age <= 69) {
        group[6].push(gender);
    } else if (age >= 70 && age <= 79) {
        group[7].push(gender);
    } else if (age >= 80 && age <= 89) {
        group[8].push(gender);
    } else if (age >= 90) { //>=90
        group[9].push(gender);
    }
    return group;


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


