<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/back-dash">
        <div class="sidebar-brand-icon rotate-n-15">
        <i><img src="{{asset('assets/frontend/img/apple-touch-icon.png')}}" style="width: 70%;" alt="Logo"></i>
        </div>
        <div class="sidebar-brand-text mr-4">PiknikIn</div>
    </a>
    
    <hr class="sidebar-divider my-0">
    <li class="nav-item @if (Request::segment(2) == 'dashboard') active @endif">
        <a class="nav-link" href="{{url('/admin/dashboard')}}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Master Web
    </div>
    <li class="nav-item @if (Request::segment(2) == 'rental') active @endif">
        <a class="nav-link @if (Request::segment(2) == 'rental') collapsed @endif" href="#" data-toggle="collapse" data-target="#collapseRental" aria-expanded="true" aria-controls="collapseRental">
            <i class="fas fa-fw fa-car"></i><span>Rental</span>
        </a>
        <div id="collapseRental" class="collapse @if (Request::segment(2) == 'rental') show @endif" aria-labelledby="headingRental" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Menu Rental:</h6>
                <a class="collapse-item @if (Request::segment(3) == 'list-rental') active @endif" href="{{url('/admin/rental/list-rental')}}">List Rental</a>
                <a class="collapse-item @if (Request::segment(3) == 'list-gallery-rental') active @endif" href="{{url('/admin/rental/list-gallery-rental')}}">Galeri Rental</a>
                <a class="collapse-item @if (Request::segment(3) == 'list-rating-rental') active @endif" href="{{url('/admin/rental/list-rating-rental')}}">Rating Rental</a>
            </div>
        </div>
    </li>
    <li class="nav-item @if (Request::segment(2) == 'packet') active @endif">
        <a class="nav-link @if (Request::segment(2) == 'packet') collapsed @endif" href="#" data-toggle="collapse" data-target="#collapsePacket" aria-expanded="true" aria-controls="collapsePacket">
            <i class="fas fa-fw fa-box"></i><span>Paket</span>
        </a>
        <div id="collapsePacket" class="collapse @if (Request::segment(2) == 'packet') show @endif" aria-labelledby="headingPacket" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Menu Paket:</h6>
                <a class="collapse-item @if (Request::segment(3) == 'list-packet') active @endif" href="{{url('/admin/packet/list-packet')}}">List Paket</a>
                <a class="collapse-item @if (Request::segment(3) == 'list-gallery-packet') active @endif" href="{{url('/admin/packet/list-gallery-packet')}}">Galeri Paket</a>
                <a class="collapse-item @if (Request::segment(3) == 'list-rating-packet') active @endif" href="{{url('/admin/packet/list-rating-packet')}}">Rating Paket</a>
            </div>
        </div>
    </li>
    <li class="nav-item @if (Request::segment(2) == 'article') active @endif">
        <a class="nav-link @if (Request::segment(2) == 'article') collapsed @endif" href="#" data-toggle="collapse" data-target="#collapseArticle" aria-expanded="true" aria-controls="collapseArticle">
            <i class="fas fa-fw fa-info"></i><span>Artikel</span>
        </a>
        <div id="collapseArticle" class="collapse @if (Request::segment(2) == 'article') show @endif" aria-labelledby="headingArticle" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Menu Artikel:</h6>
                <a class="collapse-item @if (Request::segment(3) == 'list-article') active @endif" href="{{url('/admin/article/list-article')}}">List Artikel</a>
                <a class="collapse-item @if (Request::segment(3) == 'list-comment-article') active @endif" href="{{url('/admin/article/list-comment-article')}}">Komentar Artikel</a>
            </div>
        </div>
    </li>
    <li class="nav-item @if (Request::segment(2) == 'promo') active @endif">
        <a class="nav-link @if (Request::segment(2) == 'promo') collapsed @endif" href="#" data-toggle="collapse" data-target="#collapsePromo" aria-expanded="true" aria-controls="collapsePromo">
            <i class="fas fa-fw fa-certificate"></i><span>Promo</span>
        </a>
        <div id="collapsePromo" class="collapse @if (Request::segment(2) == 'promo') show @endif" aria-labelledby="headingPromo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Menu Promo:</h6>
                <a class="collapse-item @if (Request::segment(3) == 'list-promo') active @endif" href="{{url('/admin/promo/list-promo')}}">List Promo</a>
                <a class="collapse-item @if (Request::segment(3) == 'gallery-promo') active @endif" href="{{url('/admin/promo/list-gallery-promo')}}">Komentar Promo</a>
            </div>
        </div>
    </li>
    <li class="nav-item @if (Request::segment(2) == 'testimonial') active @endif">
        <a class="nav-link" href="{{url('/admin/testimonial')}}">
        <i class="fas fa-fw fa-comments"></i>
        <span>Testimoni</span></a>
    </li>
    <li class="nav-item @if (Request::segment(2) == 'feedback') active @endif">
        <a class="nav-link" href="{{url('/admin/feedback')}}">
        <i class="fas fa-fw fa-exchange-alt"></i>
        <span>Kritik & Saran</span></a>
    </li>
    <li class="nav-item @if (Request::segment(2) == 'request-tour') active @endif">
        <a class="nav-link" href="{{url('/admin/request-tour')}}">
        <i class="fas fa-fw fa-clipboard"></i>
        <span>Request Tour</span></a>
    </li>
    <li class="nav-item @if (Request::segment(2) == 'destination') active @endif">
        <a class="nav-link" href="{{url('/admin/destination')}}">
        <i class="fas fa-fw fa-map"></i>
        <span>Destinasi</span></a>
    </li>
    
    <!-- Divider -->
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Akun
    </div>
    <li class="nav-item @if (Request::segment(2) == 'account') active @endif">
        <a class="nav-link" href="{{url('/admin/account')}}">
        <i class="fas fa-fw fa-users"></i>
        <span>Admin</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>