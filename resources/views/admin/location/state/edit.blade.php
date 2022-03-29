@extends('admin.layouts.app')

@section('style')
    <link href="{{ asset('backend/libs/dropify/dropify.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
{{ Form::open(['route' => ['admin.locations.state.update', $state->slug], 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'state']) }}
    @csrf
    {{ Form::hidden('_method', 'PUT') }}
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h4 class="header-title my-3">Update State</h4>
                <div class="card-box">
                    <div class="form-group">
                        {{ Form::label('name', 'Name', ['class' => 'col-form-label']) }}
                        {{ Form::text('name', $state->name, ['class' => 'form-control', 'placeholder' => 'Name']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('image', 'Image', ['class' => 'col-form-label']) }}
                        {{ Form::file('image', ['class' => 'dropify', 'data-max-file-size' => '2M', 'data-default-file' => asset($state->image)]) }}
                    </div>
                    <div class="fomr-group my-4">
                        <div class="custom-control custom-switch">
                            {{ Form::checkbox('is_active', true, $state->is_active, ['class' => 'custom-control-input', 'id' => 'is_active']) }}
                            {{ Form::label('is_active', 'Is Active', ['class' => 'custom-control-label']) }}
                        </div>
                    </div>
                    {{ Form::submit('Update State', ['class' => 'btn btn-primary']) }}
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
