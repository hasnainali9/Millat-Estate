@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="row">
                @foreach (explode(',', $project->images) as $image)
                <div class="col-sm-6 col-md-3 p-2">
                    <img src="{{ asset($image) }}" alt="{{ $project->title }}" class="w-100 h-100">
                </div>
                @endforeach
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-box">
                    <h4>{{ $project->title }}</h4>
                    <div class="row">
                        <div class="col-md-12 col-sm-6 col-12"><span><strong>City :</strong> {{ $project->city_id }}</span> </div>
                        <div class="col-md-12 col-sm-6 col-12"><span><strong>State :</strong> {{ $project->state_id }}</span> </div>
                        <div class="col-md-12 col-sm-6 col-12"><span><strong>address :</strong> {{ $project->address }}</span> </div>
                        <div class="col-md-12 col-sm-6 col-12"><span><strong>price_from :</strong> {{ $project->price_from }}</span> </div>
                        <div class="col-md-12 col-sm-6 col-12"><span><strong>price_to :</strong> {{ $project->price_to }}</span> </div>

                        <div class="col-12 mt-4">
                            <h4>Near By</h4>
                        </div>
                        <div class="col-md-12 col-sm-6 col-12"><span><strong>parking :</strong> {{ $project->parking }}</span> </div>
                        <div class="col-md-12 col-sm-6 col-12"><span><strong>electricity :</strong> {{ $project->electricity }}</span> </div>
                        <div class="col-md-12 col-sm-6 col-12"><span><strong>water_supply :</strong> {{ $project->water_supply }}</span> </div>
                        <div class="col-md-12 col-sm-6 col-12"><span><strong>sui_gas :</strong> {{ $project->sui_gas }}</span> </div>
                        <div class="col-md-12 col-sm-6 col-12"><span><strong>mosque :</strong> {{ $project->mosque }}</span> </div>
                        <div class="col-md-12 col-sm-6 col-12"><span><strong>swimming_pool :</strong> {{ $project->swimming_pool }}</span> </div>
                        <div class="col-md-12 col-sm-6 col-12"><span><strong>school :</strong> {{ $project->school }}</span> </div>
                        <div class="col-md-12 col-sm-6 col-12"><span><strong>hospital :</strong> {{ $project->hospital }}</span> </div>
                        <div class="col-md-12 col-sm-6 col-12"><span><strong>shopping_mall :</strong> {{ $project->shopping_mall }}</span> </div>
                        <div class="col-md-12 col-sm-6 col-12"><span><strong>restaurant :</strong> {{ $project->restaurant }}</span> </div>
                        <div class="col-md-12 col-sm-6 col-12"><span><strong>public_transport :</strong> {{ $project->public_transport }}</span> </div>
                        <div class="col-md-12 col-sm-6 col-12"><span><strong>security :</strong> {{ $project->security }}</span> </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card-box">
                    {!! $project->details !!}
                </div>
            </div>
        </div>
    </div>
@endsection
