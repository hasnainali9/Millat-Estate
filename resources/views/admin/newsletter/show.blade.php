@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <img src="{{ asset($testimonial->image) }}" alt="{{ $testimonial->name }}" class="w-100">
            </div>
            <div class="col-md-8">
                <div class="card-box">
                    <h4>{{ $testimonial->name }}</h4>
                    {!! $testimonial->review !!} <br>
                    <strong>{!! $testimonial->rating !!} Star Rating</strong>
                </div>
            </div>
        </div>
    </div>
@endsection