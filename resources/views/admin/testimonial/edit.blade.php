@extends('admin.layouts.app')

@section('style')
    <link href="{{ asset('backend/libs/dropify/dropify.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
{{ Form::open(['route' => ['admin.testimonial.update', $testimonial->slug], 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'testimonial']) }}
    @csrf
    {{ Form::hidden('_method', 'PUT') }}
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <h4 class="header-title my-3">Update Testimonial</h4>
                <div class="card-box">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            {{ Form::label('name', 'Name', ['class' => 'col-form-label']) }}
                            {{ Form::text('name', $testimonial->name, ['class' => 'form-control', 'placeholder' => 'Name']) }}
                        </div>
                        <div class="form-group col-md-6">
                            {{ Form::label('rating', 'Rating', ['class' => 'col-form-label']) }}
                            {{ Form::number('rating', $testimonial->rating, ['class' => 'form-control', 'placeholder' => 'Rating', 'min' => 0, 'max' => 5]) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('review', 'Review', ['class' => 'col-form-label']) }}
                        {{ Form::textarea('review', $testimonial->review, ['class' => 'form-control', 'placeholder' => 'Review']) }}
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <h4 class="header-title my-3">Image</h4>
                <div class="card-box text-right d-none d-sm-none d-md-block">
                    {{ Form::submit('Update Testimonial', ['class' => 'btn btn-primary btn-block']) }}
                </div>
                <div class="card-box">
                    <div class="form-group">
                        {{ Form::label('image', 'Image', ['class' => 'col-form-label']) }}
                        {{ Form::file('image', ['class' => 'dropify', 'data-max-file-size' => '2M', 'data-default-file' => asset($testimonial->image)]) }}
                    </div>
                </div>
                <div class="card-box">
                    <div class="custom-control custom-switch">
                        {{ Form::checkbox('is_active', true, $testimonial->is_active, ['class' => 'custom-control-input', 'id' => 'is_active']) }}
                        {{ Form::label('is_active', 'Is Active', ['class' => 'custom-control-label']) }}
                    </div>
                </div>
                <div class="card-box text-right d-block d-sm-block d-md-none">
                    {{ Form::submit('Update Testimonial', ['class' => 'btn btn-primary btn-block']) }}
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
