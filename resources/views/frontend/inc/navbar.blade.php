  <!-- HEADER -->
  <header class="header__style-one">
    <!-- NAVBAR -->
    <nav class="navbar navbar-hover navbar-expand-lg navbar-soft navbar-transparent">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ $sharedSetting->site_logo_light ? $sharedSetting->site_logo_light : asset('frontend/images/logo-white.svg') }}"
                alt="">
            <img src="{{ $sharedSetting->site_logo_dark ? $sharedSetting->site_logo_dark : asset('frontend/images/logo-blue-stiky.svg') }}"
                alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav99">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="main_nav99">
                <ul class="navbar-nav mx-auto ">
                    <li class="nav-item"><a class="nav-link" href="{{ route('home') }}"> Home </a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('about') }}"> About </a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('property', 'buy') }}"> Buy
                        </a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('property', 'rent') }}"> Rent
                        </a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('invest') }}"> Invest </a>
                    </li>
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
                    <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}"> Contact </a>
                    </li>
                </ul>


              
            </div> <!-- navbar-collapse.// -->
        </div>
    </nav>
    <!-- END NAVBAR -->
</header>
<!-- END HEADER -->