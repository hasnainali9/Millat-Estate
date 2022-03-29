
    <!-- RECENT PROPERTY -->
    <section class="featured__property bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-lg-6 mx-auto">
                    <div class="title__head">
                        <h2 class="text-center text-capitalize">
                            Recent Property
                        </h2>
                        <p class="text-center text-capitalize">We provide full service at every step.</p>

                    </div>
                </div>
            </div>
            <div class="featured__property-carousel owl-carousel owl-theme">
                @foreach ($sharedRecentProperties as $property)
                <div class="item">
                    <a href="{{ route('property.detail', $property->slug) }}">
                        <div class="card__image-hover h-250">
                            <div class="card__image-hover-overlay">
                                <div class="listing-badges">
                                    <span class="featured text-capitalize">
                                        {{ $property->type }}
                                    </span>
                                    <span>
                                        For
                                        @if ($property->purpose == 'rent')
                                            Rent
                                        @else
                                            Sale
                                        @endif
                                    </span>
                                </div>
                                <div class="card__image-content">
                                    <div class="card__image-content-desc">
                                        <h6> {{ $property->title }} </h6>
                                        <p class="mb-0">
                                            RS {{ $property->price }}
                                            @if ($property->purpose == 'rent')
                                                / monthly
                                            @endif
                                        </p>
                                    </div>
                                    <ul class="list-inline card__hidden-content">
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
                                <img alt="" src="{{ asset($property->images) }}"
                                    class="img-fluid h-40 ">
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
            </div>
        </div>
    </section>
    <!-- END RECENT PROPERTY -->











