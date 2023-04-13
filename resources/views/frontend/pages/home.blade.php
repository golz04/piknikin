@extends('frontend.layouts.app')
@section('extraCSS')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/magnific-popup@1.1.0/dist/magnific-popup.css">
@endsection
@section('hero')
<section id="hero" class="d-flex align-items-center">
    <video id="custom-bg-video" autoplay loop muted>
        <source src="{{asset('assets/frontend/video/pesona-indonesia-banyuwangi-hd.mp4')}}" type="video/mp4">
    </video>

    <div class="container" data-aos="zoom-out" data-aos-delay="100">
        <h1 class="text-white">Selamat Datang di Piknik<span>In.</span></h1>
        <p class="my-3 text-white">PiknikIn merupakan lorem ipsum dolor sit amet consectetur adipisicing elit. Quod sequi cumque veniam eius autem corporis numquam, odio enim amet cum totam explicabo voluptas ducimus facere eos distinctio, dolore error quasi?</p>
        <div class="d-flex">
            <a href="{{url('/about-us')}}" class="btn-get-started scrollto">Tentang Kami</a>
            <a href="https://www.youtube.com/watch?v=4JxEhPaDbWM" class="glightbox btn-watch-video text-white"><i class="bi bi-play-circle"></i><span>Tentang Banyuwangi</span></a>
        </div>
    </div>
</section>
@endsection
@section('content')
<section id="custom-reason" class="custom-reason">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h2>#Tentang-Kami</h2>
            <h3>Alasan Mengapa Kamu Memilih <span>Kami</span></h3>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Earum, aliquid. Aut magnam cumque eaque voluptatem atque, nihil suscipit?.</p>
        </div>

        <div class="row">
            <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                    <div class="icon">
                        <i class="bx bxl-dribbble"></i>
                    </div>
                    <h4 class="title">
                        <span>Legalitas & Terpercaya</span>
                    </h4>
                    <p class="description">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Suscipit, mollitia.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
                    <div class="icon">
                        <i class="bx bx-file"></i>
                    </div>
                    <h4 class="title">
                        <span>Sesuai Kebutuhan Anda</span>
                    </h4>
                    <p class="description">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ducimus, mollitia.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
                    <div class="icon">
                        <i class="bx bx-tachometer"></i>
                    </div>
                    <h4 class="title">
                        <span>Spesialis Trip</span>
                    </h4>
                    <p class="description">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ducimus, mollitia.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                <div class="icon-box" data-aos="fade-up" data-aos-delay="400">
                    <div class="icon">
                        <i class="bx bx-world"></i>
                    </div>
                    <h4 class="title">
                        <span>Pelayanan Terbaik</span>
                    </h4>
                    <p class="description">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ducimus, mollitia.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="custom-packet" class="custom-packet section-bg">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h2>#Paket-Wisata</h2>
            <h3>Paket Wisata Yang Ditawarkan Piknik<span>In.</span></h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Est reprehenderit ipsum illo aperiam deleniti eligendi nobis quisquam, architecto velit corporis voluptatum in. Laboriosam odit voluptates, ex veniam ut rerum veritatis.</p>
        </div>

        <div class="row">
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
        </div>

        <div class="row">
            <div class="col-md-12 text-center mt-4">
                <a href="{{url('/tour-packages')}}" class="rounded-2 btn btn-outline-primary m-auto">Selengkapnya...</a>
            </div>
        </div>
    </div>
</section>

