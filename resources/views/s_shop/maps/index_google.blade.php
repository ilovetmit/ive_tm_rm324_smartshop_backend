{{-- Parent Layout --}}
@extends('_layout.dark-admin-premium-1-4-5.master.s_shop_layout')
@section('page_header','Maps')

{{-- Body Main Content --}}
@section('body_main_content')
<section>
  {{-- TODO no change at the moment --}}

  <div class="container-fluid">
    <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Home</a></li>
      <li class="breadcrumb-item active">Maps</li>
    </ul>
  </div>
  <section>
    <div class="container-fluid">

      <div class="row nav text-center" id="pills-tab" role="tablist">
        <a class="col-md-3 text-decoration-none" id="pills-school-tab" data-toggle="tab" href="#list-school" role="tab"
          aria-controls="school" aria-selected="true">
          <div class="card text-white bg-primary">
            <div class="card-header card-header-transparent">S-SHOP@TMIT</div>
            <div class="card-body">
              <p class="card-text">A shop that can experience technology</p>
            </div>
          </div>
        </a>
        <a class="col-md-3 text-decoration-none" id="pills-first-tab" data-toggle="tab" href="#list-first" role="tab"
          aria-controls="first" aria-selected="false">
          <div class="card text-white bg-secondary">
            <div class="card-header card-header-transparent">1st Floor</div>
            <div class="card-body">
              <p class="card-text">Electronic</p>
            </div>
          </div>
        </a>
        <a class="col-md-3 text-decoration-none" id="pills-second-tab" data-toggle="tab" href="#list-second" role="tab"
          aria-controls="second" aria-selected="false">
          <div class="card text-white bg-success">
            <div class="card-header card-header-transparent">2nd Floor</div>
            <div class="card-body">
              <p class="card-text">Supermarket / Food</p>
            </div>
          </div>
        </a>
        <a class="col-md-3 text-decoration-none" id="pills-third-tab" data-toggle="tab" href="#list-third" role="tab"
          aria-controls="third" aria-selected="false">
          <div class="card text-white bg-info">
            <div class="card-header card-header-transparent">3rd Floor</div>
            <div class="card-body">
              <p class="card-text">Restaurants</p>
            </div>
          </div>
        </a>
      </div>

      <div class="block" style="margin-bottom: 300px">
        <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane fade show active" id="list-school" role="tabpanel" aria-labelledby="list-school">
            <div id="map-1" style="height: 700px;" class="map"></div>
          </div>
          <div class="tab-pane text-center fade" id="list-first" role="tabpanel" aria-labelledby="list-first">
            <img src="{{asset("images/maps/floor_1.jpeg")}}" class="img-fluid w-100">
          </div>
          <div class="tab-pane text-center fade" id="list-second" role="tabpanel" aria-labelledby="list-second">
            <img src="{{asset("images/maps/floor_2.jpeg")}}" class="img-fluid w-100">
          </div>
          <div class="tab-pane text-center fade" id="list-third" role="tabpanel" aria-labelledby="list-third">
            <img src="{{asset("images/maps/floor_3.jpeg")}}" class="img-fluid w-100">
          </div>
        </div>
      </div>
    </div>



  </section>
  @endsection

  {{-- Body End Scripts --}}
  @section('body_end_scripts')
  <!-- Google Maps-->
  <!-- Create your own Maps API Key for production use, this one is domain-restricted-->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu5nZKbeK-WHQ70oqOWo-_4VmwOwKP9YQ"> </script>
  <!-- Google maps infobox-->
  <script src="{{asset("vendor/smart_shop_user/vendor/google-maps-infobox/infobox-lib.js")}}"> </script>
  <!-- Google map creation-->
  <script src="{{asset("vendor/smart_shop_user/js/components-map.js")}}"> </script>

  <!--  Styled Google map init + multiple markers + infobox-->
  <script>
    $(function () {
                // coordinates for the center of the map
                var lat = 22.3930672;
                var long = 113.9664712;

                // json file path with the markers to display on the map
                //var jsonFile = 'data/ive_address.json';

                // if using with other than default style, change the path to the colour variant
                // of the marker. E.g. to img/map-marker-violet.png.
                var markerImage = '{{asset("vendor/smart_shop_user/img/map-marker-default.png")}}';
                // id of the map DOM element
                var id = 'map-1';

                var json = [
                  {
                    "_id": "59c0c8e33b1527bfe2abaf92",
                    "index": 0,
                    "guid": "53178f64-9f01-4394-b9f1-4f2f83bb5924",
                    "isActive": true,
                    "icon": "http://placehold.it/32x32",
                    "logo": "http://placehold.it/32x32",
                    "image": "http://tmintra.stu.vtc.edu.hk/image/yc.jpg",
                    "link": "detail.html",
                    "url": "#",
                    "name": "Hong Kong Institute of Vocational Education (Tuen Mun)",
                    "email": "tm-cs@vtc.edu.hk",
                    "phone": "+852 2463 0066",
                    "address": "18 Tsing Wun Road, Tuen Mun, New Territories",
                    "about": "Located on a 2.4-hectare site adjacent to the Tuen Mun Town Centre, IVE (Tuen Mun) is equipped with facilities to provide simulated working environment, including Image Gallery and Hair Studio, Moot Court of Centre for Legal and Administrative Practices, Centre for Accounting Services and Training, Construction Material & Science Laboratory, and Audio and Video Production Rooms.\r\n",
                    "latitude": 22.3930672,
                    "longitude": 113.9664712,
                    "tags": [
                      "ive",
                      "tm"
                    ]
                  }
                ];


                map = createMap(id, lat, long, json, markerImage);

              });

              function createMap(id, lat, long, json, markerImage) {

                var location = new google.maps.LatLng(lat, long);

                var mapCanvas = document.getElementById(id);
                var mapOptions = {
                  zoom: 17,
                  scrollwheel: false,
                  center: location,
                  styles: [{
                    featureType: "landscape", elementType: "labels", stylers: [{ visibility: "off" }]
                  }, {
                    featureType: "transit", elementType: "labels", stylers: [{ visibility: "off" }]
                  }, {
                    featureType: "poi", elementType: "labels", stylers: [{ visibility: "off" }]
                  }, {
                    featureType: "water", elementType: "labels", stylers: [{ visibility: "off" }]
                  }, {
                    featureType: "road", elementType: "labels.icon", stylers: [{ visibility: "off" }]
                  } ]
                };
                var map = new google.maps.Map(mapCanvas, mapOptions);

                var newMarkers = [];
                var markerClicked = 0;
                var activeMarker = false;
                var lastClicked = false;

                for (var i = 0; i < json.length; i++) {

                  marker = new google.maps.Marker({
                    position: new google.maps.LatLng(json[i].latitude, json[i].longitude),
                    map: map,
                    icon: markerImage
                  });

                  // place marker
                  newMarkers.push(marker);

                  //infobox

                  var infoboxContent = document.createElement("div");
                  var infoboxOptions = {
                    content: infoboxContent,
                    disableAutoPan: false,
                    pixelOffset: new google.maps.Size(-325, -60),
                    zIndex: null,
                    alignBottom: true,
                    boxClass: "infobox",
                    enableEventPropagation: true,
                    closeBoxMargin: "0px 0px -30px 0px",
                    closeBoxURL: "{{asset("vendor/smart_shop_user/img/map-close.png")}}",
                    infoBoxClearance: new google.maps.Size(1, 1)
                  };
                  // infobox html

                  infoboxContent.innerHTML = drawInfobox(infoboxContent, json, i);

                  newMarkers[i].infobox = new InfoBox(infoboxOptions);

                  google.maps.event.addListener(marker, 'click', function() {
                    // reference clicked marker
                    var curMarker =  this;
                    // loop through all markers
                    $.each(newMarkers, function(index, marker) {
                      // if marker is not the clicked marker, close the marker
                      if(marker !== curMarker) {
                        marker.infobox.close();
                      }
                    });

                    curMarker.infobox.open(map, this);
                  });
                }
              }
  </script>
  @endsection