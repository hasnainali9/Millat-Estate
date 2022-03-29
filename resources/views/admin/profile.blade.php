@extends('admin.layouts.app')

@section('content')
{{ Form::open(['route' => ['admin.profile.update', Auth::guard('admin')->id()], 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
    @csrf
    {{ Form::hidden('_method', 'PUT') }}
    <div class="container-fluid mb-5">
        <div class="row">
            <div class="col-md-12">
                <h4 class="header-title my-3">Update Password</h4>

                <div class="card-box">
                    <div class="form-group">
                        {{ Form::label('name', 'Name', ['class' => 'col-form-label']) }}
                        {{ Form::text('name', $admin->name, ['class' => 'form-control']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('email', 'Email', ['class' => 'col-form-label']) }}
                        {{ Form::email('email', $admin->email, ['class' => 'form-control']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('old_password', 'Old Password', ['class' => 'col-form-label']) }}
                        {{ Form::password('old_password', ['class' => 'form-control']) }}
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            {{ Form::label('password', 'New Password', ['class' => 'col-form-label']) }}
                            {{ Form::password('password', ['class' => 'form-control']) }}
                        </div>
                        <div class="form-group col-md-6">
                            {{ Form::label('password_confirmation', 'Confirm Password', ['class' => 'col-form-label']) }}
                            {{ Form::password('password_confirmation', ['class' => 'form-control']) }}
                        </div>
                    </div>
                    {{ Form::submit('Update', ['class' => 'btn btn-primary']) }}
                </div>

            </div>
        </div>
    </div>
{{ Form::close() }}
@endsection
