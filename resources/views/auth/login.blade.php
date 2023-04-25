{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="no-js">
<head>
	<title>Login PiknikIn</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" type="text/css" href="{{asset('assets/backend/login/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/backend/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/backend/login/vendor/animate/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/backend/login/vendor/css-hamburgers/hamburgers.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/backend/login/vendor/select2/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/backend/login/css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/backend/login/css/main.css')}}">

    <link href="{{ asset('assets/frontend/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('assets/frontend/img/apple-touch-icon.png') }}" rel="apple-touch-icon">
</head>
<body>
	<div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="{{asset('assets/frontend/img/favicon.png')}}" alt="IMG">
                </div>
                <form class="login100-form validate-form" method="POST" action="{{route('login')}}">
                    @csrf
                    <span class="login100-form-title">PiknikIn Login</span>
                    <div class="wrap-input100 validate-input" data-validate="Valid username is required">
                        <input class="input100" type="email" name="email" placeholder="Surel">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input class="input100" type="password" name="password" placeholder="Kata Sandi">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100"> <i class="fa fa-lock" aria-hidden="true"></i></span>
                    </div>
                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" type="submit">
                            Login
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

	<script src="{{asset('assets/backend/login/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('assets/backend/login/vendor/bootstrap/js/popper.js')}}"></script>
    <script src="{{asset('assets/backend/login/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/backend/login/vendor/select2/select2.min.js')}}"></script>
    <script src="{{asset('assets/backend/login/vendor/tilt/tilt.jquery.min.js')}}"></script>
    <script >
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>
    <script src="{{asset('assets/backend/login/js/main.js')}}"></script>
</body>
</html>