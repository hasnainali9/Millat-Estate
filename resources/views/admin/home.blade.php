@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">

    <div class="row">

        <div class="col-xl-3 col-md-6">
            <div class="card-box">
                <h4 class="header-title mt-0 mb-4">Total Blog Categories</h4>
                <div class="widget-chart-1">
                    <div class="widget-detail-1 text-right">
                        <h2 class="font-weight-normal pt-2 mb-1"> {{ $BlogCategoriesCount }} </h2>
                    </div>
                </div>
            </div>
        </div><!-- end col -->

        <div class="col-xl-3 col-md-6">
            <div class="card-box">
                <h4 class="header-title mt-0 mb-4">Total Blog Posts</h4>
                <div class="widget-chart-1">
                    <div class="widget-detail-1 text-right">
                        <h2 class="font-weight-normal pt-2 mb-1"> {{ $BlogPostsCount }} </h2>
                    </div>
                </div>
            </div>
        </div><!-- end col -->

        <div class="col-xl-3 col-md-6">
            <div class="card-box">
                <h4 class="header-title mt-0 mb-4">Total Newsletter Emails</h4>
                <div class="widget-chart-1">
                    <div class="widget-detail-1 text-right">
                        <h2 class="font-weight-normal pt-2 mb-1"> {{ $NewsletterCount }} </h2>
                    </div>
                </div>
            </div>
        </div><!-- end col -->

        <div class="col-xl-3 col-md-6">
            <div class="card-box">
                <h4 class="header-title mt-0 mb-4">Total Blog Categories</h4>
                <div class="widget-chart-1">
                    <div class="widget-detail-1 text-right">
                        <h2 class="font-weight-normal pt-2 mb-1"> {{ $ContactCount }} </h2>
                    </div>
                </div>
            </div>
        </div><!-- end col -->

        <div class="col-xl-4 col-md-6">
            <div class="card-box">
                <h4 class="header-title mt-0 mb-4">Total Properties</h4>
                <div class="widget-chart-1">
                    <div class="widget-detail-1 text-right">
                        <h2 class="font-weight-normal pt-2 mb-1"> {{ $TotalPropertiesCount }} </h2>
                    </div>
                </div>
            </div>
        </div><!-- end col -->

        <div class="col-xl-4 col-md-6">
            <div class="card-box">
                <h4 class="header-title mt-0 mb-4">Total Rent Properties</h4>
                <div class="widget-chart-1">
                    <div class="widget-detail-1 text-right">
                        <h2 class="font-weight-normal pt-2 mb-1"> {{ $RentPropertiesCount }} </h2>
                    </div>
                </div>
            </div>
        </div><!-- end col -->

        <div class="col-xl-4 col-md-6">
            <div class="card-box">
                <h4 class="header-title mt-0 mb-4">Total Sale Properties</h4>
                <div class="widget-chart-1">
                    <div class="widget-detail-1 text-right">
                        <h2 class="font-weight-normal pt-2 mb-1"> {{ $SellPropertiesCount }} </h2>
                    </div>
                </div>
            </div>
        </div><!-- end col -->

        <div class="col-xl-6 col-md-6">
            <div class="card-box">
                <h4 class="header-title mt-0 mb-4">Total Projects</h4>
                <div class="widget-chart-1">
                    <div class="widget-detail-1 text-right">
                        <h2 class="font-weight-normal pt-2 mb-1"> {{ $TotalProjectsCount }} </h2>
                    </div>
                </div>
            </div>
        </div><!-- end col -->

        <div class="col-xl-6 col-md-6">
            <div class="card-box">
                <h4 class="header-title mt-0 mb-4">Total Cities</h4>
                <div class="widget-chart-1">
                    <div class="widget-detail-1 text-right">
                        <h2 class="font-weight-normal pt-2 mb-1"> {{ $TotalCitiesCount }} </h2>
                    </div>
                </div>
            </div>
        </div><!-- end col -->

    </div>
    <!-- end row -->

</div> <!-- container-fluid -->
@endsection
