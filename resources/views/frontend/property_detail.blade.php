@extends('frontend.layouts.app')

@section('page_title', $property->title)

@section('content')
    <section class="single__Detail">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <!-- SLIDER IMAGE DETAIL -->
                    <div class="slider__image__detail-large owl-carousel owl-theme">
                        @foreach (explode(',', $property->images) as $propertyImage)
                        <div class="item">
                            <div class="slider__image__detail-large-one">
                                <img src="{{ asset($propertyImage) }}" alt="" class="img-fluid w-100 img-transition">
                                <div class="description">
                                    <span class="badge badge-primary text-capitalize mb-2">{{ $property->category->name }}</span>
                                    <div class="price">
                                        <h5 class="text-capitalize">Rs {{ $property->price }}
                                            {{ $property->purpose == 'sell' ? '' : '/Mo' }}</h5>
                                    </div>
                                    <h4 class="text-capitalize">{{ $property->title }}</h4>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <div class="slider__image__detail-thumb owl-carousel owl-theme">
                        @foreach (explode(',', $property->images) as $propertyImage)
                        <div class="item">
                            <div class="slider__image__detail-thumb-one">
                                <img src="{{ asset($propertyImage) }}" alt="" class="img-fluid w-100 img-transition">
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <!-- END SLIDER IMAGE DETAIL -->
                    <div class="row">
                        <div class="col-md-9 col-lg-9">
                            <div class="single__detail-title mt-4">
                                <h3 class="text-capitalize">{{ $property->title }}</h3>
                                <p> {{ $property->address }}</p>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="single__detail-price mt-4">
                                <h3 class="text-capitalize text-gray">Rs {{ $property->price }}
                                    {{ $property->purpose == 'sell' ? '' : '/Mo' }}</h3>
                            </div>
                        </div>
                    </div>

                    <!-- DESCRIPTION -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="single__detail-desc">
                                <h6 class="text-capitalize detail-heading">description</h6>
                                <div class="show__more">
                                    {!! $property->details !!}
                                    <a href="javascript:void(0)" class="show__more-button ">read more</a>
                                </div>
                            </div>
                            <div class="clearfix"></div>

                            <!-- PROPERTY DETAILS SPEC -->
                            <div class="single__detail-features">
                                <h6 class="text-capitalize detail-heading">property details</h6>
                                <!-- INFO PROPERTY DETAIL -->
                                <div class="property__detail-info">
                                    <div class="row">
                                        <div class="col-md-6 col-lg-6">
                                            <ul class="property__detail-info-list list-unstyled">
                                                <li><strong>City :</strong> {{ $property->city->name }}</li>
                                                <li><strong>State :</strong> {{ $property->state->name }}</li>
                                                <li><strong>Address :</strong> {{ $property->address }}</li>
                                                <li><strong>Price :</strong> {{ $property->price }}</li>
                                                <li><strong>Bedrooms :</strong> {{ $property->bedrooms }}</li>
                                            </ul>
                                        </div>
                                        <div class="col-md-6 col-lg-6">
                                            <ul class="property__detail-info-list list-unstyled">
                                                <li><strong>Bathrooms :</strong> {{ $property->bathrooms }}</li>
                                                <li><strong>Kitchens :</strong> {{ $property->kitchens }}</li>
                                                <li><span><strong>electricity :</strong> <i class=" fa {{ ($property->electricity) ? 'fa-check' : 'fa-close' }}"></i></li>
                                                <li><span><strong>water_supply :</strong> <i class=" fa {{ ($property->water_supply) ? 'fa-check' : 'fa-close' }}"></i></li>
                                                <li><span><strong>sui_gas :</strong> <i class=" fa {{ ($property->sui_gas) ? 'fa-check' : 'fa-close' }}"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- END INFO PROPERTY DETAIL -->
                            </div>
                            <!-- END PROPERTY DETAILS SPEC -->
                            <div class="clearfix"></div>

                            <!-- LOCATION -->
                            <div class="single__detail-features">
                                <h6 class="text-capitalize detail-heading">location</h6>
                                <!-- FILTER VERTICAL -->
                                <div id="map-canvas">
                                    {!! $property->map_location !!}
                                </div>
                                <!-- END FILTER VERTICAL -->
                            </div>
                            <!-- END LOCATION -->
                        </div>
                    </div>
                    <!-- END DESCRIPTION -->
                </div>
                <div class="col-lg-4">
                    <!-- FORM FILTER -->
                    @include('frontend.inc.properties-sidebar')
                </div>
            </div>
        </div>
    </section>
    <!-- END SINGLE DETAIL -->
@endsection
