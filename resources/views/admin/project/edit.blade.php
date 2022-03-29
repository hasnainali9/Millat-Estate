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
{{ Form::open(['route' => ['admin.property.project.update', $project->slug], 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
    @csrf
    @method('PUT')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h4 class="header-title my-3">Update Project</h4>
                <div class="card-box">
                    <div class="form-group">
                        {{ Form::label('title', 'Title', ['class' => 'col-form-label']) }}
                        {{ Form::text('title', $project->title, ['class' => 'form-control', 'placeholder' => 'Title']) }}
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            {{ Form::label('state_id', 'State', ['class' => 'col-form-label']) }}
                            {{ Form::select('state_id', $states, $project->state_id, ['class' => 'form-control']) }}
                        </div>
                        <div class="form-group col-md-6">
                            {{ Form::label('city_id', 'City', ['class' => 'col-form-label']) }}
                            {{ Form::select('city_id', $cities, $project->city_id, ['class' => 'form-control']) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('address', 'Address', ['class' => 'col-form-label']) }}
                        {{ Form::text('address', $project->address, ['class' => 'form-control', 'placeholder' => 'Address']) }}
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            {{ Form::label('price_from', 'Price From', ['class' => 'col-form-label']) }}
                            {{ Form::number('price_from', $project->price_from, ['class' => 'form-control', 'placeholder' => 'Price From']) }}
                        </div>
                        <div class="form-group col-md-6">
                            {{ Form::label('price_to', 'Price To', ['class' => 'col-form-label']) }}
                            {{ Form::number('price_to', $project->price_to, ['class' => 'form-control', 'placeholder' => 'Price To']) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('details', 'Details', ['class' => 'col-form-label']) }}
                        {{ Form::textarea('details', $project->details, ['class' => 'form-control', 'id' => 'details']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('map_location', 'Map Location', ['class' => 'col-form-label']) }}
                        {{ Form::textarea('map_location', $project->map_location, ['class' => 'form-control', 'placeholder' => 'Map Location']) }}
                    </div>
                </div>
                <div class="card-box">
                    <div class="form-group">
                        {{ Form::label('images', 'Images', ['class' => 'col-form-label']) }}
                        {{ Form::file('images[]', ['class' => 'dropify', 'data-max-file-size' => '2M', 'multiple', 'data-default-file' => asset($project->images)]) }}
                    </div>
                </div>
                <div class="card-box">
                    <div class="row">
                        <div class="col-md-3 mt-4">
                            <div class="custom-control custom-switch">
                                {{ Form::checkbox('parking', true, $project->parking, ['class' => 'custom-control-input', 'id' => 'parking']) }}
                                {{ Form::label('parking', 'Parking', ['class' => 'custom-control-label']) }}
                            </div>
                        </div>
                        <div class="col-md-3 mt-4">
                            <div class="custom-control custom-switch">
                                {{ Form::checkbox('electricity', true, $project->electricity, ['class' => 'custom-control-input', 'id' => 'electricity']) }}
                                {{ Form::label('electricity', 'Electricity', ['class' => 'custom-control-label']) }}
                            </div>
                        </div>
                        <div class="col-md-3 mt-4">
                            <div class="custom-control custom-switch">
                                {{ Form::checkbox('water_supply', true, $project->water_supply, ['class' => 'custom-control-input', 'id' => 'water_supply']) }}
                                {{ Form::label('water_supply', 'Water Supply', ['class' => 'custom-control-label']) }}
                            </div>
                        </div>
                        <div class="col-md-3 mt-4">
                            <div class="custom-control custom-switch">
                                {{ Form::checkbox('sui_gas', true, $project->sui_gas, ['class' => 'custom-control-input', 'id' => 'sui_gas']) }}
                                {{ Form::label('sui_gas', 'Sui Gas', ['class' => 'custom-control-label']) }}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 mt-4">
                            <div class="custom-control custom-switch">
                                {{ Form::checkbox('mosque', true, $project->mosque, ['class' => 'custom-control-input', 'id' => 'mosque']) }}
                                {{ Form::label('mosque', 'Mosque', ['class' => 'custom-control-label']) }}
                            </div>
                        </div>
                        <div class="col-md-3 mt-4">
                            <div class="custom-control custom-switch">
                                {{ Form::checkbox('swimming_pool', true, $project->swimming_pool, ['class' => 'custom-control-input', 'id' => 'swimming_pool']) }}
                                {{ Form::label('swimming_pool', 'Swimming Pool', ['class' => 'custom-control-label']) }}
                            </div>
                        </div>
                        <div class="col-md-3 mt-4">
                            <div class="custom-control custom-switch">
                                {{ Form::checkbox('school', true, $project->school, ['class' => 'custom-control-input', 'id' => 'school']) }}
                                {{ Form::label('school', 'School', ['class' => 'custom-control-label']) }}
                            </div>
                        </div>
                        <div class="col-md-3 mt-4">
                            <div class="custom-control custom-switch">
                                {{ Form::checkbox('hospital', true, $project->hospital, ['class' => 'custom-control-input', 'id' => 'hospital']) }}
                                {{ Form::label('hospital', 'Hospital', ['class' => 'custom-control-label']) }}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 mt-4">
                            <div class="custom-control custom-switch">
                                {{ Form::checkbox('shopping_mall', true, $project->shopping_mall, ['class' => 'custom-control-input', 'id' => 'shopping_mall']) }}
                                {{ Form::label('shopping_mall', 'Shopping Mall', ['class' => 'custom-control-label']) }}
                            </div>
                        </div>
                        <div class="col-md-3 mt-4">
                            <div class="custom-control custom-switch">
                                {{ Form::checkbox('restaurant', true, $project->restaurant, ['class' => 'custom-control-input', 'id' => 'restaurant']) }}
                                {{ Form::label('restaurant', 'Restaurant', ['class' => 'custom-control-label']) }}
                            </div>
                        </div>
                        <div class="col-md-3 mt-4">
                            <div class="custom-control custom-switch">
                                {{ Form::checkbox('public_transport', true, $project->public_transport, ['class' => 'custom-control-input', 'id' => 'public_transport']) }}
                                {{ Form::label('public_transport', 'Public Transport', ['class' => 'custom-control-label']) }}
                            </div>
                        </div>
                        <div class="col-md-3 mt-4">
                            <div class="custom-control custom-switch">
                                {{ Form::checkbox('security', true, $project->security, ['class' => 'custom-control-input', 'id' => 'security']) }}
                                {{ Form::label('security', 'Security', ['class' => 'custom-control-label']) }}
                            </div>
                        </div>
                        <div class="col-md-3 mt-4">
                            <div class="custom-control custom-switch">
                                {{ Form::checkbox('is_active', true, $project->is_active, ['class' => 'custom-control-input', 'id' => 'is_active']) }}
                                {{ Form::label('is_active', 'Is Active', ['class' => 'custom-control-label']) }}
                            </div>
                        </div>
                    </div>
                </div>
                {{ Form::submit('Update Project', ['class' => 'btn btn-primary']) }}
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
