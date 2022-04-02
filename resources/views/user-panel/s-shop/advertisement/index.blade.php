{{-- Parent Layout --}}
@extends('_layout.user-panel.master.s_shop_layout')

@section('page_header','Advertisement')

{{-- Body Main Content --}}
@section('body_main_content')
<!-- Breadcrumb-->
<div class="container-fluid">
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Advertisement</li>
    </ul>
</div>
<section>
    <div class="container-fluid">
        <div class="row">
            <div class="card-columns">
                @foreach ($rows as $row)
                <div class="card">
                    <a href="{{asset('storage/ad/ad/' . $row->image)}}" data-lightbox="gallery" data-title="{{$row->title}}">
                        <img src="{{asset('storage/ad/ad/' . $row->image)}}" alt="{{$row->title}}" class="img-fluid">
                    </a>
                    <div class="card-body">
                        <h6 class="card-title mb-1">{{$row->title}}</h6>
                        <p class="card-text text-small text-muted">{{$row->description}}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@stop

{{-- Body End Scripts --}}
@section('body_end_scripts')
<!-- Lightbox gallery-->
<script src="{{asset("vendor/smart_shop_user/vendor/lightbox2/js/lightbox.min.js")}}"></script>
@stop