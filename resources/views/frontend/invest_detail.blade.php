@extends('frontend.layouts.app')

@section('page_title', $project->title)

@section('content')
    <section class="single__Detail">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <!-- SLIDER IMAGE DETAIL -->
                    <div class="slider__image__detail-large owl-carousel owl-theme">
                        @foreach (explode(',', $project->images) as $projectImage)
                        <div class="item">
                            <div class="slider__image__detail-large-one">
                                <img src="{{ asset($projectImage) }}" alt="" class="img-fluid w-100 img-transition">
                                <div class="description">
                                    <div class="price">
                                        <h5 class="text-capitalize">Rs {{ $project->price_from . '-' . $project->price_to }}
                                        </h5>
                                    </div>
                                    <h4 class="text-capitalize">{{ $project->title }}</h4>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <div class="slider__image__detail-thumb owl-carousel owl-theme">
                        @foreach (explode(',', $project->images) as $projectImage)
                        <div class="item">
                            <div class="slider__image__detail-thumb-one">
                                <img src="{{ asset($projectImage) }}" alt="" class="img-fluid w-100 img-transition">
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <!-- END SLIDER IMAGE DETAIL -->
                    <div class="row">
                        <div class="col-12">
                            <div class="single__detail-title mt-4">
                                <h3 class="text-capitalize">{{ $project->title }}</h3>
                                <p> {{ $project->address }}</p>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="single__detail-price mt-4">
                                <h3 class="text-capitalize text-gray">Rs {{ $project->price_from . '-' . $project->price_to }}
                                </h3>
                            </div>
                        </div>
                    </div>

                    <!-- DESCRIPTION -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="single__detail-desc">
                                <h6 class="text-capitalize detail-heading">description</h6>
                                <div class="show__more">
                                    {!! $project->details !!}
                                    <a href="javascript:void(0)" class="show__more-button ">read more</a>
                                </div>
                            </div>
                            <div class="clearfix"></div>

                            <!-- PROPERTY DETAILS SPEC -->
                            <div class="single__detail-features">
                                <h6 class="text-capitalize detail-heading">project details</h6>
                                <!-- INFO PROPERTY DETAIL -->
                                <div class="project__detail-info">
                                    <div class="row">
                                        <div class="col-md-6 col-lg-6">
                                            <ul class="project__detail-info-list list-unstyled">
                                                <li><strong>City :</strong> {{ $project->city->name }}</li>
                                                <li><strong>State :</strong> {{ $project->state->name }}</li>
                                                <li><strong>Address :</strong> {{ $project->address }}</li>
                                                <li><strong>Price From :</strong> RS {{ $project->price_from }}</li>
                                                <li><strong>Price To :</strong> RS {{ $project->price_to }}</li>
                                                <li><strong>Bedrooms :</strong> {{ $project->bedrooms }}</li>
                                                <li><strong>parking :</strong> <i class=" fa {{ ($project->parking) ? 'fa-check' : 'fa-close' }}"></i></li>
                                                <li><strong>electricity :</strong> <i class=" fa {{ ($project->electricity) ? 'fa-check' : 'fa-close' }}"></i></li>
                                                <li><strong>water_supply :</strong> <i class=" fa {{ ($project->water_supply) ? 'fa-check' : 'fa-close' }}"></i></li>
                                            </ul>
                                        </div>
                                        <div class="col-md-6 col-lg-6">
                                            <ul class="project__detail-info-list list-unstyled">
                                                <li><strong>sui_gas :</strong> <i class="fa {{ ($project->sui_gas) ? 'fa-check' : 'fa-close' }}"></i></li>
                                                <li><strong>mosque :</strong> <i class="fa {{ ($project->mosque) ? 'fa-check' : 'fa-close' }}"></i></li>
                                                <li><strong>swimming_pool :</strong> <i class="fa {{ ($project->swimming_pool) ? 'fa-check' : 'fa-close' }}"></i></li>
                                                <li><strong>school :</strong> <i class="fa {{ ($project->school) ? 'fa-check' : 'fa-close' }}"></i></li>
                                                <li><strong>hospital :</strong> <i class="fa {{ ($project->hospital) ? 'fa-check' : 'fa-close' }}"></i></li>
                                                <li><strong>shopping_mall :</strong> <i class="fa {{ ($project->shopping_mall) ? 'fa-check' : 'fa-close' }}"></i></li>
                                                <li><strong>restaurant :</strong> <i class="fa {{ ($project->restaurant) ? 'fa-check' : 'fa-close' }}"></i></li>
                                                <li><strong>public_transport :</strong> <i class="fa {{ ($project->public_transport) ? 'fa-check' : 'fa-close' }}"></i></li>
                                                <li><strong>security :</strong> <i class="fa {{ ($project->security) ? 'fa-check' : 'fa-close' }}"></i></li>
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
                                        {!! $project->map_location !!}
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
