<!-- FOOTER -->
<!-- Footer  -->
<footer>
    <div class="wrapper__footer bg__footer ">
        <div class=" container">
            <div class="row">
                <div class="col-md-4">
                    <div class="widget__footer mb-3">
                        <!-- <h4 class="footer-title">company info</h4> -->
                        <figure>
                            <img src="{{ ($sharedSetting->site_logo_light) ? asset($sharedSetting->site_logo_light) :asset('frontend/images/logo-blue.svg') }}" alt="" class="logo-footer">
                        </figure>
                        <p>
                            Weather you are looking to buy, sell, & rent homes, or even invest in properties. Al-Harmain Group of Companies job is to provide with the best experience possible.
                        </p>
                    </div>
                    <div class="border-line"></div>

                </div>

                <!-- QUICK LINKS -->
                <div class="col-md-4">
                    <div class="widget__footer">
                        <h4 class="footer-title">Property Types</h4>
                        <div class="link__category">
                            <ul class="list-unstyled ">
                                @foreach ($sharedCategories as $category)
                                <li class="list-inline-item">
                                    <a href="{{route('category.show',['cat'=>$category->slug])}}">{{ $category->name }}</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- NEWSLETTERS -->
                <div class="col-md-4">
                    <div class="widget__footer">
                        <h4 class="footer-title">follow us </h4>
                        <p class="mb-2">
                            Follow us and stay in touch to get the latest news
                        </p>
                        <p>
                            <button class="btn btn-social btn-social-o facebook mr-1">
                                <i class="fa fa-facebook-f"></i>
                            </button>
                            <button class="btn btn-social btn-social-o twitter mr-1">
                                <i class="fa fa-twitter"></i>
                            </button>

                            <button class="btn btn-social btn-social-o linkedin mr-1">
                                <i class="fa fa-linkedin"></i>
                            </button>
                            <button class="btn btn-social btn-social-o instagram mr-1">
                                <i class="fa fa-instagram"></i>
                            </button>

                            <button class="btn btn-social btn-social-o youtube mr-1">
                                <i class="fa fa-youtube"></i>
                            </button>
                        </p>
                        <br>
                        <h4 class="footer-title">newsletter</h4>
                        <!-- Form Newsletter -->

                        <div class="widget__form-newsletter ">
                            <p>

                                Don’t miss to subscribe to our news feeds, kindly fill the form below
                            </p>

                            {{ Form::open(['route' => 'newsletter.store',  'method' => 'POST', 'class' => 'mt-3']) }}
                            @csrf
                                {{ Form::email('email', '', ['class' => 'form-control mb-2', 'placeholder' => 'Your Email Address']) }}
                                {{ Form::submit('Subscribe', ['class' => 'btn btn-primary btn-block text-capitalize']) }}
                            {{ Form::close() }}
                            </div>
                        </div>

                    </div>
                   
                </div>
                <!-- END NEWSLETTER -->
            </div>

        </div>
    </div>

    <!-- Footer Bottom -->
    <div class="bg__footer-bottom ">
        <div class="container">
            <div class="row flex-column-reverse flex-md-row">
                <div class="col-md-6">
                    <span>
                        &copy; 2021 | Powered By <a href="https://www.lightningitsolution.pk" target="_blank">Lightning It Solution</a>
                    </span>
                </div>
                <div class="col-md-6">
                    <ul class="list-inline ">
                        @foreach ($sharedPages as $key => $page)
                        <li class="list-inline-item">
                            @if ($key > 0) / @endif
                            <a href="{{ route('page', $page->slug) }}"> {{ $page->title }} </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- End Footer  -->
<!-- END FOOTER -->
