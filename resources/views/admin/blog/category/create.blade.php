@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <h4 class="header-title my-3">Create Category</h4>
                <div class="card-box">

                    {{ Form::open(['route' => 'admin.blog.category.store', 'method' => 'POST',  'class' => 'form-horizontal']) }}
                        @csrf
                        <div class="form-group">
                            {{ Form::label('name', 'Category Name') }}
                            {{ Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Enter Category Name']) }}
                        </div>
                        {{ Form::submit('Create', ['class' => 'btn btn-primary']) }}
                    {{ Form::close() }}

                </div>
            </div>
        </div>
    </div>
@endsection
