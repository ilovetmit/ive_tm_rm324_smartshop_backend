@extends('layouts.admin')
@section('content')
@can('role_create')
<div style="margin-bottom: 10px;" class="row">
    <div class="col-lg-12">
        <a class="btn btn-success" href="{{ route("AdvertisementManagement.ad.create") }}">
            {{ trans('global.add') }} {{ trans('cruds.advertisementManagement.sub_title_1.title') }}
        </a>
    </div>
</div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.advertisementManagement.sub_title_1.title') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Advertisement">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.advertisementManagement.sub_title_1.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.advertisementManagement.sub_title_1.fields.header') }}
                        </th>
                        <th>
                            {{ trans('cruds.advertisementManagement.sub_title_1.fields.status') }}
                        </th>
                        <th>
                            {{ trans('cruds.advertisementManagement.sub_title_1.fields.tag') }}
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
                            @if($advertisement->status == 1)
                            @include('module.datatable.badge_tag.tag',[
                            'type' => 'success',
                            'element' => config('constant.advertisement_status')[$advertisement->status] ?? '',
                            ])
                            @else
                            @include('module.datatable.badge_tag.tag',[
                            'type' => 'warning',
                            'element' => config('constant.advertisement_status')[$advertisement->status] ?? '',
                            ])
                            @endif
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
                            'route_subject' => 'AdvertisementManagement.Advertisements',
                            'id' => $advertisement->id
                            ])
                        </td>
                        <td>
                            @can('advertisement_view')
                            <a class="btn btn-xs btn-primary" href="{{ route('AdvertisementManagement.ad.show', $advertisement->id ?? '' ) }}">
                                {{ trans('global.view') }}
                            </a>
                            @endcan

                            @can('advertisement_edit')
                            <a class="btn btn-xs btn-info" href="{{ route('AdvertisementManagement.ad.edit', $advertisement->id ?? '' ) }}">
                                {{ trans('global.edit') }}
                            </a>
                            @endcan

                            @can('advertisement_delete')
                            <form action="{{ route('AdvertisementManagement.ad.destroy', $advertisement->id ?? '' ) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
    'permission_massDestory'    => 'advertisement_delete',
    'route'                     => route('AdvertisementManagement.ad.massDestroy'),
    'pageLength'                => 100,
    'class'                     => 'datatable-Advertisement',
])
@endsection