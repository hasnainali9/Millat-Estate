@extends('frontend.layouts.app')

@section('page_title', $post->title)

@section('content')
    <section>
        <div class="container">
            <div class="row">
                <!-- BLOG START -->
                <div class="col-lg-9 mx-auto">
                    <div class="single__blog-detail">
                        <h1>
                            {{ $post->title }}
                        </h1>

                        <div class="single__blog-detail-info">
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <span class="text-dark text-capitalize ml-1">
                                        {{ $post->created_at->diffForHumans() }}
                                    </span>
                                </li>

                                <li class="list-inline-item">
                                    <span class="text-dark text-capitalize ml-1">
                                        <a href="#">
                                            {{ $post->category->name }}
                                        </a>
                                    </span>
                                </li>
                            </ul>
                        </div>

                        <figure>
                            <img src="{{ $post->image }}" class="img-fluid w-100" alt="">
                        </figure>

                        <p>
                            {!! $post->description !!}
                        </p>

                        <div class="clearfix"></div>
                    </div>
                </div>
                <!-- END BLOG  -->
            </div>
        </div>
    </section>
@endsection
