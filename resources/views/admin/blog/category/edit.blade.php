@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <h4 class="header-title my-3">Update Category</h4>
                <div class="card-box">

                    {{ Form::open(['route' => ['admin.blog.category.update', $category->slug], 'method' => 'POST',  'class' => 'form-horizontal']) }}
                        @csrf
                        {{ Form::hidden('_method', 'PUT') }}
                        <div class="form-group">
                            {{ Form::label('name', 'Category Name') }}
                            {{ Form::text('name', $category->name, ['class' => 'form-control', 'placeholder' => 'Enter Category Name']) }}
                        </div>
                        <div class="custom-control custom-switch">
                            {{ Form::checkbox('is_active', true, $category->is_active, ['class' => 'custom-control-input', 'id' => 'is_active']) }}
                            {{ Form::label('is_active', 'Is Active', ['class' => 'custom-control-label']) }}
                        </div>
                        {{ Form::submit('Update', ['class' => 'btn btn-primary mt-3']) }}
                    {{ Form::close() }}

                </div>
            </div>
        </div>
    </div>
@endsection
