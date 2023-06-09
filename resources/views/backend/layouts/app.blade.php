<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Piknikin | Admin</title>
        <link href="{{asset('assets/backend/dashboard/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <link href="{{asset('assets/backend/dashboard/css/sb-admin-2.min.css')}}" rel="stylesheet">

        <link href="{{ asset('assets/frontend/img/favicon.png') }}" rel="icon">
        <link href="{{ asset('assets/frontend/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

        @yield('extraCSS')
    </head>
    <body id="page-top">
        <div id="wrapper">
            @include('backend.components.sidebar')
            <div id="content-wrapper" class="d-flex flex-column">
                <div id="content">
                    @include('backend.components.topbar')
                    <div class="container-fluid">
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h4 mb-0 text-gray-800" style="text-shadow: 2px 2px 4px #b8b8b8;">@yield('onPage')</h1>
                        </div>
                        <div class="row">
                            @if (session('status'))
                                <div class="alert alert-success sb-alert-icon m-3 w-100" role="alert">
                                    <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                    <div class="sb-alert-icon-content">
                                        {{session('status')}}
                                    </div>
                                </div>
                            @elseif (session('error'))
                                <div class="alert alert-danger sb-alert-icon m-3 w-100" role="alert">
                                    <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                    <div class="sb-alert-icon-content">
                                        {{session('error')}}
                                    </div>
                                </div>
                            @endif
                        </div>
                        @yield('content')
                    </div>
                </div>
            @include('backend.components.footer')
            </div>
        </div>

        @include('backend.components.scrollTop')
        @include('backend.components.logout')
        
        <script src="{{asset('assets/backend/dashboard/vendor/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('assets/backend/dashboard/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('assets/backend/dashboard/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
        <script src="{{asset('assets/backend/dashboard/js/sb-admin-2.min.js')}}"></script>
        
        @yield('extraJS')
    </body>
</html>