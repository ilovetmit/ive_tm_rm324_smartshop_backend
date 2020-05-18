@extends('_layout.admin')
@section('content')
<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.transactionManagement.product_transaction.title') }}
    </div>
    <div class="card-body">
        <form method="POST"
            action="{{ route("TransactionManagement.ProductTransactions.update", [$productTransaction->id]) }}"
            enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <!-- -----------------------transaction_id----------------------- -->
            <div class="form-group">
                <label class="required" for="transaction_id">{{ trans('cruds.fields.transaction_id') }}</label>
                <select class="form-control select2 {{ $errors->has('transaction_id') ? 'is-invalid' : '' }}"
                    name="transaction_id" id="transaction_id" required>
                    <option value disabled
                        {{ old('transaction_id', $productTransaction->transaction_id) === null ? 'selected' : '' }}>
                        {{ trans('global.pleaseSelect') }}</option>
                    @foreach($transactions as $key => $transaction)
                    <option value="{{ $transaction->id }}"
                        {{ old('transaction_id', '') === (string) $key ? 'selected' : '' }}>
                        {{ $transaction->id . $transaction->header }}
                    </option>
                    @endforeach
                </select>
                @if($errors->has('transaction_id'))
                <span class="text-danger">{{ $errors->first('transaction_id') }}</span>
                @endif
                <span class="help-block"></span>
            </div>
            <!-- -----------------------product_id----------------------- -->
            <div class="form-group">
                <label class="required" for="product_id">{{ trans('cruds.fields.product_id') }}</label>
                <select class="form-control select2 {{ $errors->has('product_id') ? 'is-invalid' : '' }}"
                    name="product_id" id="product_id" required>
                    <option value disabled
                        {{ old('product_id', $productTransaction->product_id) === null ? 'selected' : '' }}>
                        {{ trans('global.pleaseSelect') }}</option>
                    @foreach($products as $key => $product)
                    <option value="{{ $product->id }}" {{ old('product_id', '') === (string) $key ? 'selected' : '' }}>
                        {{ $product->id . $product->name }}
                    </option>
                    @endforeach
                </select>
                @if($errors->has('product_id'))
                <span class="text-danger">{{ $errors->first('product_id') }}</span>
                @endif
                <span class="help-block"></span>
            </div>
            <!-- -----------------------quantity----------------------- -->
            <div class="form-group">
                <label class="required" for="quantity">{{ trans('cruds.fields.quantity') }}</label>
                <input class="form-control {{ $errors->has('quantity') ? 'is-invalid' : '' }}" type="number"
                    name="quantity" id="quantity" value="{{ old('quantity', $productTransaction->quantity) }}" required>
                @if($errors->has('quantity'))
                <span class="text-danger">{{ $errors->first('quantity') }}</span>
                @endif
                <span class="help-block"> </span>
            </div>
            <!-------------------------------------------------------------------------->
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
