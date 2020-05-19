{{-- Parent Layout --}}
@extends('_layout.user-panel.master.s_shop_layout')
@section('page_header','Product Detail')

{{-- Body Main Content --}}
@section('body_main_content')
<style>
    .logo-photo {
        object-fit: cover;
        display: inline-block;
        width: 200px;
        height: 200px;
        margin-top: -6rem;
        margin-bottom: 1rem;
        border: 3px solid #868e96;
        border-radius: 100%;
    }
</style>
<!-- Breadcrumb-->
<div class="container-fluid">
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ URL::action('SShopController@shopping') }}">Shopping</a></li>
        <li class="breadcrumb-item active">{{$row->name}}</li>
    </ul>
</div>
<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4">
                <div class="card card-profile">
                    <div style="background-image: url({{asset("vendor/smart_shop_user/img/photos/paul-morris-116514-unsplash.jpg")}});"
                        class="card-header"></div>
                    <div class="card-body text-center">
                        <img src="{{asset('storage/products/image/' . $row->image)}}" class="logo-photo">
                        <h4 class="mb-3 text-gray-light">{{$row->name}}</h4>
                        <p class="mb-4 h5">HK$ {{$row->price}}</p>
                        <button class="btn btn-outline-success"><span class="fa fa-thumbs-up"></span> Like</button>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="media">
                            <div class="ml-5 pr-3">
                                <img width="150"
                                    src="https://chart.apis.google.com/chart?cht=qr&chs=150x150&chld=L|0&chl={{$row->qrcode}}">
                            </div>
                            <div class="media-body m-auto text-center">
                                <h3>Scan to buy</h3>
                                <h2 class="text-muted mb-0 text-danger">HK$ {{$row->price}}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <div class="input-group">
                            <h4>Reviews</h4>
                        </div>
                    </div>
                    <div class="list-group card-list-group">
                        <div class="list-group-item py-5">
                            <div class="media">
                                <div style="background-image: url({{asset("vendor/smart_shop_user/img/avatar-7.jpg")}})"
                                    class="media-object avatar avatar-md mr-3"></div>
                                <div class="media-body">
                                    <div class="media-heading"><small class="float-right">10 min</small>
                                        <h5 class="text-gray">Nathan Andrews</h5>
                                    </div>
                                    <div class="text-small">One morning, when Gregor Samsa woke from troubled dreams, he
                                        found himself transformed in his bed into a horrible vermin. He lay on his
                                        armour-like back, and if he lifted his head a little he could see his brown
                                        belly, slightly domed and divided by arches into stiff sections</div>
                                    <div class="media-list">
                                        <div class="media mt-4">
                                            <div style="background-image: url({{asset("vendor/smart_shop_user/img/avatar-3.jpg")}})"
                                                class="media-object avatar mr-3"></div>
                                            <div class="media-body text-muted text-small"><strong
                                                    class="text-gray">Serenity Mitchelle: </strong>&nbsp; The bedding
                                                was hardly able to cover it and seemed ready to slide off any moment.
                                                His many legs, pitifully thin compared with the size of the rest of him,
                                                waved about helplessly as he looked. &quot;What's happened to me?&quot;
                                                he thought. It wasn't a dream.</div>
                                        </div>
                                        <div class="media mt-4">
                                            <div style="background-image: url({{asset("vendor/smart_shop_user/img/avatar-1.jpg")}})"
                                                class="media-object avatar mr-3"></div>
                                            <div class="media-body text-muted text-small"><strong class="text-gray">Tony
                                                    O'Brian: </strong>&nbsp; His room, a proper human room although a
                                                little too small, lay peacefully between its four familiar walls. A
                                                collection of textile samples lay spread out on the table.</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="list-group-item py-5">
                            <div class="media">
                                <div style="background-image: url({{asset("vendor/smart_shop_user/img/avatar-7.jpg")}})"
                                    class="media-object avatar avatar-md mr-3"></div>
                                <div class="media-body">
                                    <div class="media-heading"><small class="float-right text-muted">12 min</small>
                                        <h5>Nathan Andrews</h5>
                                    </div>
                                    <div class="text-small">Samsa was a travelling salesman - and above it there hung a
                                        picture that he had recently cut out of an illustrated magazine and housed in a
                                        nice, gilded frame.</div>
                                </div>
                            </div>
                        </div>
                        <div class="list-group-item py-5">
                            <div class="media">
                                <div style="background-image: url({{asset("vendor/smart_shop_user/img/avatar-7.jpg")}})"
                                    class="media-object avatar avatar-md mr-3"></div>
                                <div class="media-body">
                                    <div class="media-heading"><small class="float-right text-muted">34 min</small>
                                        <h5>Nathan Andrews</h5>
                                    </div>
                                    <div class="text-small">He must have tried it a hundred times, shut his eyes so that
                                        he wouldn't have to look at the floundering legs, and only stopped when he began
                                        to feel a mild, dull pain there that he had never felt before.</div>
                                    <div class="media-list">
                                        <div class="media mt-4">
                                            <div style="background-image: url({{asset("vendor/smart_shop_user/img/avatar-6.jpg")}})"
                                                class="media-object avatar mr-3"></div>
                                            <div class="media-body text-muted text-small"><strong
                                                    class="text-gray">Javier Gregory: </strong>&nbsp;One morning, when
                                                Gregor Samsa woke from troubled dreams, he found himself transformed in
                                                his bed into a horrible vermin. He lay on his armour-like back, and if
                                                he lifted his head a little he could see his brown belly, slightly domed
                                                and divided by arches into stiff sections</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@stop

@section('body_end_scripts')
<script src="{{asset('js/app.js')}}"></script>

<script>
    window.Echo.channel('rfid_scan')
        .listen('RFID', (e) => {
          window.location.href = "{{asset('s-shop/shopping/detail')}}/"+e.data;
        });

</script>

@endsection
