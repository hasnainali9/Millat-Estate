@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card-box">
                    <h4>{{ $city->name }}</h4>
                    <img src="{{ asset($city->image) }}" alt="{{ $city->name }}" class="w-100">
                </div>
            </div>
        </div>
    </div>
@endsection