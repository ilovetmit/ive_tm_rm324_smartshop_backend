<div class="m-3">
    @can('shop_product_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("ProductManagement.ShopProducts.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.productManagement.sub_title_1.title') }}
            </a>
        </div>
    </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.productManagement.sub_title_1.title') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-shopProductInventory-ShopProduct">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.fields.product') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($shopProducts as $key => $shopProduct)
                        <tr data-entry-id="{{ $shopProduct->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $shopProduct->id ?? '' }}
                            </td>
                            <td>
                                @include('module.datatable.badge_tag.tag_suffix',[
                                'type' => 'info',
                                'element' => $shopProduct->hasProduct->id ?? '',
                                'suffix' => $shopProduct->hasProduct->name ?? '',
                                ])
                            </td>
                            <td>
                                @include('module.datatable.action.index',[
                                'permission_subject' => 'shop_product',
                                'route_subject' => 'ProductManagement.ShopProducts',
                                'id' => $shopProduct->id
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
'permission_massDestory' => 'shop_product_delete',
'route' => route('ProductManagement.ShopProducts.massDestroy'),
'pageLength' => 25,
'class' => 'datatable-shopProductInventory-ShopProduct'
])
@endsection