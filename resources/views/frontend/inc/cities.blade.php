<!-- Popular Cities -->
<section class="featured__property space-area">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-lg-6 mx-auto">
                <div class="title__head">
                    <h2 class="text-capitalize">popular city</h2>
                    <p class="text-capitalize text-center mb-0">Find Properties In These Cities.</p>

                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="featured__property-carousel owl-carousel owl-theme">
                    @foreach ($sharedCities as $city)
                    <div class="col-md-12 col-lg-12">
                        <!-- CARD IMAGE -->
                        <a href="{{ route('property.search_by_city', $city->slug) }}">
                            <div class="card__image-hover-style-v3">
                                <div class="card__image-hover-style-v3-thumb h-230">
                                    <img src="{{ asset($city->image) }}" alt="" class="img-fluid w-100">
                                </div>
                                <div class="overlay">
                                    <div class="desc">
                                        <h6 class="text-capitalize">{{ $city->name }}</h6>
                                        <p class="text-capitalize">{{ DB::table('properties')->where('city_id', $city->id)->count() }} Properties</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
</section>
<!-- END Popular Cities -->
