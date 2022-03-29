<!-- HEADER -->
<header>
    {{-- <!-- NAVBAR TOP -->
    <div class="topbar d-none d-sm-block">
        <div class="container ">
            <div class="row">
                <div class="col-sm-12 col-md-5">
                    <div class="topbar-left">
                        <div class="topbar-text">
                            Monday, March 22, 2020
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-7">
                    <div class="list-unstyled topbar-right">
                        <ul class="topbar-link">
                            <li><a href="#" title="">Career</a></li>
                            <li><a href="#" title="">Contact Us</a></li>
                            <li><a href="#" title="">Login / Register</a></li>
                        </ul>
                        <ul class="topbar-sosmed">
                            <li>
                                <a href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END NAVBAR TOP --> --}}
    <!-- NAVBAR -->
    <nav class="navbar navbar-hover navbar-expand-lg navbar-soft">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ ($sharedSetting->site_logo_dark) ? asset($sharedSetting->site_logo_dark) :asset('frontend/images/logo-blue-stiky.svg') }}" alt="" class="img-fluid">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav99">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="main_nav99">
                <ul class="navbar-nav mx-auto ">
                    <li class="nav-item"><a class="nav-link" href="{{ route('home') }}"> Home </a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('about') }}"> About </a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('property', 'buy') }}"> Buy </a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('property', 'rent') }}"> Rent </a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('invest') }}"> Invest </a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('blog') }}"> Blog </a></li>
                    @if($sharedPages->count()>0)
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="javascript;;" id="MoredropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> More </a>
                        <div class="dropdown-menu" aria-labelledby="MoredropdownMenuLink">
                            @foreach($sharedPages as $key=>$page)
                            <a class="dropdown-item" href="{{route('page',['slug'=>$page->slug])}}">{{$page->title}}</a>
                            @endforeach
                          </div>
                    </li>
                    @endif
                    <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}"> Contact </a></li>
                </ul>
            </div> <!-- navbar-collapse.// -->
        </div>
    </nav>
    <!-- END NAVBAR -->
    <!-- BREADCRUMB -->
    <div class="bg-theme-overlay">
        <section class="section__breadcrumb ">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-8 text-center">
                        <h2 class="text-capitalize text-white">@yield('page_title')</h2>
                        <ul class="list-inline ">
                            <li class="list-inline-item">
                                <a href="{{ route('home') }}" class="text-white">
                                    Home
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="javascript:void(0)" class="text-white">
                                    @yield('page_title')
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- END BREADCRUMB -->
</header>
