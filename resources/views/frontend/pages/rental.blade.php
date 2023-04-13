@extends('frontend.layouts.app')
@section('hero')
<section id="hero" class="d-flex align-items-center" style="background-size: cover; background-image: url('{{ asset('assets/frontend/img/hero-rental.jpg')}}');">
    <div class="container" data-aos="zoom-out" data-aos-delay="100">
        <h1 class="text-white">Rental Kendaraan Piknik<span>In.</span></h1>
        <p class="my-3 text-white">Rental kendaraan PiknikIn merupakan lorem ipsum dolor sit amet consectetur adipisicing elit. Quod sequi cumque veniam eius autem corporis numquam, odio enim amet cum totam explicabo voluptas ducimus facere eos distinctio, dolore error quasi?</p>
    </div>
</section>
@endsection
@section('content')
<section id="portfolio" class="portfolio section-bg">
    <div class="container" data-aos="fade-up">
        <div class="row portfolio-container mt-4" data-aos="fade-up" data-aos-delay="100">
            <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                <img src="{{asset('assets/upload/banner-rental/rental-mobil.jpg')}}" class="img-fluid shadow rounded w-100" alt="">
                <div class="portfolio-info">
                    <h4>Sewa Mobil</h4>
                    <p>Harga Mulai : Rp.200.000</p>
                    <a href="{{url('/rental/detail')}}" class="portfolio-lightbox preview-link" title="Web 3"><i class="bi bi-eye"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                <img src="{{asset('assets/upload/banner-rental/rental-motor.webp')}}" class="img-fluid shadow rounded w-100" alt="">
                <div class="portfolio-info">
                    <h4>Sewa Sepeda Motor</h4>
                    <p>Harga Mulai : Rp.100.000</p>
                    <a href="{{url('/rental/detail')}}" class="portfolio-lightbox preview-link" title="Web 3"><i class="bi bi-eye"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                <img src="{{asset('assets/upload/banner-rental/rental-travel.jpg')}}" class="img-fluid shadow rounded w-100" alt="">
                <div class="portfolio-info">
                    <h4>Sewa Travel</h4>
                    <p>Harga Mulai : Rp.100.000</p>
                    <a href="{{url('/rental/detail')}}" class="portfolio-lightbox preview-link" title="Web 3"><i class="bi bi-eye"></i></a>
                </div>
            </div>  
            <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                <img src="{{asset('assets/upload/banner-rental/rental-bus.jpg')}}" class="img-fluid shadow rounded w-100" alt="">
                <div class="portfolio-info">
                    <h4>Sewa Bus</h4>
                    <p>Harga Mulai : Rp.100.000</p>
                    <a href="{{url('/rental/detail')}}" class="portfolio-lightbox preview-link" title="Web 3"><i class="bi bi-eye"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                <img src="{{asset('assets/upload/banner-rental/rental-elf.jpg')}}" class="img-fluid shadow rounded w-100" alt="">
                <div class="portfolio-info">
                    <h4>Sewa Elf</h4>
                    <p>Harga Mulai : Rp.100.000</p>
                    <a href="{{url('/rental/detail')}}" class="portfolio-lightbox preview-link" title="Web 3"><i class="bi bi-eye"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                <img src="{{asset('assets/upload/banner-rental/rental-elf.jpg')}}" class="img-fluid shadow rounded w-100" alt="">
                <div class="portfolio-info">
                    <h4>Sewa Elf</h4>
                    <p>Harga Mulai : Rp.100.000</p>
                    <a href="{{url('/rental/detail')}}" class="portfolio-lightbox preview-link" title="Web 3"><i class="bi bi-eye"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection