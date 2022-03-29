@extends('frontend.layouts.app')

@section('page_title', ($sharedSetting->site_title) ? $sharedSetting->site_title : 'Al Harmain')

@section('content')
    

    @include('frontend.inc.featured-projects')

    @include('frontend.inc.recent-properties')

    @include('frontend.inc.cities')
    
    @include('frontend.inc.why-choose-us')

    @include('frontend.inc.about')
@endsection
