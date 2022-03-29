@extends('admin.layouts.app')

@section('style')
    <link href="{{ asset('backend/libs/bootstrap-tagsinput/bootstrap-tagsinput.css') }}" rel="stylesheet" />
    <link href="{{ asset('backend/libs/dropify/dropify.min.css') }}" rel="stylesheet" type="text/css" />
    <style>
        .ck-editor__editable_inline {
            min-height: 250px;
        }
    </style>
@endsection

@section('content')
{{ Form::open(['route' => ['admin.blog.post.update', $post->slug], 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'post']) }}
    @csrf
    {{ Form::hidden('_method', 'PUT') }}
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <h4 class="header-title my-3">Create Post</h4>
                <div class="card-box">
                    <div class="form-group">
                        {{ Form::label('title', 'Title', ['class' => 'col-form-label']) }}
                        {{ Form::text('title', $post->title, ['class' => 'form-control', 'placeholder' => 'Title']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('category_id', 'Category', ['class' => 'col-form-label']) }}
                        {{ Form::select('category_id', $categories, $post->category_id, ['class' => 'form-control']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('description', 'Description', ['class' => 'col-form-label']) }}
                        {{ Form::textarea('description', $post->description, ['class' => 'form-control', 'id' => 'description']) }}
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <h4 class="header-title my-3">Image And Tags</h4>
                <div class="card-box text-right d-none d-sm-none d-md-block">
                    {{ Form::submit('Update Post', ['class' => 'btn btn-primary btn-block']) }}
                </div>
                <div class="card-box">
                    <div class="form-group">
                        {{ Form::label('image', 'Image', ['class' => 'col-form-label']) }}
                        {{ Form::file('image', ['class' => 'dropify', 'data-max-file-size' => '2M', 'data-default-file' => asset($post->image)]) }}
                    </div>
                </div>
                <div class="card-box">
                    <div class="tags-default form-group">
                        {{ Form::label('tags', 'Tags', ['class' => 'col-form-label']) }}
                        {{ Form::text('tags', $post->tags, ['class' => 'form-control', 'placeholder' => 'Add Tags', 'data-role' => 'tagsinput' ]) }}
                    </div>
                </div>
                <div class="card-box">

                    <div class="custom-control custom-switch">
                        {{ Form::checkbox('is_active', true, $post->is_active, ['class' => 'custom-control-input', 'id' => 'is_active']) }}
                        {{ Form::label('is_active', 'Is Active', ['class' => 'custom-control-label']) }}
                    </div>
                </div>
                <div class="card-box text-right d-block d-sm-block d-md-none">
                    {{ Form::submit('Update Post', ['class' => 'btn btn-primary btn-block']) }}
                </div>
            </div>
        </div>
    </div>
{{ Form::close() }}
@endsection

@section('script')
    <script src="{{ asset('backend/libs/bootstrap-tagsinput/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset('backend/libs/dropify/dropify.min.js') }}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/28.0.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#description' ), {
                toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', '|', 'insertTable', 'MediaEmbed', '|', 'undo', 'redo' ],
            } )
            .catch( error => {
                console.error( error );
            } );
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
