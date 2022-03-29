<!-- ABOUT -->
<section class="home__about bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="title__leading">
                    <!-- <h6 class="text-uppercase">trusted By thousands</h6> -->
                    <h2 class="text-capitalize">why choose use?</h2>
                    <p>
                        The first step in selling your property is to get a valuation from local experts. They will
                        inspect your home and take into account its unique features, the area and market conditions
                        before providing you with the most accurate valuation.
                    </p>
                    <p>
                        We are passionate about creating an incredible client experience and determined to get you the
                        very best results.
                    </p>
                    @if (!Route::is('about'))
                        <a href="{{ route('about') }}" class="btn btn-primary mt-3 text-capitalize"> read more
                            <i class="fa fa-angle-right ml-3 "></i></a>
                    @endif
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about__image">
                    <div class="about__image-top">
                        <div class="about__image-top-hover">
                            <img src="{{ asset('frontend/images/why-choose-us-1.png') }}" alt=""
                                class="img-fluid">
                        </div>

                    </div>
                    <div class="about__image-bottom">
                        <div class="about__image-bottom-hover">
                            <img src="{{ asset('frontend/images/why-choose-us-2.png') }}" alt=""
                                class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END ABOUT -->
