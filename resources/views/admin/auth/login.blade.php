@extends('admin.layouts.auth')

@section('content')
<div class="account-pages mt-5 mb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="text-center">
                    {{-- <a href="" class="logo">
                        <img src="{{ asset('backend/images/logo-sm.png') }}" alt="" height="22" class="logo-light mx-auto">
                       <img src="{{ asset('backend/images/logo-dark.png') }}" alt="" height="22" class="logo-dark mx-auto">
                    </a> --}}
                    <p class="text-muted mt-2 mb-4">Al Harmain Dashboard</p>
                </div>
                <div class="card">

                    <div class="card-body p-4">

                        <div class="text-center mb-4">
                            <h4 class="text-uppercase mt-0">Sign In</h4>
                        </div>

                        <form method="POST" action="{{ route('admin.login') }}">
                            @csrf

                            <div class="form-group mb-3">
                                <label for="emailaddress">Email address</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Enter your email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="password">Password</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Enter your password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <div class="form-check">

                                </div>

                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="custom-control-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>

                            <div class="form-group mb-0 text-center">
                                <button class="btn btn-primary btn-block" type="submit"> Log In </button>
                            </div>

                        </form>
                        <p class="mt-3 mb-0 text-center">
                            @if (Route::has('password.request'))
                                <a class="text-muted ml-1" href="{{ route('password.request') }}">
                                    <i class="fa fa-lock mr-1"></i>{{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </p>

                    </div> <!-- end card-body -->
                </div>
                <!-- end card -->

            </div> <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>
<!-- end page -->



@endsection
