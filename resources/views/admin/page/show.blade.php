@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <img src="{{ asset($page->image) }}" alt="{{ $page->title }}" class="w-100">
            </div>
            <div class="col-md-8">
                <div class="card-box">
                    <h4>{{ $page->title }}</h4>
                    {!! $page->description !!}
                </div>
            </div>
        </div>
    </div>
@endsection