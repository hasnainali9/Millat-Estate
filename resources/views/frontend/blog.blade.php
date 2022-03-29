@extends('frontend.layouts.app')

@section('page_title', 'Blog')

@section('content')
    <section>
        <div class="container">
            <div class="row">
                <!-- BLOG START -->
                <div class="col-lg-8">
                    <div class="row">
                        @foreach ($posts as $post)
                            <div class="col-md-6 col-lg-6 my-3">
                                <div class="blog__grid mt-0">
                                    <!-- BLOG  -->
                                    <div class="card__image">
                                        <div class="card__image-header h-250">
                                            <img src="{{ asset($post->image) }}" alt=""
                                                class="img-fluid w100 img-transition">
                                            <div class="info">{{ $post->category->name }}</div>
                                        </div>
                                        <div class="card__image-body">
                                            <span class="badge badge-secondary p-1 text-capitalize mb-3">
                                                {{ $post->created_at->diffForHumans() }}
                                            </span>
                                            <h6 class="text-capitalize mb-3">
                                                <a href="{{ route('post', $post->slug) }}">
                                                    {{ $post->title }}
                                                </a>
                                            </h6>
                                            <a href="{{ route('post', $post->slug) }}" class="btn btn-sm btn-primary ">
                                                Read More <i class="fa fa-angle-right ml-1"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <!-- END BLOG -->
                                </div>
                            </div>
                        @endforeach

                    </div>

                </div>
                <!-- END BLOG  -->

                <!-- WIDGET BLOG -->
                <div class="col-lg-4">
                    <div class="sticky-top">
                        <aside>
                            <div class="widget__sidebar mt-0">
                                <div class="widget__sidebar__header">
                                    <h6 class="text-capitalize">category</h6>
                                </div>
                                <div class="widget__sidebar__body">
                                    <ul class="list-unstyled">
                                        @foreach ($categories as $category)
                                            <li>
                                                <a href="#" class="text-capitalize">
                                                    {{ $category->name }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>

                            </div>
                        </aside>
                    </div>
                </div>
                <!-- END WIDGET BLOG -->
            </div>
        </div>
    </section>
@endsection
