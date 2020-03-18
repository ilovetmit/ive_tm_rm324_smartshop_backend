@extends('layouts.admin')
@section('content')
@can('advertisement_create')
<div style="margin-bottom: 10px;" class="row">
    <div class="col-lg-12">
        <a class="btn btn-success" href="{{ route("AdvertisementManagement.ad.create") }}">
            {{ trans('global.add') }} {{ trans('cruds.advertisementManagement.advertisement.title') }}
        </a>
    </div>
</div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.advertisementManagement.advertisement.title') }} {{ trans('global.list') }}
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Advertisement">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.fields.header') }}
                        </th>
                        <th>
                            {{ trans('cruds.fields.status') }}
                        </th>
                        <th>
                            {{ trans('cruds.fields.tag') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($advertisements as $key => $advertisement)
                    <tr data-entry-id="{{ $advertisement->id }}">
                        <td>

                        </td>
                        <td>
                            {{ $advertisement->id ?? '' }}
                        </td>
                        <td>
                            {{ $advertisement->header ?? '' }}
                        </td>
                        <td>
                            @include('module.datatable.badge_tag.tag',[
                            'type' => $advertisement->status == 1 ? config('constant.advertisement_status')['tag_type_1'] : config('constant.advertisement_status')['tag_type_2'],
                            'element' => config('constant.advertisement_status')[$advertisement->status] ?? '',
                            ])
                        </td>
                        <td>
                            @foreach($advertisement->hasTag as $key => $item)
                            @include('module.datatable.badge_tag.tag',[
                            'type' => 'info',
                            'element' => $item->name,
                            ])
                            @endforeach
                        </td>
                        <td>
                            @include('module.datatable.action.index',[
                            'permission_subject' => 'advertisement',
                            'route_subject' => 'AdvertisementManagement.ad',
                            'id' => $advertisement->id
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
@include('module.datatable.massdestory',[
'permission_massDestory' => 'advertisement_delete',
'route' => route('AdvertisementManagement.ad.massDestroy'),
'pageLength' => 100,
'class' => 'datatable-Advertisement',
])
@endsection