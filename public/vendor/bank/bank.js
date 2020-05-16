$('.js-message-btn').on('click', function () {
    showPopUp();
});


$(document).ready(function () {

    setTimeout(function () {
        $('.preloader').fadeOut('slow');
        AOS.init();
        $(`.section-2-object`).removeClass('aos-animate');
        $(`.section-3-object`).removeClass('aos-animate');
    }, 1500);

    $('#pagepiling').pagepiling({
        menu: null,
        direction: 'vertical',
        navigation: {
            'textColor': '#000',
            'bulletsColor': '#000',
            'position': 'right',
            'tooltips': ['Profile', 'Stock', 'Transcetion Record']
        },
        onLeave: function (index, nextIndex, direction) {
            $(`.section-${nextIndex}-object`).addClass('aos-animate');
            $(`.section-${index}-object`).removeClass('aos-animate');
            if (nextIndex === 2) {
                swiper.slideTo(0, 100);
            }
        }
    });
});


function showPopUp() {
    var card = document.querySelector('.js-profile-card');

    Swal.fire({
        title: 'Transection',
        type: '',
        html: `
          <form class="send-form">
          <textarea class="send-input-item" id="sendContent" placeholder="Say something if you want..."></textarea>
          <div class="send-row">
          Send To: <input type="text" name="sendTo" id="sendTo" class="send-input-item" list="contactList" placeholder="eg: example@gmail.com">
          Coins: <input type="number" min="0" name="coins" id="coins" class="send-input-item">
          </div>
          </form>
        `,
        showCloseButton: true,
        showCancelButton: true,
        focusConfirm: false,
        buttonsStyling: false,
        customClass: {
            confirmButton: 'profile-card__button button--blue js-message-close',
            cancelButton: 'profile-card__button button--gray js-message-close',
        },
        confirmButtonText: 'Send',
        cancelButtonText: 'Cancel',
        onOpen: function () {
            card.classList.add('active'); $('#sendContent').focus(); $('.swal2-actions').removeAttr('class');
        },
        onClose: function () { card.classList.remove('active'); },
        preConfirm: () => {
            if ($('#sendTo').val().length <= 0) {
                Swal.showValidationMessage('Please input receiver.')
                return;
            }

            if ($('#coins').val().length <= 0) {
                Swal.showValidationMessage('Please input the amount of coins you want to send.')
                return;
            }

        },
    }).then((result) => {
        if (result.value) {
            Swal.fire({
                type: 'success',
                title: 'Coins has been sent.',
                showConfirmButton: false,
                timer: 1500
            })
        }
    })
}

var swiper = new Swiper('.swiper-container', {
    slidesPerView: 6,
    spaceBetween: 40,
    pagination: {
        el: '.swiper-pagination',
        clickable: true
    }
});

chartDataArray = [];
for (let index = 0; index < 12; index++) {
    chartDataArray.push(generateChartData());
}


var oldIndex = -1;

function renderingChart(index, stockname, symbol) {

    if (index === oldIndex)
        return

    // Create chart instance
    var chart = am4core.create("chartdiv", am4charts.XYChart);

    // Add data
    chart.data = chartDataArray[index];
    oldIndex = index;

    // Create axes
    var dateAxis = chart.xAxes.push(new am4charts.DateAxis());
    dateAxis.renderer.minGridDistance = 50;
    dateAxis.title.text = "Months";

    var dateYAxis = chart.yAxes.push(new am4charts.ValueAxis());
    dateYAxis.title.text = "Volume (million)";

    // Create series
    var series = chart.series.push(new am4charts.LineSeries());
    series.dataFields.valueY = "amount";
    series.dataFields.dateX = "date";
    series.strokeWidth = 2;
    series.minBulletDistance = 10;

    series.tooltipText = "Total Amount: {valueY}";
    series.tooltip.pointerOrientation = "vertical";
    series.tooltip.background.cornerRadius = 15;
    series.tooltip.background.fillOpacity = 0.5;
    series.tooltip.label.padding(12, 12, 12, 12);

    series.sequencedInterpolation = true;

    // Add scrollbar
    chart.scrollbarX = new am4charts.XYChartScrollbar();
    chart.scrollbarX.series.push(series);

    // Add cursor
    chart.cursor = new am4charts.XYCursor();
    chart.cursor.xAxis = dateAxis;
    chart.cursor.snapToSeries = series;

    var title = chart.titles.create();
    title.text = `${stockname} (${symbol})`;
    title.fontSize = 35;
    title.fontWeight = 600;
    title.marginBottom = 15;
}

function generateChartData() {
    var chartData = [];
    var firstDate = new Date();

    firstDate.setDate(firstDate.getDate() - 366);
    var amount = 12000;
    for (var i = 0; i < 365; i++) {
        var newDate = new Date(firstDate);
        newDate.setDate(newDate.getDate() + i);

        amount += Math.round((Math.random() < 0.5 ? 1 : -1) * Math.random() * 10);

        chartData.push({
            date: newDate,
            amount: amount
        });
    }
    return chartData;
}



// particlesJS('particles-js',

//     {
//         "particles": {
//             "number": {
//                 "value": 60,
//                 "density": {
//                     "enable": true,
//                     "value_area": 800
//                 }
//             },
//             "color": {
//                 "value": "#ffffff"
//             },
//             "shape": {
//                 "type": "circle",
//                 "stroke": {
//                     "width": 0,
//                     "color": "#000000"
//                 },
//                 "polygon": {
//                     "nb_sides": 5
//                 },
//                 "image": {
//                     "src": "img/github.svg",
//                     "width": 100,
//                     "height": 100
//                 }
//             },
//             "opacity": {
//                 "value": 0.5,
//                 "random": false,
//                 "anim": {
//                     "enable": false,
//                     "speed": 1,
//                     "opacity_min": 0.1,
//                     "sync": false
//                 }
//             },
//             "size": {
//                 "value": 5,
//                 "random": true,
//                 "anim": {
//                     "enable": false,
//                     "speed": 40,
//                     "size_min": 0.1,
//                     "sync": false
//                 }
//             },
//             "line_linked": {
//                 "enable": true,
//                 "distance": 150,
//                 "color": "#ffffff",
//                 "opacity": 0.4,
//                 "width": 1
//             },
//             "move": {
//                 "enable": true,
//                 "speed": 6,
//                 "direction": "none",
//                 "random": false,
//                 "straight": false,
//                 "out_mode": "out",
//                 "attract": {
//                     "enable": false,
//                     "rotateX": 600,
//                     "rotateY": 1200
//                 }
//             }
//         },
//         "interactivity": {
//             "detect_on": "canvas",
//             "events": {
//                 "onhover": {
//                     "enable": false,
//                     "mode": "repulse"
//                 },
//                 "onclick": {
//                     "enable": false,
//                     "mode": "push"
//                 },
//                 "resize": true
//             },
//             "modes": {
//                 "grab": {
//                     "distance": 400,
//                     "line_linked": {
//                         "opacity": 1
//                     }
//                 },
//                 "bubble": {
//                     "distance": 400,
//                     "size": 40,
//                     "duration": 2,
//                     "opacity": 8,
//                     "speed": 3
//                 },
//                 "repulse": {
//                     "distance": 200
//                 },
//                 "push": {
//                     "particles_nb": 4
//                 },
//                 "remove": {
//                     "particles_nb": 2
//                 }
//             }
//         },
//         "retina_detect": true,
//         "config_demo": {
//             "hide_card": false,
//             "background_color": "transparent",
//             "background_image": "",
//             "background_position": "100% 100%",
//             "background_repeat": "no-repeat",
//             "background_size": "contain"
//         }
//     }

// );
