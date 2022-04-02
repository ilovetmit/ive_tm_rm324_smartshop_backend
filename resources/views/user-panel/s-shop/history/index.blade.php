{{-- Parent Layout --}}
@extends('_layout.user-panel.master.s_shop_layout')
@section('page_header','History')


{{-- Body Main Content --}}
@section('body_main_content')
<section class="no-padding-top">
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">History</li>
        </ul>
    </div>
    <div class="container-fluid">

        <div class="block-body">
            <div class="table-responsive">
                <table id="datatable1" style="width: 100%;" class="table">
                    <thead>
                        <tr>
                            <th>Date Time</th>
                            <th>Order ID</th>
                            <th>Transaction Header</th>
                            <th>Product</th>
                            <th>Total Price</th>
                        </tr>
                    </thead>
                    <tbody>
                    {{--$rows--}}
                        @foreach ($rows as $row)
                        <tr>
                            <td>{{$row->created_at}}</td>
                            <td>{{$row->id}}</td>
                            <td>{{$row->header}}</td>
                            <td>{{$row->name}}</td>
                            <td>{{"$ ".$row->amount}}
                                <span class="ml-3">{!!
                                    config('variables.money_type.'.$row->amount)
                                    !!}</span></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</section>
@endsection

{{-- Body End Scripts --}}
@section('body_end_scripts')
<script src="{{asset("vendor/smart_shop_user/js/tables-datatable.js")}}"></script>
@stop
