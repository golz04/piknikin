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
        <p class="my-3 text-white">Selamat datang di Piknikin Banyuwangi! Piknikin Banyuwangi adalah Tour dan Travel terbaik dengan fasilitas terlengkap dan harga terjangkau dengan pelayanan yang ramah serta menyenangkan.</p>
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
            <p>PiknikIn Banyuwangi menghadirkan destinasi wisata yang unik dan berbeda dari yang lain. Kami selalu mencari lokasi yang jarang dikunjungi, sehingga Anda dapat menikmati pengalaman yang segar dan tak terlupakan.</p>
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
                    <p class="description">Kami memiliki izin resmi dan terdaftar sebagai Tour and Travel yang diakui oleh otoritas terkait.</p>
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
                    <p class="description">Kami menawarkan fleksibilitas dalam memilih dan menyesuaikan paket wisata sesuai dengan kebutuhan Anda.</p>
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
                    <p class="description">Kami memiliki pengetahuan mendalam tentang destinasi wisata di daerah ini dan tempat-tempat budaya yang menarik.</p>
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
                    <p class="description">Kami memberikan pelayanan dan perhatian yang maksimal kepada setiap pelanggan kami.</p>
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
            <p>Piknikin Banyuwangi menyediakan banyak paket wisata dengan berbagai macam fasilitas dan beragam destinasi unggulan yang ada di Banyuwangi. Paket-paket ini telah di susun sesuai dengan pengalaman-pengalaman berwisata yang menarik, mau pilih paket yang manapun, sesuaikan dengan kebutuhan dan minat Anda!</p>
        </div>

        <div class="row">
            @forelse ($getPacket as $item)
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="{{$loop->iteration}}00">
                    <div class="custom-card-packet">
                        <div class="custom-card-packet-img">
                            <div style="height: 250px;">
                                <img src="{{asset('assets/upload/packet/'.$item->thumbnail)}}" class="img-fluid w-100 h-100" alt="">
                            </div>
                            <div class="social">
                                <a href="{{url('/tour-packages/detail/'.$item->slug)}}"><i class="bi bi-eye"></i></a>
                            </div>
                        </div>
                        <div class="custom-card-packet-info">
                            <h4>{{$item->title}}</h4>
                            <span>{{ \Illuminate\Support\Str::limit($item->description, 100, $end='...') }}</span>
                        </div>
                    </div>
                </div>
            @empty
            @endforelse
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
                    <p style="text-align: left">Kamu bisa membuat paket wisata impianmu sendiri, ayo segera buat!</p>
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
            <p>Potret wisata, budaya dan alam Banyuwangi dalam kaca Piknikin.</p>
        </div>
        
        <div class="row gallery">
            @forelse ($getDestination as $item)
            <div class="col-lg-4 col-md-4 col-xs-6 thumb" data-aos="fade-up" data-aos-delay="{{$loop->iteration}}00">
                <a href="{{asset('assets/upload/destination/'.$item->image)}}">
                    <figure style="height: 280px;">
                        <img class="img-fluid img-thumbnail h-100" src="{{asset('assets/upload/destination/'.$item->image)}}" alt="Random Image">
                    </figure>
                </a>
            </div>
            @empty
            @endforelse
        </div>
    </div>
</section>

<section id="custom-article" class="custom-article section-bg">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h2>#Artikel</h2>
            <h3>Artikel Piknik<span>In.</span></h3>
            <p>Banyuwangi selalu hadir dengan berita wisata dan budaya terbaru loh, jangan lupa disimak bersama Piknikin!</p>
        </div>

        <div class="row">
            @forelse ($getArticle as $item)
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="{{$loop->iteration}}00">
                <div class="custom-card-article">
                    <div class="custom-card-article-img">
                        <div style="height: 250px;">
                            <img src="{{asset('assets/upload/article/'.$item->thumbnail)}}" class="img-fluid w-100 h-100" alt="">
                        </div>
                    </div>
                    <div class="custom-card-article-info">
                        <P>{{ \Carbon\Carbon::parse($item->created_at)->format('F Y') }}</P>
                        <h4 style="height: 60px;">{{$item->title}}</h4>
                        <span class="mt-3" style="height: 50px;">Lihat artikel berjudul "{{$item->title}}" selengkapnya dengan menekan tombol dibawah.</span>
                        <a href="{{url('/article/detail/'.$item->slug)}}" class="btn btn-outline-primary mt-3 fs-8">Lebih Detail</a>
                    </div>
                </div>
            </div>
            @empty
            @endforelse
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