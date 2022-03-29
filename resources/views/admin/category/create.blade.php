@extends('admin.layouts.app')

@section('content')
{{ Form::open(['route' => 'admin.property.category.store', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'state']) }}
    @csrf
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h4 class="header-title my-3">Create State</h4>
                <div class="card-box">
                    <div class="form-group">
                        {{ Form::label('name', 'Name', ['class' => 'col-form-label']) }}
                        {{ Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Name']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('type', 'Type', ['class' => 'col-form-label']) }}
                        {{ Form::select('type', ['home' => 'Home', 'plots' => 'Plots', 'commercial' => 'Commercial'], null, ['class' => 'form-control']) }}
                    </div>
                    {{ Form::submit('Create State', ['class' => 'btn btn-primary']) }}
                </div>
            </div>
        </div>
    </div>
{{ Form::close() }}
@endsection
