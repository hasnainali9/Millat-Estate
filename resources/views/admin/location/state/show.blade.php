@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card-box">
                    <h4>{{ $state->name }}</h4>
                    <img src="{{ asset($state->image) }}" alt="{{ $state->name }}" class="w-100">
                </div>
            </div>
        </div>
    </div>
@endsection