<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <title>Admin Authentication</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('backend/images/favicon.ico') }}">

        <!-- Bootstrap Css -->
        <link href="{{ asset('backend/css/bootstrap-dark.min.css') }}" id="bootstrap-stylesheet" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{ asset('backend/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{ asset('backend/css/app.min.css') }}" id="app-stylesheet" rel="stylesheet" type="text/css" />

    </head>

    <body class="bg-dark">

        @yield('content')

        <!-- Vendor js -->
        <script src="{{ asset('backend/js/vendor.min.js') }}"></script>

        <!-- App js -->
        <script src="{{ asset('backend/js/app.min.js') }}"></script>

    </body>
</html>
