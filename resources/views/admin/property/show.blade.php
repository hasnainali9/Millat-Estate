@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="row">
                @foreach (explode(',', $property->images) as $image)
                <div class="col-sm-6 col-md-3 p-2">
                    <img src="{{ asset($image) }}" alt="{{ $property->title }}" class="w-100 h-100">
                </div>
                @endforeach
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-box">
                    <h4>{{ $property->title }}</h4>
                    <div class="row">
                        <div class="col-md-12 col-sm-6 col-12"><span><strong>City :</strong> {{ $property->city_id }}</span> </div>
                        <div class="col-md-12 col-sm-6 col-12"><span><strong>State :</strong> {{ $property->state_id }}</span> </div>
                        <div class="col-md-12 col-sm-6 col-12"><span><strong>Address :</strong> {{ $property->address }}</span> </div>
                        <div class="col-md-12 col-sm-6 col-12"><span><strong>Price :</strong> {{ $property->price }}</span> </div>
                        <div class="col-md-12 col-sm-6 col-12"><span><strong>Bedrooms :</strong> {{ $property->bedrooms }}</span> </div>
                        <div class="col-md-12 col-sm-6 col-12"><span><strong>Bathrooms :</strong> {{ $property->bathrooms }}</span> </div>
                        <div class="col-md-12 col-sm-6 col-12"><span><strong>Kitchens :</strong> {{ $property->kitchens }}</span> </div>

                        <div class="col-12 mt-4">
                            <h4>Near By</h4>
                        </div>
                        <div class="col-md-12 col-sm-6 col-12"><span><strong>electricity :</strong> {{ $property->electricity }}</span> </div>
                        <div class="col-md-12 col-sm-6 col-12"><span><strong>water_supply :</strong> {{ $property->water_supply }}</span> </div>
                        <div class="col-md-12 col-sm-6 col-12"><span><strong>sui_gas :</strong> {{ $property->sui_gas }}</span> </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card-box">
                    {!! $property->details !!}
                </div>
            </div>
        </div>
    </div>
@endsection
