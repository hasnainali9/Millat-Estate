@extends('frontend.layouts.app')

@section('page_title', $page->title)

@section('content')
    <section>
        <div class="container">
            <div class="row">
                <!-- BLOG START -->
                <div class="col-lg-9 mx-auto">
                    <div class="">
                        <h1 class="mb-4">
                            {{ $page->title }}
                        </h1>

                        <figure>
                            <img src="{{ $page->image }}" class="rounded w-100" alt="">
                        </figure>

                        <p>
                            {!! $page->description !!}
                        </p>

                        <div class="clearfix"></div>
                    </div>
                </div>
                <!-- END BLOG  -->
            </div>
        </div>
    </section>
@endsection
