<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-fw"></i>
                <span class="badge badge-danger badge-counter">{{DB::table('feedbacks')->where('status', 'belum dilihat')->count()}}</span>
            </a>
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                    Pesan Kritik & Saran (belum dibaca)
                </h6>
                <div class="d-none">
                    {{$listFeeds = DB::table('feedbacks')->where('status', 'belum dilihat')->limit(3)->get()}}
                </div>
                @forelse ($listFeeds as $item)
                    <a class="dropdown-item d-flex align-items-center" href="{{url('/admin/feedback')}}">
                        <div>
                            <div class="text-truncate">{{$item->message}}</div>
                            <div class="small text-gray-500">{{$item->email}}</div>
                        </div>
                    </a>
                @empty
                    <a class="dropdown-item d-flex align-items-center" href="{{url('/admin/feedback')}}">
                        <div>
                            <div class="text-truncate py-3">Belum Ada Kritik & Saran</div>
                        </div>
                    </a>
                @endforelse
                <a class="dropdown-item text-center small text-gray-500" href="{{url('/admin/feedback')}}">Tampilkan Lebih Banyak</a>
            </div>
        </li>
        
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="requestDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <span class="badge badge-danger badge-counter">{{DB::table('request_tours')->where('status', 'menunggu')->count()}}</span>
            </a>
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="requestDropdown">
                <h6 class="dropdown-header">
                    Pesan Permintaan Tour (Menunggu)
                </h6>
                <div class="d-none">
                    {{$listFeeds = DB::table('request_tours')->where('status', 'menunggu')->limit(3)->get()}}
                </div>
                @forelse ($listFeeds as $item)
                    <a class="dropdown-item d-flex align-items-center" href="{{url('/admin/request-tour')}}">
                        <div>
                            <div class="text-truncate">{{$item->message}}</div>
                            <div class="small text-gray-500">{{$item->email}}</div>
                        </div>
                    </a>
                @empty
                    <a class="dropdown-item d-flex align-items-center" href="{{url('/admin/request-tour')}}">
                        <div>
                            <div class="text-truncate py-3">Belum Ada Request Tour</div>
                        </div>
                    </a>
                @endforelse
                <a class="dropdown-item text-center small text-gray-500" href="{{url('/admin/request-tour')}}">Tampilkan Lebih Banyak</a>
            </div>
        </li>

        <div class="topbar-divider d-none d-sm-block"></div>
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{auth()->user()->name}}</span>
                <img class="img-profile rounded-circle" src="{{asset('assets/frontend/img/apple-touch-icon.png')}}">
            </a>
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                {{-- <a class="dropdown-item" href="{{url('/back-profile')}}">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profil
                </a>
                <div class="dropdown-divider"></div> --}}
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Keluar
                </a>
            </div>
        </li>

    </ul>

</nav>