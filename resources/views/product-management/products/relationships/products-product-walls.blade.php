<div class="m-3">
    @can('product_wall_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("ProductManagement.ProductWalls.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.productManagement.product_wall.title') }}
            </a>
        </div>
    </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.productManagement.product_wall.title') }} {{ trans('global.list') }}
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-products-Product-walls">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.fields.qrcode') }}
                            </th>
                            <th>
                                {{ trans('cruds.fields.product') }}
                            </th>
                            <th>
                                {{ trans('cruds.fields.message') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($productWalls as $key => $productWall)
                        <tr data-entry-id="{{ $productWall->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $productWall->id ?? '' }}
                            </td>
                            <td>
                                <img src="{{ asset('storage/productwalls/qrcode/'.$productWall->qrcode) }}" width="150px">
                            </td>
                            <td>
                                @include('module.datatable.badge_tag.tag_suffix',[
                                'type' => 'info',
                                'element' => $productWall->hasProduct->id ?? '',
                                'suffix' => $productWall->hasProduct->name ?? '',
                                ])
                            </td>
                            <td>
                                {{ $productWall->message ?? '' }}
                            </td>
                            <td>
                                @include('module.datatable.action.index',[
                                'permission_subject' => 'product_wall',
                                'route_subject' => 'ProductManagement.ProductWalls',
                                'id' => $productWall->id
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
@include('module.datatable.massdestory',[
'permission_massDestory' => 'product_wall_delete',
'route' => route('ProductManagement.ProductWalls.massDestroy'),
'pageLength' => 25,
'class' => 'datatable-products-Product-walls'
])
@endsection