<section id="custom-request-trip" class="custom-request-trip">
    <div class="container py-5" data-aos="zoom-in">
        <div class="row">
            <div class="col-md-8 d-flex align-items-center">
                <div>
                    <h3 class="fw-bold" style="text-align: left">Masih Beleum Menemukan Apa Yang Kamu Cari?</h3>
                    <p style="text-align: left">Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore, eaque.</p>
                </div>
            </div>
            <div class="col-md-4 d-flex align-items-center justify-content-center">
                <div>
                    <a href="{{url('/tour-packages/request')}}" class="rounded-2 btn btn-outline-light m-auto">Buat Tripmu Sendiri &nbsp;&nbsp;<i class="bx bx-trip"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="custom-destination">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h2>#Destinasi</h2>
            <h3>Galeri Destinasi Piknik<span>In.</span></h3>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Tempora, in.</p>
        </div>
        
        <div class="row gallery">
            <div class="col-lg-4 col-md-4 col-xs-6 thumb">
                <a href="{{asset('assets/upload/packet/kawah-ijen.jpeg')}}">
                    <figure style="height: 280px;">
                        <img class="img-fluid img-thumbnail h-100" src="{{asset('assets/upload/packet/kawah-ijen.jpeg')}}" alt="Random Image">
                    </figure>
                </a>
            </div>
            <div class="col-lg-4 col-md-4 col-xs-6 thumb ">
                <a href="{{asset('assets/upload/packet/baluran.jpg')}}">
                    <figure style="height: 280px;">
                        <img class="img-fluid img-thumbnail h-100" src="{{asset('assets/upload/packet/baluran.jpg')}}" alt="Random Image">
                    </figure>
                </a>
            </div>
            <div class="col-lg-4 col-md-4 col-xs-6 thumb">
                <a href="{{asset('assets/upload/packet/dialoog.jpg')}}">
                    <figure style="height: 280px;">
                        <img class="img-fluid img-thumbnail h-100" src="{{asset('assets/upload/packet/dialoog.jpg')}}" alt="Random Image">
                    </figure>
                </a>
            </div>
        </div>
    </div>
</section>

<section id="custom-article" class="custom-article section-bg">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h2>#Artikel</h2>
            <h3>Artikel Piknik<span>In.</span></h3>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Consequuntur, nam.</p>
        </div>

        <div class="row">
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                <div class="custom-card-article">
                    <div class="custom-card-article-img">
                        <div style="height: 250px;">
                            <img src="{{asset('assets/upload/packet/kawah-ijen.jpeg')}}" class="img-fluid w-100 h-100" alt="">
                        </div>
                    </div>
                    <div class="custom-card-article-info">
                        <P>APRIL, 2023</P>
                        <h4 style="height: 60px;">Jawa Timur Park 4 Banyuwangi, Wisata Edukasi Budaya Banyuwangi Hingga Museum Santet</h4>
                        <span class="mt-3" style="height: 50px;">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellendus, alias?</span>
                        <a href="{{url('/article/detail')}}" class="btn btn-outline-primary fs-8">Lebih Detail</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
                <div class="custom-card-article">
                    <div class="custom-card-article-img">
                        <div style="height: 250px;">
                            <img src="{{asset('assets/upload/packet/baluran.jpg')}}" class="img-fluid w-100 h-100" alt="">
                        </div>
                    </div>
                    <div class="custom-card-article-info">
                        <P>APRIL, 2023</P>
                        <h4 style="height: 60px;">Banyuwangi Festival 2023, Jadwal Pelaksanaan dan Informasi Terkini</h4>
                        <span class="mt-3" style="height: 50px;">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellendus, alias?</span>
                        <a href="{{url('/article/detail')}}" class="btn btn-outline-primary fs-8">Lebih Detail</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300">
                <div class="custom-card-article">
                    <div class="custom-card-article-img">
                        <div style="height: 250px;">
                            <img src="{{asset('assets/upload/packet/dialoog.jpg')}}" class="img-fluid w-100 h-100" alt="">
                        </div>
                    </div>
                    <div class="custom-card-article-info">
                        <P>APRIL, 2023</P>
                        <h4 style="height: 60px;">Menyambut Banyuwangi Ethno Carnival BEC 2022: Taman Sarine Nusantara</h4>
                        <span class="mt-3" style="height: 50px;">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellendus, alias?</span>
                        <a href="{{url('/article/detail')}}" class="btn btn-outline-primary fs-8">Lebih Detail</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 text-center mt-4">
                <a href="{{url('/article')}}" class="rounded-2 btn btn-outline-primary m-auto">Selengkapnya...</a>
            </div>
        </div>
    </div>
</section>
@endsection
@section('extraJS')
<script src="https://cdn.jsdelivr.net/npm/magnific-popup@1.1.0/dist/jquery.magnific-popup.min.js"></script>
<script>
    $(document).ready(function() {
        $(".gallery").magnificPopup({
            delegate: "a",
            type: "image",
            tLoading: "Loading image #%curr%...",
            mainClass: "mfp-img-mobile",
            gallery: {
                enabled: true,
                navigateByImgClick: true,
                preload: [0, 1] // Will preload 0 - before current, and 1 after the current image
            },
            image: {
                tError: '<a href="%url%">The image #%curr%</a> could not be loaded.'
            }
        });
    });
</script>
@endsection