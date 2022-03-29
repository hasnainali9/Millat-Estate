@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card-box">
                    <h4>{{ $category->name }} <sup>( {{ $category->type }} )</sup></h4>
                </div>
            </div>
        </div>
    </div>
@endsection