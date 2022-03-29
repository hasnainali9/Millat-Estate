@extends('admin.layouts.app')

@section('style')
    <link href="{{ asset('backend/libs/dropify/dropify.min.css') }}" rel="stylesheet" type="text/css" />
    <style>
        .ck-editor__editable_inline {
            min-height: 250px;
        }
    </style>
@endsection

@section('content')
{{ Form::open(['route' => 'admin.properties.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
    @csrf
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h4 class="header-title my-3">Create Property</h4>
                <div class="card-box">
                    <div class="form-group">
                        {{ Form::label('title', 'Title', ['class' => 'col-form-label']) }}
                        {{ Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title']) }}
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            {{ Form::label('state_id', 'State', ['class' => 'col-form-label']) }}
                            {{ Form::select('state_id', $states, '', ['class' => 'form-control']) }}
                        </div>
                        <div class="form-group col-md-6">
                            {{ Form::label('city_id', 'City', ['class' => 'col-form-label']) }}
                            {{ Form::select('city_id', $cities, '', ['class' => 'form-control']) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('address', 'Address', ['class' => 'col-form-label']) }}
                        {{ Form::text('address', '', ['class' => 'form-control', 'placeholder' => 'Address']) }}
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            {{ Form::label('area', 'Area', ['class' => 'col-form-label']) }}
                            {{ Form::text('area', '', ['class' => 'form-control', 'placeholder' => 'Area']) }}
                        </div>
                        <div class="form-group col-md-4">
                            {{ Form::label('area_type', 'Area Type', ['class' => 'col-form-label']) }}
                            {{ Form::select('area_type', ['marla' => 'Marla', 'kanal' => 'Kanal', 'acre' => 'Acre', 'square_feet' => 'Square Feet'], '', ['class' => 'form-control']) }}
                        </div>
                        <div class="form-group col-md-4">
                            {{ Form::label('price', 'Price', ['class' => 'col-form-label']) }}
                            {{ Form::number('price', '', ['class' => 'form-control', 'placeholder' => 'Price']) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('details', 'Details', ['class' => 'col-form-label']) }}
                        {{ Form::textarea('details', '', ['class' => 'form-control', 'id' => 'details']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('map_location', 'Map Location', ['class' => 'col-form-label']) }}
                        {{ Form::textarea('map_location', '', ['class' => 'form-control', 'placeholder' => 'Map Location']) }}
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            {{ Form::label('purpose', 'Purpose', ['class' => 'col-form-label']) }}
                            {{ Form::select('purpose', ['sell' => 'Sell', 'rent' => 'Rent'], '', ['class' => 'form-control']) }}
                        </div>
                        <div class="form-group col-md-6">
                            {{ Form::label('category_id', 'Category', ['class' => 'col-form-label']) }}
                            {{ Form::select('category_id', $categories, '', ['class' => 'form-control']) }}
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            {{ Form::label('bedrooms', 'Bedrooms', ['class' => 'col-form-label']) }}
                            {{ Form::number('bedrooms', '', ['class' => 'form-control', 'placeholder' => 'Bedrooms']) }}
                        </div>
                        <div class="form-group col-md-4">
                            {{ Form::label('bathrooms', 'Bathrooms', ['class' => 'col-form-label']) }}
                            {{ Form::number('bathrooms', '', ['class' => 'form-control', 'placeholder' => 'Bathrooms']) }}
                        </div>
                        <div class="form-group col-md-4">
                            {{ Form::label('kitchens', 'Kitchens', ['class' => 'col-form-label']) }}
                            {{ Form::number('kitchens', '', ['class' => 'form-control', 'placeholder' => 'Kitchens']) }}
                        </div>
                    </div>
                </div>
                <div class="card-box">
                    <div class="form-group">
                        {{ Form::label('images', 'Images', ['class' => 'col-form-label']) }}
                        {{ Form::file('images[]', ['class' => 'dropify', 'data-max-file-size' => '2M', 'multiple']) }}
                    </div>
                </div>
                <div class="card-box">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="custom-control custom-switch">
                                {{ Form::checkbox('electricity', true, false, ['class' => 'custom-control-input', 'id' => 'electricity']) }}
                                {{ Form::label('electricity', 'Electricity', ['class' => 'custom-control-label']) }}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="custom-control custom-switch">
                                {{ Form::checkbox('water_supply', true, false, ['class' => 'custom-control-input', 'id' => 'water_supply']) }}
                                {{ Form::label('water_supply', 'Water Supply', ['class' => 'custom-control-label']) }}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="custom-control custom-switch">
                                {{ Form::checkbox('sui_gas', true, false, ['class' => 'custom-control-input', 'id' => 'sui_gas']) }}
                                {{ Form::label('sui_gas', 'Sui Gas', ['class' => 'custom-control-label']) }}
                            </div>
                        </div>
                    </div>
                </div>
                {{ Form::submit('Create Project', ['class' => 'btn btn-primary']) }}
            </div>
        </div>
    </div>
{{ Form::close() }}
@endsection

@section('script')
    <script src="{{ asset('backend/libs/dropify/dropify.min.js') }}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/28.0.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#details' ), {
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
