{{-- Parent Layout --}}
@extends('_layout.user-panel.master.s_shop_layout')
@section('page_header','Shopping')


{{-- Body Main Content --}}
@section('body_main_content')
<section>
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Shopping</li>
        </ul>
    </div>
    <div class="pl-3 pr-3">
        <div class="row">
            <div class="card-columns">
                @foreach ($rows as $row)
                <div class="card">
                    <a href="{{ route('sshop.shopping.detail',$row->id) }}" data-lightbox="gallery"
                        data-title="{{$row->name}}">
                        <img src="{{asset($row->url)}}" alt="{{$row->name}}" class="img-fluid">
                    </a>
                    <div class="card-body">
                        <h4 class="card-title mb-1">{{$row->name}}</h4>
                        <p class="card-text text-small text-muted">{{$row->description}}</p>
                        <h4 class="card-title mb-1 text-light">HKD {{$row->price}} <span class="ml-3">{!!
                                config('variables.product_type.'.$row->category) !!}</span>
                            @if($sorted && "'$row->category'" == $sorted)
                            <span class="ml-1 badge badge-secondary">Recommand</span>
                            @endif
                        </h4>
                        <a class="btn btn-primary mt-3" href="{{ route('sshop.shopping.detail',$row->id) }}">Detail</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@stop

@section('body_end')
<div class="modal fade" id="product" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Buy Product
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <img width="300"
                        src="https://chart.apis.google.com/chart?cht=qr&chs=300x300&chld=L|0&chl=akshdkjajhdksahslkdhdlksdydiudysiusydaiosydaoiuysaoiydasoiusydsaoidyduisadasdasdaadsaadd1ad3sads4d6sadsad45dsadddsa/,sad/sadsad/.,sadd,.y">
                </div>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-secondary" data-dismiss="modal">
                    Close
                </a>
            </div>
        </div>
    </div>
</div>
@stop
