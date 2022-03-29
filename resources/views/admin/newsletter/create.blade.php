@extends('admin.layouts.app')

@section('style')
    <link href="{{ asset('backend/libs/dropify/dropify.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
{{ Form::open(['route' => 'admin.newsletter.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
    @csrf
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h4 class="header-title my-3">Create Newsletter</h4>
                <div class="card-box">
                    <div class="form-group">
                        {{ Form::label('email', 'Email', ['class' => 'col-form-label']) }}
                        {{ Form::email('email', '', ['class' => 'form-control', 'placeholder' => 'Email']) }}
                    </div>
                    {{ Form::submit('Create Newsletter', ['class' => 'btn btn-primary']) }}
                </div>
            </div>
        </div>
    </div>
{{ Form::close() }}
@endsection

@section('script')
    <script src="{{ asset('backend/libs/dropify/dropify.min.js') }}"></script>
    <script>
        // Dropify Image Upload
        $(".dropify").dropify({
            messages:{
                default:"Drag and drop a file here or click",
                replace:"Drag and drop or click to replace",
                remove:"Remove",
                error:"Ooops, something wrong appended."
            },
            error:{
                fileSize:"The file size is too big (1M max)."
            }
        });
        // Dropify Image Upload End
    </script>
@endsection
