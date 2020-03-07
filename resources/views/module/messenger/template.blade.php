@extends('layouts.panel')

@section('content')
<div class="content">
    <div class="row">
        <p class="col-lg-2 text-center blockquote">
            <span class="">@yield('title')</span>
        </p>
    </div>
    <div class="row">
        <div class="col-lg-2">
            <p>
                <a href="{{ route(MODULE  . '.messenger.createTopic') }}" class="btn btn-primary btn-block">
                    {{ trans('global.new_message') }}
                </a>
            </p>
            <div class="list-group">
                <a href="{{ route(MODULE  . '.messenger.index') }}" class="list-group-item">
                    {{ trans('global.all_messages') }}
                </a>
                <a href="{{ route(MODULE  . '.messenger.showInbox') }}" class="list-group-item">
                    @if($unreads['inbox'] > 0)
                    <strong>
                        {{ trans('global.inbox') }}
                        ({{ $unreads['inbox'] }})
                    </strong>
                    @else
                    {{ trans('global.inbox') }}
                    @endif
                </a>
                <a href="{{ route(MODULE  . '.messenger.showOutbox') }}" class="list-group-item">
                    @if($unreads['outbox'] > 0)
                    <strong>
                        {{ trans('global.outbox') }}
                        ({{ $unreads['outbox'] }})
                    </strong>
                    @else
                    {{ trans('global.outbox') }}
                    @endif
                </a>
            </div>
        </div>
        <div class="col-lg-10">
            @yield('messenger-content')
        </div>
    </div>
</div>
@endsection
