<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="{{ $sharedSetting->site_description }}">
<meta name="keywords" content="Real Estate, Property, Directory Listing, Marketing, Agency" />
<meta name="author" content="mardianto - retenvi.com">
<title>@yield('page_title')</title>

<link rel="shortcut icon" href="{{ $sharedSetting->site_favicon }}" type="image/x-icon">

<!-- Facebook and Twitter integration -->
<meta property="og:title" content="{{ $sharedSetting->site_title }}" />
<meta property="og:image" content="" />
<meta property="og:url" content="" />
<meta property="og:site_name" content="{{ $sharedSetting->site_title }}" />
<meta property="og:description" content="" />
<meta name="twitter:title" content="{{ $sharedSetting->site_title }}" />
<meta name="twitter:image" content="" />
<meta name="twitter:url" content="" />
<meta name="twitter:card" content="" />

<link rel="manifest" href="">
<!-- favicon.ico in the root directory -->
<link rel="apple-touch-icon" href="">
<meta name="theme-color" content="#3454d1">
<link href="{{ asset('frontend/css/styles.css') }}" rel="stylesheet">

@yield('style')

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
