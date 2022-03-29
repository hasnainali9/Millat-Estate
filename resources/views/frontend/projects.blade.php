@extends('frontend.layouts.app')

@section('page_title', 'Projects')

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
                                    <li class="list-inline-item mr-auto"></li>
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

                                        @foreach ($projects as $project)
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="card__image card__box-v1">
                                                        <div class="row no-gutters">
                                                            <div class="col-md-4 col-lg-3 col-xl-4">
                                                                <div class="card__image__header h-250">
                                                                    <a href="{{ route('invest.detail', $project->slug) }}">
                                                                        <img src="{{ asset($project->images) }}" alt=""
                                                                            class="img-fluid w100 img-transition">
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-8 col-lg-9 col-xl-8 my-auto">
                                                                <div class="card__image__body">
                                                                    <h6>
                                                                        <a href="{{ route('invest.detail', $project->slug) }}">{{ $project->title }}</a>
                                                                    </h6>
                                                                    <div class="card__image__body-desc">
                                                                        <p class="text-capitalize">
                                                                            <i class="fa fa-map-marker"></i>
                                                                            {{ $project->address }}
                                                                        </p>
                                                                    </div>

                                                                    <ul class="list-inline card__content">
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
                                                                <div class="card__image-footer">
                                                                    <ul class="list-inline my-auto">
                                                                        <li class="list-inline-item">
                                                                            From <h6>Rs {{ $project->price_from }}</h6>
                                                                        </li>
                                                                    </ul>
                                                                    <ul class="list-inline my-auto ml-auto">
                                                                        <li class="list-inline-item">
                                                                            To
                                                                            <h6>Rs {{ $project->price_to }}</h6>
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
                                            @foreach ($projects as $project)
                                                <div class="col-md-4 col-lg-4">
                                                    <!-- THREE -->
                                                    <div class="card__image card__box-v1">
                                                        <div class="card__image-header h-250">
                                                            <a href="{{ route('invest.detail', $project->slug) }}">
                                                                <img src="{{ asset($project->images) }}" alt=""
                                                                    class="img-fluid w100 img-transition">
                                                            </a>
                                                        </div>
                                                        <div class="card__image-body">
                                                            <h6 class="text-capitalize">
                                                                <a href="{{ route('invest.detail', $project->slug) }}">{{ $project->title }}</a>
                                                            </h6>

                                                            <p class="text-capitalize">
                                                                <i class="fa fa-map-marker"></i>
                                                                {{ $project->address }}
                                                            </p>
                                                            <ul class="list-inline card__content">
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
                                                        <div class="card__image-footer">
                                                            <ul class="list-inline my-auto">
                                                                <li class="list-inline-item">
                                                                    From <h6>Rs {{ $project->price_from }}</h6>
                                                                </li>
                                                            </ul>
                                                            <ul class="list-inline my-auto ml-auto">
                                                                <li class="list-inline-item">
                                                                    To
                                                                    <h6>Rs {{ $project->price_to }}</h6>
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
