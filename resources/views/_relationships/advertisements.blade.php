<div class="m-3">
    {{--
    @can('advertisement_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("AdvertisementManagement.ad.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.advertisementManagement.advertisement.title') }}
            </a>
        </div>
    </div>
    @endcan
    --}}
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
                                {{ trans('cruds.fields.image') }}
                            </th>
                            <th>
                                {{ trans('cruds.fields.description') }}
                            </th>
                            <th>
                                {{ trans('cruds.fields.status') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($ad as $key => $ad)
                        <tr data-entry-id="{{ $ad->id }}">
                            <td>

                            </td>
                            <!-- ----------------id---------------- -->
                            <td>
                                {{ $ad->id ?? '' }}
                            </td>
                            <!-- ----------------header---------------- -->
                            <td>
                                {{ $ad->header ?? '' }}
                            </td>
                            <!-- ----------------image---------------- -->
                            <td>
                                <img src="{{ asset('storage/ad/ad/'.$ad->image) }}" width="150px">
                            </td>
                            <!-- ----------------description---------------- -->
                            <td>
                                {{ $ad->description ?? '' }}
                            </td>
                            <!-- ----------------status---------------- -->
                            <td>
                                @include('_module.datatable.badge_tag.tag',[
                                'type' => config('constant.badge_type')[config('constant.advertisement_status')[$ad->status]],
                                'element' => config('constant.advertisement_status')[$ad->status] ?? '',
                                ])
                            </td>
                            <!-- ----------------action---------------- -->
                            <td>
                                @include('_module.datatable.action.index',[
                                'permission_subject' => 'advertisement',
                                'route_subject' => 'AdvertisementManagement.ad',
                                'id' => $ad->id
                                ])
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@section('scripts')
@parent
@include('_module.datatable.massdestory',[
'permission_massDestory' => '{{--advertisement_delete--}}',
'route' => route('AdvertisementManagement.ad.massDestroy'),
'pageLength' => 25,
'class' => 'datatable-Advertisement'
])
@endsection
