@extends('admin.layouts.app')

@section('style')
    <link href="{{ asset('backend/libs/dropify/dropify.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
{{ Form::open(['route' => ['admin.settings.update', $settings->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
    @csrf
    {{ Form::hidden('_method', 'PUT') }}

    <div class="container-fluid mb-5">
        <div class="row">
            <div class="col-md-12">
                <h4 class="header-title my-3">Update Settings</h4>

                <div class="form-row">
                    <div class="col-md-6">
                        <div class="card-box">
                            <div class="form-group">
                                {{ Form::label('admin_logo', 'Admin Logo', ['class' => 'col-form-label']) }}
                                {{ Form::file('admin_logo', ['class' => 'dropify', 'data-max-file-size' => '2M', 'data-default-file' => asset($settings->admin_logo), 'accept' => '.jpg,.jpeg,.png']) }}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card-box">
                            <div class="form-group">
                                {{ Form::label('admin_favicon', 'Admin favicon', ['class' => 'col-form-label']) }}
                                {{ Form::file('admin_favicon', ['class' => 'dropify', 'data-max-file-size' => '2M', 'data-default-file' => asset($settings->admin_favicon), 'accept' => '.jpg,.jpeg,.png']) }}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card-box">
                            <div class="form-group">
                                {{ Form::label('site_logo_light', 'Site Logo Light', ['class' => 'col-form-label']) }}
                                {{ Form::file('site_logo_light', ['class' => 'dropify', 'data-max-file-size' => '2M', 'data-default-file' => asset($settings->site_logo_light), 'accept' => '.jpg,.jpeg,.png']) }}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card-box">
                            <div class="form-group">
                                {{ Form::label('site_logo_dark', 'Site Logo Dark', ['class' => 'col-form-label']) }}
                                {{ Form::file('site_logo_dark', ['class' => 'dropify', 'data-max-file-size' => '2M', 'data-default-file' => asset($settings->site_logo_dark), 'accept' => '.jpg,.jpeg,.png']) }}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card-box">
                            <div class="form-group">
                                {{ Form::label('site_favicon', 'Site Favicon', ['class' => 'col-form-label']) }}
                                {{ Form::file('site_favicon', ['class' => 'dropify', 'data-max-file-size' => '2M', 'data-default-file' => asset($settings->site_favicon), 'accept' => '.jpg,.jpeg,.png']) }}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-box">
                    <div class="form-group">
                        {{ Form::label('site_banner_video', 'Site Banner Image', ['class' => 'col-form-label']) }}
                        {{ Form::file('site_banner_video', ['class' => 'dropify', 'data-max-file-size' => '20M', 'data-default-file' => asset($settings->site_banner_video), 'accept' => '.jpg,.jpeg,.png']) }}
                    </div>
                </div>

                <div class="card-box">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            {{ Form::label('site_title', 'Site Title', ['class' => 'col-form-label']) }}
                            {{ Form::text('site_title', $settings->site_title, ['class' => 'form-control', 'placeholder' => 'Site Title']) }}
                        </div>
                        <div class="form-group col-md-6">
                            {{ Form::label('seo_title', 'SEO Title', ['class' => 'col-form-label']) }}
                            {{ Form::text('seo_title', $settings->seo_title, ['class' => 'form-control', 'placeholder' => 'SEO Title']) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('seo_description', 'SEO Description', ['class' => 'col-form-label']) }}
                        {{ Form::text('seo_description', $settings->seo_description, ['class' => 'form-control', 'placeholder' => 'SEO Description']) }}
                    </div>
                </div>


                <div class="my-4">
                    <div class="custom-control custom-switch">
                        {{ Form::checkbox('preloader', true, $settings->preloader, ['class' => 'custom-control-input', 'id' => 'preloader']) }}
                        {{ Form::label('preloader', 'Pre Loader', ['class' => 'custom-control-label']) }}
                    </div>
                </div>
                {{ Form::submit('Update Settings', ['class' => 'btn btn-primary']) }}
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
