@extends('frontend.layouts.app')
@section('hero')
<section id="hero" class="d-flex align-items-center" style="background-size: cover; background-image: url('{{ asset('assets/frontend/img/hero-bg.jpg')}}');">
    <div class="container" data-aos="zoom-out" data-aos-delay="100">
        <h1 class="text-white">Tentang Piknik<span>In.</span></h1>
        <p class="my-3 text-white">Selamat datang di PiknikIn Banyuwangi! Piknikin Banyuwangi adalah Tour dan Travel terbaik dengan fasilitas terlengkap dan harga terjangkau dengan pelayanan yang ramah serta menyenangkan.</p>
    </div>
</section>
@endsection
@section('content')
<section id="custom-request-trip">
    <div class="container py-5" data-aos="zoom-in">
        <div class="row">
            <div class="col-md-8 d-flex align-items-center">
                <div>
                    <h3 class="fw-bold" style="text-align: left">Mau Tau Tentang PiknikIn Lebih Detail Lagi?</h3>
                    <p style="text-align: left">Selamat datang di PiknikIn Banyuwangi! PiknikIn Banyuwangi adalah Tour dan Travel terbaik dengan fasilitas terlengkap dan harga terjangkau dengan pelayanan yang ramah serta menyenangkan. PiknikIn Banyuwangi siap melayani berbagai kebutuhan wisata Anda, seperti paket liburan, outbond, event atau wisata untuk berbagai kalangan baik perseorangan, pasangan, grup, keluarga, hingga organisasi dan juga menyediakan berbagai kebutuhan perjalanan dengan banyak variasi transportasi yang tersedia. Dapatkan pelayanan berlibur ke Banyuwangi dengan beraneka ragam pilihan destinasi wisata dan pemilihan paket tour yang ada di PiknikIn Banyuwangi. Ingin mendapat pengalaman perjalanan wisata terbaik? atau ingin mendapat pengalaman Piknik terbaik? Datang ke Banyuwangi anda pasti ingin kembali bersama PiknikIn Banyuwangi!</p>
                    <p style="text-align: left">Piknikin Banyuwangi adalah Tour dan Travel dengan fasilitas terlengkap dan harga terjangkau berdiri dibawah naungan PT.Trans Wangi Lestari. Berdiri sejak tahun 2017, Piknikin Banyuwangi telah berhasil melayani berbagai wisatawan baik dari lokal maupun internasional.</p>
                </div>
            </div>
            <div class="col-md-4 d-flex align-items-center justify-content-center">
                <div>
                    <img src="{{asset('assets/frontend/img/apple-touch-icon.png')}}" alt="">
                </div>
            </div>
        </div>
    </div>
</section>

<section id="testimonials" class="testimonials">
    <div class="container" data-aos="zoom-in">
        <div class="section-title">
            <h2>#Ulasan</h2>
            <h3 class="text-white">Kata Mereka</h3>
        </div>
        <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
            <div class="swiper-wrapper">
                @forelse($getTestimonial as $item)
                <div class="swiper-slide">
                    <div class="testimonial-item">
                        <img src="{{asset('assets/upload/testimonial/'.$item->avatar)}}" class="testimonial-img" alt="">
                        <h3>{{$item->name}}</h3>
                        <h4>{{$item->job}}</h4>
                        <p>
                            <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                            {{$item->message}}
                            <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                        </p>
                    </div>
                </div>
                @empty
                <div class="swiper-slide">
                    <div class="testimonial-item">
                        <p>
                            <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                            Belum ada Ulasan.
                            <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                        </p>
                    </div>
                </div>
                @endforelse
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>

<section id="contact" class="contact section-bg">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h2>#Kontak</h2>
            <h3><span>Hubungi Kami</span></h3>
            <p>Jika masih banyak pertanyaan yang ingin diajukan silahkan hubungi kami dengan kontak dibawah ini.</p>
        </div>
        <div class="row" data-aos="fade-up" data-aos-delay="100">
            <div class="col-lg-6">
                <div class="info-box mb-4">
                    <i class="bx bx-map"></i>
                    <h3>Alamat Kami</h3>
                    <p>Perumahan Green Brawijaya, B-03, Banyuwangi, Jawa Timur 68417, Indonesia </p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="info-box  mb-4">
                    <i class="bx bx-envelope"></i>
                    <h3>Surel Kami</h3>
                    <p>transwangilestari@gmail.com</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="info-box  mb-4">
                    <i class="bx bx-phone-call"></i>
                    <h3>Nomor Telepon</h3>
                    <p>+62 821 4311 0959</p>
                </div>
            </div>
        </div>
        <div class="row" data-aos="fade-up" data-aos-delay="100">
            <div class="col-lg-6 ">
                <iframe class="mb-4 mb-lg-0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3948.719126494129!2d114.3475869758294!3d-8.230974082635598!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd15ab0ef7ee507%3A0xebac3098b725db04!2sPerumahan%20Green%20Brawijaya!5e0!3m2!1sid!2sid!4v1684672098559!5m2!1sid!2sid" frameborder="0" style="border:0; width: 100%; height: 384px;" allowfullscreen></iframe>
            </div>
            <div class="col-lg-6">
                <form action="{{url('/about-us/feedback/send')}}" method="post" role="form" class="php-email-form">
                    @csrf
                    <div class="row">
                        <div class="col form-group">
                            <label style="font-size: 11pt; margin-left: 3px; margin-bottom: 3px;" for="full_name">Nama Lengkap :</label>
                            <input type="text" name="full_name" class="form-control @error('full_name') is-invalid @enderror" id="full_name" placeholder="Nama Lengkap" value="{{old('full_name')}}">
                            @error('full_name')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="col form-group">
                            <label style="font-size: 11pt; margin-left: 3px; margin-bottom: 3px;" for="email">Surel :</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Surel" value="{{old('email')}}">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col form-group">
                        <label style="font-size: 11pt; margin-left: 3px; margin-bottom: 3px;" for="feedback">Kritik dan Saran :</label>
                        <input type="text" name="feedback" class="form-control @error('feedback') is-invalid @enderror" id="feedback" placeholder="Kritik dan Saran" value="{{old('feedback')}}">
                        @error('feedback')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label style="font-size: 11pt; margin-left: 3px; margin-bottom: 3px;" for="message">Komentar :</label>
                        <textarea class="form-control @error('message') is-invalid @enderror" name="message" rows="5" placeholder="Komentar...">{{old('message')}}</textarea>
                        @error('message')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    
                    <div class="text-center"><button type="submit">Send Message</button></div>
                </form>
            </div>
        </div>
    </div>
</section>
@include('sweetalert::alert')
@endsection