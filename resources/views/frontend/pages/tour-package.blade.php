@extends('frontend.layouts.app')
@section('hero')
<section id="hero" class="d-flex align-items-center" style="background-size: cover; background-image: url('{{ asset('assets/frontend/img/hero-tour-package.jpg')}}');">
    <div class="container" data-aos="zoom-out" data-aos-delay="100">
        <h1 class="text-white">Paket Wisata Piknik<span>In.</span></h1>
        <p class="my-3 text-white">Piknikin Banyuwangi menyediakan banyak paket wisata dengan berbagai macam fasilitas dan beragam destinasi unggulan yang ada di Banyuwangi. Paket-paket ini telah di susun sesuai dengan pengalaman-pengalaman berwisata yang menarik, mau pilih paket yang manapun, sesuaikan dengan kebutuhan dan minat Anda!</p>
    </div>
</section>
@endsection
@section('content')
<section id="custom-packet" class="custom-packet section-bg">
    <div class="container" data-aos="fade-up">
        <div class="row mt-3">
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
    </div>
</section>
@endsection