@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.productManagement.product_wall.title') }}
    </div>
    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('ProductManagement.ProductWalls.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.fields.id') }}
                        </th>
                        <td>
                            {{ $productWall->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fields.qrcode') }}
                        </th>
                        <td>
                            <img src="{{ asset('storage/productwalls/qrcode/'.$productWall->qrcode) }}" width="150px">
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fields.product_id') }}
                        </th>
                        <td>
                            @include('module.datatable.badge_tag.tag',[
                            'type' => 'info',
                            'element' => $productWall->hasProduct->id . ". " . $productWall->hasProduct->name ?? '',
                            ])
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fields.message') }}
                        </th>
                        <td>
                            {{ $productWall->message }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('ProductManagement.ProductWalls.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection