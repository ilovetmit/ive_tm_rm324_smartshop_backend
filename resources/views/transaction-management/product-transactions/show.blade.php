@extends('_layout.admin')
@section('content')
<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.transactionManagement.product_transaction.title') }}
    </div>
    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('TransactionManagement.ProductTransactions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <!------------------------transaction_id------------------------>
                    <tr>
                        <th>
                            {{ trans('cruds.fields.transaction_id') }}
                        </th>
                        <td>
                            {{-- $productTransaction->transaction_id ?? '' --}}
                            @include('_module.datatable.badge_tag.tag',[
                            'type' => config('constant.badge_type')['header'],
                            'element' => $productTransaction->hasTransaction->id . ". " .
                            $productTransaction->hasTransaction->header . "." ?? '',
                            ])
                        </td>
                    </tr>
                    <!------------------------product_id------------------------>
                    <tr>
                        <th>
                            {{ trans('cruds.fields.product_id') }}
                        </th>
                        <td>
                            {{-- $productTransaction->product_id ?? '' --}}
                            @include('_module.datatable.badge_tag.tag',[
                            'type' => config('constant.badge_type')['name'],
                            'element' => $productTransaction->hasProduct->id . ". " .
                            $productTransaction->hasProduct->name ?? '',
                            ])
                        </td>
                    </tr>
                    <!------------------------quantity------------------------>
                    <tr>
                        <th>
                            {{ trans('cruds.fields.quantity') }}
                        </th>
                        <td>
                            {{ $productTransaction->quantity ?? '' }}
                        </td>
                    </tr>
                    <!------------------------shop_type------------------------>
                    <tr>
                        <th>
                            {{ trans('cruds.fields.shop_type') }}
                        </th>
                        <td>
                            @include('_module.datatable.badge_tag.tag',[
                            'type' => config('constant.badge_type')[config('constant.shop_type')[$productTransaction->shop_type]],
                            'element' => config('constant.shop_type')[$productTransaction->shop_type],
                            ])
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('TransactionManagement.ProductTransactions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection