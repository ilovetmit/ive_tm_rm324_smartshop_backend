@extends('layouts.admin')
@section('content')
@can('led_create')
<div style="margin-bottom: 10px;" class="row">
    <div class="col-lg-12">
        <a class="btn btn-success" href="{{ route("ProductManagement.LEDs.create") }}">
            {{ trans('global.add') }} {{ trans('cruds.productManagement.sub_title_5.title') }}
        </a>
    </div>
</div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.productManagement.sub_title_5.title') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-LED">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.productManagement.sub_title_5.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.productManagement.sub_title_5.fields.shop_product_id') }}
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
                            {{ $led->shop_product_id ?? '' }}
                        </td>
                        <td>
                            @can('led_view')
                            <a class="btn btn-xs btn-primary" href="{{ route('ProductManagement.LEDs.show', $led->id) }}">
                                {{ trans('global.view') }}
                            </a>
                            @endcan

                            @can('led_edit')
                            <a class="btn btn-xs btn-info" href="{{ route('ProductManagement.LEDs.edit', $led->id) }}">
                                {{ trans('global.edit') }}
                            </a>
                            @endcan

                            @can('led_delete')
                            <form action="{{ route('ProductManagement.LEDs.destroy', $led->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                            </form>
                            @endcan

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
@include('module.datatable.massdestory',[
    'permission_massDestory'    => 'led_delete',
    'route'                     => route('ProductManagement.LEDs.massDestroy'),
    'pageLength'                => 25,
    'class'                     => 'datatable-LED'
])
@endsection