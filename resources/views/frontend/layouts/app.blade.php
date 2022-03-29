<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('frontend.inc.head')
</head>

<body>
    @if ((Route::getCurrentRoute()->uri() == '/'))
        @include('frontend.inc.home-header')
    @else
        @include('frontend.inc.header')
    @endif

    @include('frontend.inc.messages')

    @yield('content')

    @include('frontend.inc.call-to-action')

    @include('frontend.inc.footer')

    @include('frontend.inc.mobile-menu')

    <!-- SCROLL TO TOP -->
    <a href="javascript:" id="return-to-top"><i class="fa fa-chevron-up"></i></a>
    <!-- END SCROLL TO TOP -->
    <script src="{{ asset('frontend/js/index.bundle.js?8918068d71def746395d') }}"></script>
</body>

</html>
