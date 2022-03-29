@extends('admin.layouts.app')

@section('style')
    <link href="{{ asset('backend/libs/dropify/dropify.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
{{ Form::open(['route' => ['admin.property.category.update', $category->slug], 'method' => 'POST']) }}
    @csrf
    {{ Form::hidden('_method', 'PUT') }}
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h4 class="header-title my-3">Update Category</h4>
                <div class="card-box">
                    <div class="form-group">
                        {{ Form::label('name', 'Name', ['class' => 'col-form-label']) }}
                        {{ Form::text('name', $category->name, ['class' => 'form-control', 'placeholder' => 'Name']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('type', 'Type', ['class' => 'col-form-label']) }}
                        {{ Form::select('type', ['home' => 'Home', 'plots' => 'Plots', 'commercial' => 'Commercial'], $category->type, ['class' => 'form-control']) }}
                    </div>
                    <div class="fomr-group my-4">
                        <div class="custom-control custom-switch">
                            {{ Form::checkbox('is_active', true, $category->is_active, ['class' => 'custom-control-input', 'id' => 'is_active']) }}
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
