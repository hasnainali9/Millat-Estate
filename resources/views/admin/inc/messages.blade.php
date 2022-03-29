@if (count($errors) > 0)
    @foreach ($errors->all() as $error)
    <div class="alert alert-danger" role="alert">
        <span>{{$error}}</span>
    </div>
    @endforeach
@endif

@if (session('error'))
    <div class="alert alert-danger" role="alert">
        <span>{{session('error')}}</span>
    </div>
@endif

@if (session('success'))
    <div class="alert alert-success" role="alert">
        <span>{{session('success')}}</span>
    </div>
@endif

@if (session('status'))
    <div class="alert alert-success" role="alert">
        <span>{{ session('status') }}</span>
    </div>
@endif
