@extends('frontend.layouts.app')
@section('hero')
<section id="hero" class="d-flex align-items-center" style="background-size: cover; background-image: url('{{ asset('assets/frontend/img/hero-tour-package.jpg')}}');">
    <div class="container" data-aos="zoom-out" data-aos-delay="100">
        <h1 class="text-white">Paket Wisata Piknik<span>In.</span></h1>
        <p class="my-3 text-white">Paket wisata PiknikIn merupakan lorem ipsum dolor sit amet consectetur adipisicing elit. Quod sequi cumque veniam eius autem corporis numquam, odio enim amet cum totam explicabo voluptas ducimus facere eos distinctio, dolore error quasi?</p>
    </div>
</section>
@endsection
@section('content')
<section id="custom-packet" class="custom-packet section-bg">
    <div class="container" data-aos="fade-up">
        <div class="row mt-3">
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                <div class="custom-card-packet">
                    <div class="custom-card-packet-img">
                        <div style="height: 250px;">
                            <img src="{{asset('assets/upload/packet/kawah-ijen.jpeg')}}" class="img-fluid w-100 h-100" alt="">
                        </div>
                        <div class="social">
                            <a href="{{url('/tour-package/detail')}}"><i class="bi bi-eye"></i></a>
                        </div>
                    </div>
                    <div class="custom-card-packet-info">
                        <h4>Paket Wisata 4 Hari 3 Malam</h4>
                        <span>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellendus, alias?</span>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
                <div class="custom-card-packet">
                    <div class="custom-card-packet-img">
                        <div style="height: 250px;">
                            <img src="{{asset('assets/upload/packet/baluran.jpg')}}" class="img-fluid w-100 h-100" alt="">
                        </div>
                        <div class="social">
                            <a href="{{url('/tour-package/detail')}}"><i class="bi bi-eye"></i></a>
                        </div>
                    </div>
                    <div class="custom-card-packet-info">
                        <h4>Paket Wisata 3 Hari 2 Malam</h4>
                        <span>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellendus, alias?</span>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300">
                <div class="custom-card-packet">
                    <div class="custom-card-packet-img">
                        <div style="height: 250px;">
                            <img src="{{asset('assets/upload/packet/dialoog.jpg')}}" class="img-fluid w-100 h-100" alt="">
                        </div>
                        <div class="social">
                            <a href="{{url('/tour-package/detail')}}"><i class="bi bi-eye"></i></a>
                        </div>
                    </div>
                    <div class="custom-card-packet-info">
                        <h4>Paket Wisata 2 Hari 1 Malam</h4>
                        <span>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellendus, alias?</span>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300">
                <div class="custom-card-packet">
                    <div class="custom-card-packet-img">
                        <div style="height: 250px;">
                            <img src="{{asset('assets/upload/packet/dialoog.jpg')}}" class="img-fluid w-100 h-100" alt="">
                        </div>
                        <div class="social">
                            <a href="{{url('/tour-package/detail')}}"><i class="bi bi-eye"></i></a>
                        </div>
                    </div>
                    <div class="custom-card-packet-info">
                        <h4>Paket Wisata 2 Hari 1 Malam</h4>
                        <span>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellendus, alias?</span>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
                <div class="custom-card-packet">
                    <div class="custom-card-packet-img">
                        <div style="height: 250px;">
                            <img src="{{asset('assets/upload/packet/baluran.jpg')}}" class="img-fluid w-100 h-100" alt="">
                        </div>
                        <div class="social">
                            <a href="{{url('/tour-package/detail')}}"><i class="bi bi-eye"></i></a>
                        </div>
                    </div>
                    <div class="custom-card-packet-info">
                        <h4>Paket Wisata 3 Hari 2 Malam</h4>
                        <span>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellendus, alias?</span>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                <div class="custom-card-packet">
                    <div class="custom-card-packet-img">
                        <div style="height: 250px;">
                            <img src="{{asset('assets/upload/packet/kawah-ijen.jpeg')}}" class="img-fluid w-100 h-100" alt="">
                        </div>
                        <div class="social">
                            <a href="{{url('/tour-package/detail')}}"><i class="bi bi-eye"></i></a>
                        </div>
                    </div>
                    <div class="custom-card-packet-info">
                        <h4>Paket Wisata 4 Hari 3 Malam</h4>
                        <span>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellendus, alias?</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection