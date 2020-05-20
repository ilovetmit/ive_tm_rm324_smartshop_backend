@extends('_layout.admin')
@section('content')
@can('led_create')
<div style="margin-bottom: 10px;" class="row">
    <div class="col-lg-12">
        <a class="btn btn-success" href="{{ route("ProductManagement.LEDs.create") }}">
            {{ trans('global.add') }} {{ trans('cruds.productManagement.led.title') }}
        </a>
    </div>
</div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.productManagement.led.title') }} {{ trans('global.list') }}
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-LED">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.fields.shop_product_id') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($leds as $key => $led)
                    <tr data-entry-id="{{ $led->id }}">
                        <td>

                        </td>
                        <td>
                            {{ $led->id ?? '' }}
                        </td>
                        <td>
                            @include('_module.datatable.badge_tag.tag',[
                            'type' => config('constant.badge_type')['name'],
                            'element' => $led->hasShopProduct->hasProduct->id . ". " .
                            $led->hasShopProduct->hasProduct->name ?? '',
                            ])
                        </td>
                        <td>
                            @include('_module.datatable.action.index',[
                            'permission_subject' => 'led',
                            'route_subject' => 'ProductManagement.LEDs',
                            'id' => $led->id
                            ])
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
@include('_module.datatable.massdestory',[
'permission_massDestory' => 'led_delete',
'route' => route('ProductManagement.LEDs.massDestroy'),
'pageLength' => 25,
'class' => 'datatable-LED'
])
@endsection