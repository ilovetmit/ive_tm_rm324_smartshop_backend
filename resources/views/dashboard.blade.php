@extends('layouts.admin')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-header">
                    Dashboard
                </div>
                <div class="card-body">
                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a class="btn btn-primary" href="{{route('ProductCheckout.index')}}" target="_blank">Product Checkout</a>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent

@endsection
