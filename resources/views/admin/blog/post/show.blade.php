@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <img src="{{ asset($post->image) }}" alt="{{ $post->title }}" class="w-100">
            </div>
            <div class="col-md-8">
                <div class="card-box">
                    <h4>{{ $post->title }}</h4>
                    {!! $post->description !!}
                </div>
            </div>
        </div>
    </div>
@endsection