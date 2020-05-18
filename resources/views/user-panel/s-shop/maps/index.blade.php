{{-- Parent Layout --}}
@extends('_layout.user-panel.master.s_shop_layout')
@section('page_header','Maps')


{{-- Body Main Content --}}
@section('body_main_content')

<style>
    .ol-popup {
        position: absolute;
        background-color: white;
        -webkit-filter: drop-shadow(0 1px 4px rgba(0, 0, 0, 0.2));
        filter: drop-shadow(0 1px 4px rgba(0, 0, 0, 0.2));
        padding: 15px;
        border-radius: 10px;
        border: 1px solid #cccccc;
        bottom: 12px;
        left: -50px;
        min-width: 280px;
    }

    .ol-popup:after,
    .ol-popup:before {
        top: 100%;
        border: solid transparent;
        content: " ";
        height: 0;
        width: 0;
        position: absolute;
        pointer-events: none;
    }

    .ol-popup:after {
        border-top-color: white;
        border-width: 10px;
        left: 48px;
        margin-left: -10px;
    }

    .ol-popup:before {
        border-top-color: #cccccc;
        border-width: 11px;
        left: 48px;
        margin-left: -11px;
    }

    .ol-popup-closer {
        text-decoration: none;
        position: absolute;
        top: 2px;
        right: 8px;
    }

    .ol-popup-closer:after {
        content: "✖";
    }

    .ol-overviewmap {
        margin-bottom: 1.6rem !important;
    }

    .tab-box {
        height: 17vh;
    }
</style>


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
                <a class="col-md-3 text-decoration-none" id="pills-school-tab" data-toggle="tab" href="#list-school"
                    role="tab" aria-controls="school" aria-selected="true">
                    <div class="tab-box card text-white bg-primary">
                        <div class="card-header card-header-transparent">S-SHOP@TMIT</div>
                        <div class="card-body">
                            <p class="card-text">A shop that can experience technology</p>
                        </div>
                    </div>
                </a>
                <a class="col-md-3 text-decoration-none" id="pills-first-tab" data-toggle="tab" href="#list-first"
                    role="tab" aria-controls="first" aria-selected="false">
                    <div class="tab-box card text-white bg-secondary">
                        <div class="card-header card-header-transparent">1st Floor</div>
                        <div class="card-body">
                            <p class="card-text">Electronic</p>
                        </div>
                    </div>
                </a>
                <a class="col-md-3 text-decoration-none" id="pills-second-tab" data-toggle="tab" href="#list-second"
                    role="tab" aria-controls="second" aria-selected="false">
                    <div class="tab-box card text-white bg-success">
                        <div class="card-header card-header-transparent">2nd Floor</div>
                        <div class="card-body">
                            <p class="card-text">Supermarket / Food</p>
                        </div>
                    </div>
                </a>
                <a class="col-md-3 text-decoration-none" id="pills-third-tab" data-toggle="tab" href="#list-third"
                    role="tab" aria-controls="third" aria-selected="false">
                    <div class="tab-box card text-white bg-info">
                        <div class="card-header card-header-transparent">3rd Floor</div>
                        <div class="card-body">
                            <p class="card-text">Restaurants</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="block" style="margin-bottom: 300px">
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="list-school" role="tabpanel"
                        aria-labelledby="list-school">
                        <div id="map" style="height: 700px;" class="h-100"></div>
                    </div>
                    <div class="tab-pane text-center fade" id="list-first" role="tabpanel" aria-labelledby="list-first">
                        <img src="{{asset("images/maps/floor_1.jpeg")}}" class="img-fluid w-100">
                    </div>
                    <div class="tab-pane text-center fade" id="list-second" role="tabpanel"
                        aria-labelledby="list-second">
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
    <script src="https://cdn.rawgit.com/openlayers/openlayers.github.io/master/en/v5.0.0/build/ol.js"></script>
    <script src="https://cdn.polyfill.io/v2/polyfill.min.js?features=requestAnimationFrame,Element.prototype.classList">
    </script>
    <script>
        var map = new ol.Map({
                  controls: new ol.control.defaults().extend([
                    new ol.control.ZoomToExtent({
                      extent: [
                        12686317.45896812, 2558616.2671824526,
                        12687083.62074382, 2558999.646652445,
                      ]
                    }),
                  ]),
                  target: 'map',
                  layers: [new ol.layer.Tile({
                    source: new ol.source.OSM()
                  }),
                  ],
                  view: new ol.View({
                    center: ol.proj.fromLonLat([113.96657, 22.39327]),
                    zoom: 18,
                  })
                });

    </script>
    @endsection
