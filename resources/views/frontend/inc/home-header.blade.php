@include('frontend/inc/navbar')
<div class="slider-container">
    <div class="container-slider-image-full  ">
        <div id="carouselExampleIndicators" class="carousel slide carousel-fade pointer-event" data-ride="carousel">
            <ol class="carousel-indicators d-none">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item banner-max-height active">
                    
                    <video class="d-block w-100" src="{{$sharedSetting->site_banner_video?asset($sharedSetting->site_banner_video) : asset('frontend/bg-video.mov') }}" loop muted autoplay>
                    </video>
                    <div class="carousel-caption banner__slide-overlay d-flex h-100">
                        <div class="carousel__content">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-lg-8 col-md-12 col-sm-12 text-center">
                                        <div class="slider__content-title ">
                                            <h2 data-animation="fadeInDown" data-delay=".2s" data-duration="1000ms" class="text-white animated fadeInDown">
                                                The #1 place for Classical
                                                property</h2>
                                            <p data-animation="fadeInUp" data-delay=".4s" data-duration="1000ms" class="text-white animated fadeInUp">

                                                𝐄𝐯𝐞𝐫𝐲𝐨𝐧𝐞 𝐃𝐞𝐬𝐞𝐫𝐯𝐞𝐬 𝐭𝐡𝐞 𝐎𝐩𝐩𝐨𝐫𝐭𝐮𝐧𝐢𝐭𝐲 𝐨𝐟 𝐚 𝐆𝐨𝐨𝐝 𝐇𝐨𝐦𝐞.
                                            </p>
                                            <a href="#" data-animation="fadeInUp" data-delay=".6s" data-duration="1000ms" class="btn btn-primary text-uppercase animated fadeInUp">
                                                contact us
                                                <i class="fa fa-angle-right arrow-btn "></i></a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <!-- <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span> -->
            <span class="carousel-control-nav-prev">
                <i class="fa fa-2x fa-angle-left"></i>
            </span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <!-- <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span> -->
            <span class="carousel-control-nav-next">
                <i class="fa fa-2x fa-angle-right"></i>
            </span>
        </a>
    </div>
</div>
<!-- END HEADER -->
<div class="clearfix"></div>
<div class="clearfix"></div>
<div class="mt-5"></div>
<style>
    
    .search__property .search__container .select_option{
        border-bottom: 0.5px solid #ddd;
        
    }
    .search__property .search__container .input-group div{
        margin-right: 5px;
        margin-bottom: 10px;
    }
    .search__property .position-relative .nav-tabs-02 .nav-item .nav-link{
        color: gray
    }
    .relative{
        position: relative;
    }
</style>
<div class="relative">
    <div class="search__area search__area-1" id="search__area-1">
        <div class="container">
            <div class="search__area-inner">
                <div class="row">
                    <div class="col-12">
                        <div class=" rounded p-4 my-4">
                            <div class="search__property">
                                <div class="position-relative">
                                    <ul class="nav nav-tabs nav-tabs-02 mb-3 justify-content-start" id="pills-tab" role="tablist">
                                        <li class="nav-item mr-1">
                                            <a class="nav-link active" id="buy-tab" data-toggle="pill" href="#buy" role="tab"
                                                aria-controls="buy" aria-selected="true">Buy </a>
                                        </li>
                                        <li class="nav-item mr-1">
                                            <a class="nav-link" id="rent-tab" data-toggle="pill" href="#rent" role="tab"
                                                aria-controls="rent" aria-selected="false">Rent</a>
                                        </li>
            
                                    </ul>
                                    <div class="tab-content" id="pills-tabContent">
                                        <div class="tab-pane fade active show" id="buy" role="tabpanel" aria-labelledby="buy-tab">
                                            {!! Form::open(['route' => 'property.search', 'method' => 'POST']) !!}
                                            @csrf
                                            <div class=" search__container">
                                                <div class="row input-group no-gutters">
                                                    {!! Form::hidden('type', 'buy') !!}
                                                    <div class="col-lg-3">
                                                        <select class="select_option form-control" name="category_id" required>
                                                            <option selected>Type Property</option>
                                                            @foreach ($sharedCategories as $category)
                                                                <option value="{{ $category->id }}">
                                                                    {{ $category->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        {!! Form::select('bedrooms', [1, 2, 3, 4, 5, 6, 7, 8, 9], '', ['class' => 'select_option form-control', 'placeholder' => 'Bedrooms']) !!}
                                                    </div>
                                                    <div class="col-lg-2">
                                                        {!! Form::select('bathrooms', [1, 2, 3, 4, 5], '', ['class' => 'select_option form-control', 'placeholder' => 'Bathrooms']) !!}
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <select class="select_option form-control" name="city_id" required>
                                                            <option selected>Locations</option>
                                                            @foreach ($sharedCities as $city)
                                                                <option value="{{ $city->id }}">
                                                                    {{ $city->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-2 input-group-append">
                                                        <button class="btn btn-primary btn-block" type="submit">
                                                            <i class="fa fa-search"></i> <span
                                                                class="ml-1 text-uppercase">search</span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            {!! Form::close() !!}
                                        </div>
                                        <div class="tab-pane fade" id="rent" role="tabpanel" aria-labelledby="rent-tab">
                                            {!! Form::open(['route' => 'property.search', 'method' => 'POST']) !!}
                                            @csrf
                                            <div class=" search__container">
                                                <div class="row input-group no-gutters">
                                                    {!! Form::hidden('type', 'rent') !!}
                                                    <div class="col-lg-3">
                                                        <select class="select_option form-control" name="category_id" required>
                                                            <option selected>Type Property</option>
                                                            @foreach ($sharedCategories as $category)
                                                                <option value="{{ $category->id }}">
                                                                    {{ $category->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        {!! Form::select('bedrooms', [1, 2, 3, 4, 5, 6, 7, 8, 9], '', ['class' => 'select_option form-control', 'placeholder' => 'Bedrooms']) !!}
                                                    </div>
                                                    <div class="col-lg-2">
                                                        {!! Form::select('bathrooms', [1, 2, 3, 4, 5], '', ['class' => 'select_option form-control', 'placeholder' => 'Bathrooms']) !!}
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <select class="select_option form-control" name="city_id" required>
                                                            <option selected>Locations</option>
                                                            @foreach ($sharedCities as $city)
                                                                <option value="{{ $city->id }}">
                                                                    {{ $city->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-2 input-group-append">
                                                        <button class="btn btn-primary btn-block" type="submit">
                                                            <i class="fa fa-search"></i> <span
                                                                class="ml-1 text-uppercase">search</span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            {!! Form::close() !!}
                                        </div>
            
                                    </div>
                                </div>
                            </div>
                        </div>
            
                    </div>
                </div>
    
            </div>
        </div>
    </div>
</div>



