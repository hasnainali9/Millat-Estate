@extends('frontend.layouts.app')

@section('page_title', 'Properties')

@section('content')
    <!-- LISTING LIST -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="tabs__custom-v2 ">
                                <!-- FILTER VERTICAL -->
                                <ul class="nav nav-pills myTab" role="tablist">
                                    <li class="list-inline-item mr-auto">
                                        <span class="title-text">Change View</span>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="pill" href="#pills-tab-one" role="tab"
                                            aria-controls="pills-tab-one" aria-selected="true">
                                            <span class="fa fa-th-list"></span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="pill" href="#pills-tab-two" role="tab"
                                            aria-controls="pills-tab-two" aria-selected="false">
                                            <span class="fa fa-th-large"></span></a>
                                    </li>
                                </ul>

                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade" id="pills-tab-one" role="tabpanel"
                                        aria-labelledby="pills-tab-one">

                                        @foreach ($properties as $property)
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="card__image card__box-v1">
                                                        <div class="row no-gutters">
                                                            <div class="col-md-4 col-lg-3 col-xl-4">
                                                                <div class="card__image__header h-250">
                                                                    <a href="{{ route('property.detail', $property->slug) }}">
                                                                        @if ($property->purpose == 'sell')
                                                                            <div class="ribbon text-capitalize">Buy Now
                                                                            </div>
                                                                        @else
                                                                            <div class="ribbon text-capitalize">Rent Now
                                                                            </div>
                                                                        @endif
                                                                        <img src="{{ asset($property->images) }}" alt=""
                                                                            class="img-fluid w100 img-transition">
                                                                        @if ($property->purpose == 'sell')
                                                                            <div class="info"> for sale</div>
                                                                        @else
                                                                            <div class="info"> for rent</div>
                                                                        @endif
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-8 col-lg-9 col-xl-8 my-auto">
                                                                <div class="card__image__body">
                                                                    <span
                                                                        class="badge badge-primary text-capitalize mb-2">{{ $property->category->name }}</span>
                                                                    <h6>
                                                                        <a
                                                                            href="{{ route('property.detail', $property->slug) }}">{{ $property->title }}</a>
                                                                    </h6>
                                                                    <div class="card__image__body-desc">
                                                                        <p class="text-capitalize">
                                                                            <i class="fa fa-map-marker"></i>
                                                                            {{ $property->address }}
                                                                        </p>
                                                                    </div>

                                                                    <ul class="list-inline card__content">
                                                                        <li class="list-inline-item">
                                                                            <span>
                                                                                baths <br>
                                                                                <i class="fa fa-bath"></i>
                                                                                {{ $property->bathrooms }}
                                                                            </span>
                                                                        </li>
                                                                        <li class="list-inline-item">
                                                                            <span>
                                                                                beds <br>
                                                                                <i class="fa fa-bed"></i>
                                                                                {{ $property->bedrooms }}
                                                                            </span>
                                                                        </li>
                                                                        <li class="list-inline-item">
                                                                            <span>
                                                                                rooms <br>
                                                                                <i class="fa fa-cutlery"></i>
                                                                                {{ $property->kitchens }}
                                                                            </span>
                                                                        </li>
                                                                        <li class="list-inline-item">
                                                                            <span>
                                                                                area <br>
                                                                                <i class="fa fa-map"></i>
                                                                                {{ $property->area }} sq ft
                                                                            </span>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <div class="card__image-footer">
                                                                    <ul class="list-inline my-auto">
                                                                        <li class="list-inline-item">
                                                                            <span>
                                                                                @if ($property->electricity)
                                                                                    <i class="fa fa-bolt"
                                                                                        title="Electricity"></i>
                                                                                @endif
                                                                            </span>
                                                                        </li>
                                                                        <li class="list-inline-item">
                                                                            <span>
                                                                                @if ($property->water_supply)
                                                                                    <i class="fa fa-tint"
                                                                                        title="Water Supply"></i>
                                                                                @endif
                                                                            </span>
                                                                        </li>
                                                                        <li class="list-inline-item">
                                                                            <span>
                                                                                @if ($property->sui_gas)
                                                                                    <i class="fa fa-fire"
                                                                                        title="Sui gas"></i>
                                                                                @endif
                                                                            </span>
                                                                        </li>
                                                                    </ul>
                                                                    <ul class="list-inline my-auto ml-auto">
                                                                        <li class="list-inline-item">
                                                                            <h6>Rs {{ $property->price }}</h6>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="clearfix"></div>
                                        @endforeach
                                    </div>

                                    <div class="tab-pane fade show active" id="pills-tab-two" role="tabpanel"
                                        aria-labelledby="pills-tab-two">
                                        <div class="row">
                                            @foreach ($properties as $property)
                                                <div class="col-md-4 col-lg-4">
                                                    <!-- THREE -->
                                                    <div class="card__image card__box-v1">
                                                        <div class="card__image-header h-250">
                                                            <a href="{{ route('property.detail', $property->slug) }}">
                                                                @if ($property->purpose == 'sell')
                                                                    <div class="ribbon text-capitalize">Buy Now</div>
                                                                @else
                                                                    <div class="ribbon text-capitalize">Rent Now</div>
                                                                @endif
                                                                <img src="{{ asset($property->images) }}" alt=""
                                                                    class="img-fluid w100 img-transition">
                                                                @if ($property->purpose == 'sell')
                                                                    <div class="info"> for sale</div>
                                                                @else
                                                                    <div class="info"> for rent</div>
                                                                @endif
                                                            </a>
                                                        </div>
                                                        <div class="card__image-body">
                                                            <span
                                                                class="badge badge-primary text-capitalize mb-2">{{ $property->category->name }}</span>
                                                            <h6 class="text-capitalize">
                                                                <a
                                                                    href="{{ route('property.detail', $property->slug) }}">{{ $property->title }}</a>
                                                            </h6>

                                                            <p class="text-capitalize">
                                                                <i class="fa fa-map-marker"></i>
                                                                {{ $property->address }}
                                                            </p>
                                                            <ul class="list-inline card__content">
                                                                <li class="list-inline-item">
                                                                    <span>
                                                                        baths <br>
                                                                        <i class="fa fa-bath"></i>
                                                                        {{ $property->bathrooms }}
                                                                    </span>
                                                                </li>
                                                                <li class="list-inline-item">
                                                                    <span>
                                                                        beds <br>
                                                                        <i class="fa fa-bed"></i>
                                                                        {{ $property->bedrooms }}
                                                                    </span>
                                                                </li>
                                                                <li class="list-inline-item">
                                                                    <span>
                                                                        rooms <br>
                                                                        <i class="fa fa-cutlery"></i>
                                                                        {{ $property->kitchens }}
                                                                    </span>
                                                                </li>
                                                                <li class="list-inline-item">
                                                                    <span>
                                                                        area <br>
                                                                        <i class="fa fa-map"></i> {{ $property->area }}
                                                                        sq ft
                                                                    </span>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="card__image-footer">
                                                            <ul class="list-inline my-auto">
                                                                <li class="list-inline-item">
                                                                    <span>
                                                                        @if ($property->electricity)
                                                                            <i class="fa fa-bolt" title="Electricity"></i>
                                                                        @endif
                                                                    </span>
                                                                </li>
                                                                <li class="list-inline-item">
                                                                    <span>
                                                                        @if ($property->water_supply)
                                                                            <i class="fa fa-tint" title="Water Supply"></i>
                                                                        @endif
                                                                    </span>
                                                                </li>
                                                                <li class="list-inline-item">
                                                                    <span>
                                                                        @if ($property->sui_gas)
                                                                            <i class="fa fa-fire" title="Sui gas"></i>
                                                                        @endif
                                                                    </span>
                                                                </li>
                                                            </ul>
                                                            <ul class="list-inline my-auto ml-auto">
                                                                <li class="list-inline-item">

                                                                    <h6>Rs {{ $property->price }}</h6>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="cleafix"></div>
                                    </div>
                                </div>
                                <!-- END FILTER VERTICAL -->
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- END LISTING LIST -->
@endsection
