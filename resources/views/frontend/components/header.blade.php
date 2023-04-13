<header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">
        <h1 class="logo">
            <img src="{{asset('assets/frontend/img/apple-touch-icon.png')}}" alt="logo">
            <a href="{{url('/')}}">Piknik<span>In.</span></a>
        </h1>
        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto @if (Request::segment(1) == '') active @endif" href="{{url('/')}}">Beranda</a></li>
                <li><a class="nav-link scrollto @if (Request::segment(1) == 'rental') active @endif"" href="{{url('/rental')}}">Rental Kendaraan</a></li>
                <li><a class="nav-link scrollto @if (Request::segment(1) == 'tour-packages') active @endif"" href="{{url('/tour-packages')}}">Paket Wisata</a></li>
                <li><a class="nav-link scrollto @if (Request::segment(1) == 'promo') active @endif"" href="{{url('/promo')}}">Promo</a></li>
                <li><a class="nav-link scrollto @if (Request::segment(1) == 'article') active @endif"" href="{{url('/article')}}">Artikel</a></li>
                <li><a class="nav-link scrollto @if (Request::segment(1) == 'about-us') active @endif"" href="{{url('/about-us')}}">Tentang Kami</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
    </div>
</header>