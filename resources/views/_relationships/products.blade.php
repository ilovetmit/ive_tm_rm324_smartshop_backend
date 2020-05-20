<div class="m-3">
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.productManagement.product.title') }} {{ trans('global.list') }}
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-Product">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.fields.name') }}
                            </th>
                            <th>
                                {{ trans('cruds.fields.price') }}
                            </th>
                            <th>
                                {{ trans('cruds.fields.quantity') }}
                            </th>
                            <th>
                                {{ trans('cruds.fields.image') }}
                            </th>
                            <th>
                                {{ trans('cruds.fields.description') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $key => $product)
                        <tr data-entry-id="{{ $product->id }}">
                            <td>

                            </td>
                            <!-- ----------------id---------------- -->
                            <td>
                                {{ $product->id }}
                            </td>
                            <!-- ----------------name---------------- -->
                            <td>
                                {{ $product->name ?? '' }}
                            </td>
                            <!-- ----------------price---------------- -->
                            <td>
                                @include('_module.datatable.badge_tag.tag',[
                                'type' => 'info',
                                'element' => '$ '. $product->price ?? '',
                                ])
                            </td>
                            <!-- ----------------quantity & status---------------- -->
                            <td>
                                @include('_module.datatable.badge_tag.tag',[
                                'type' => $product->status == 1 ? config('constant.product_status')['tag_type_1'] :
                                config('constant.product_status')['tag_type_2'],
                                'element' => $product->quantity,
                                ])
                                @include('_module.datatable.badge_tag.tag',[
                                'type' => $product->status == 1 ? config('constant.product_status')['tag_type_1'] :
                                config('constant.product_status')['tag_type_2'],
                                'element' => config('constant.product_status')[$product->status] ?? '',
                                ])
                            </td>
                            <!-- ----------------image---------------- -->
                            <td>
                                <img src="{{ asset('storage/products/image/'.$product->image) }}" width="150px">
                            </td>
                            <!-- ----------------description---------------- -->
                            <td>
                                {{ $product->description }}
                            </td>
                            <!-- ----------------action---------------- -->
                            <td>
                                @include('_module.datatable.action.index',[
                                'permission_subject' => 'product',
                                'route_subject' => 'ProductManagement.Products',
                                'id' => $product->id
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
'permission_massDestory' => '',
'route' => route('ProductManagement.Products.massDestroy'),
'pageLength' => 25,
'class' => 'datatable-Product'
])
@endsection
