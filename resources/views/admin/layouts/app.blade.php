<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <title>Admin Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ ($sharedSetting->admin_favicon != null) ? asset($sharedSetting->admin_favicon) :  asset('backend/images/favicon.ico') }}">

        <!-- Bootstrap Css -->
        <link href="{{ asset('backend/css/bootstrap.min.css') }}" id="bootstrap-stylesheet" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{ asset('backend/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{ asset('backend/css/app.min.css') }}" id="app-stylesheet" rel="stylesheet" type="text/css" />
        @yield('style')
    </head>

    <body data-sidebar="dark">

        <!-- Begin page -->
        <div id="wrapper">

            {{-- Header --}}
            @include('admin.inc.header')

            {{-- Sidebar --}}
            @include('admin.inc.sidebar')

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">
                    @include('admin.inc.messages')
                    @yield('content')

                </div> <!-- content -->

                {{-- Footer --}}
                @include('admin.inc.footer')

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->

        <!-- Vendor js -->
        <script src="{{ asset('backend/js/vendor.min.js') }}"></script>

        <!-- knob plugin -->
        <script src="{{ asset('backend/libs/jquery-knob/jquery.knob.min.js') }}"></script>

        <!--Morris Chart-->
        <!--<script src="{{ asset('backend/libs/morris-js/morris.min.js') }}"></script>-->
        <!--<script src="{{ asset('backend/libs/raphael/raphael.min.js') }}"></script>-->

        <!-- Dashboard init js-->
        <script src="{{ asset('backend/js/pages/dashboard.init.js') }}"></script>

        <!-- App js -->
        <script src="{{ asset('backend/js/app.min.js') }}"></script>

        @yield('script')
    </body>
</html>
