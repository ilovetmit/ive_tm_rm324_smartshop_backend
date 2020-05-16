@if(session()->has('message'))
    <div class="alert alert-success" role="alert">
        {{session()->get('message')}}
    </div>
@endif
@if(session()->has('fail'))
    <div class="alert alert-danger" role="alert">
        {{session()->get('fail')}}
    </div>
@endif
@if(count($errors)>0)
    <div class="alert alert-danger" role="alert">
        <strong>Validation error!</strong><br/>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif