<!-- FEATURED PROPERTIES -->
<section class="featured__property space-area">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-lg-6 mx-auto">
                <div class="title__head">
                    <h2 class="text-center text-capitalize">
                        featured properties
                    </h2>
                    <p class="text-center text-capitalize">Invest In Our Exclusive Properties.</p>

                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="featured__property-carousel owl-carousel owl-theme">
                    @foreach ($sharedFeaturedProjects as $project)
                    <div class="item">
                        <!-- CARD IMAGE -->
                        <a href="{{ route('invest.detail', $project->slug) }}">
                            <div class="card__image-hover h-250">
                                <div class="card__image-hover-overlay">
                                    <div class="card__image-content">
                                        <div class="card__image-content-desc">
                                            <h6> {{ $project->title }} </h6>
                                            <p class="mb-0"> Rs {{ $project->price_from }} - Rs {{ $project->price_to }}
                                            </p>
                                        </div>
                                        <ul class="list-inline card__hidden-content">
                                            @if ($project->water_supply)
                                                <li class="list-inline-item">
                                                    <span>
                                                        Water <br>
                                                        <i class="fa fa-tint"></i>
                                                    </span>
                                                </li>
                                            @endif
                                            @if ($project->electricity)
                                                <li class="list-inline-item">
                                                    <span>
                                                        Electriity <br>
                                                        <i class="fa fa-bolt"></i>
                                                    </span>
                                                </li>
                                            @endif
                                            @if ($project->sui_gas)
                                                <li class="list-inline-item">
                                                    <span>
                                                        Gas <br>
                                                        <i class="fa fa-fire"></i>
                                                    </span>
                                                </li>
                                            @endif
                                            @if ($project->public_transport)
                                                <li class="list-inline-item">
                                                    <span>
                                                        Transport <br>
                                                        <i class="fa fa-bus"></i>
                                                    </span>
                                                </li>
                                            @endif
                                        </ul>
                                    </div>
                                    <img alt="" src="{{ asset($project->images) }}" class="img-fluid h-40 ">
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
<!-- END FEATURED PROPERTIES -->








