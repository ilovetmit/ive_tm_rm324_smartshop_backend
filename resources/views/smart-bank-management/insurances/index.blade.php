@extends('layouts.admin')
@section('content')
@can('insurance_create')
<div style="margin-bottom: 10px;" class="row">
    <div class="col-lg-12">
        <a class="btn btn-success" href="{{ route("SmartBankManagement.Insurances.create") }}">
            {{ trans('global.add') }} {{ trans('cruds.smartBankManagement.sub_title_1.title') }}
        </a>
    </div>
</div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.smartBankManagement.sub_title_1.title') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Insurance">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.smartBankManagement.sub_title_1.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.smartBankManagement.sub_title_1.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.smartBankManagement.sub_title_1.fields.price') }}
                        </th>
                        <th>
                            {{ trans('cruds.smartBankManagement.sub_title_1.fields.image') }}
                        </th>
                        <th>
                            {{ trans('cruds.smartBankManagement.sub_title_1.fields.description') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($insurances as $key => $insurance)
                    <tr data-entry-id="{{ $insurance->id }}">
                        <td>

                        </td>
                        <td>
                            {{ $insurance->id ?? '' }}
                        </td>
                        <td>
                            {{ $insurance->name ?? '' }}
                        </td>
                        <td>
                            {{ $insurance->price ?? '' }}
                        </td>
                        <td>
                            {{ $insurance->image ?? '' }}
                        </td>
                        <td>
                            {{ $insurance->description ?? '' }}
                        </td>
                        <td>
                            @can('insurance_view')
                            <a class="btn btn-xs btn-primary" href="{{ route('SmartBankManagement.Insurances.show', $insurance->id) }}">
                                {{ trans('global.view') }}
                            </a>
                            @endcan

                            @can('insurance_edit')
                            <a class="btn btn-xs btn-info" href="{{ route('SmartBankManagement.Insurances.edit', $insurance->id) }}">
                                {{ trans('global.edit') }}
                            </a>
                            @endcan

                            @can('insurance_delete')
                            <form action="{{ route('SmartBankManagement.Insurances.destroy', $insurance->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
    'permission_massDestory'    => 'insurance_delete',
    'route'                     => route('SmartBankManagement.Insurances.massDestroy'),
    'pageLength'                => 25,
    'class'                     => 'datatable-Insurance'
])
@endsection