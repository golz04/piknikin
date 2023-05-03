@extends('frontend.layouts.app')
@section('hero')
<section id="hero" class="d-flex align-items-center" style="background-size: cover; background-image: url('{{ asset('assets/frontend/img/hero-bg.jpg')}}');">
    <div class="container" data-aos="zoom-out" data-aos-delay="100">
        <h1 class="text-white">Tentang Piknik<span>In.</span></h1>
        <p class="my-3 text-white">PiknikIn merupakan lorem ipsum dolor sit amet consectetur adipisicing elit. Quod sequi cumque veniam eius autem corporis numquam, odio enim amet cum totam explicabo voluptas ducimus facere eos distinctio, dolore error quasi?</p>
    </div>
</section>
@endsection
@section('content')
<section id="custom-request-trip">
    <div class="container py-5" data-aos="zoom-in">
        <div class="row">
            <div class="col-md-8 d-flex align-items-center">
                <div>
                    <h3 class="fw-bold" style="text-align: left">Mau Tau Tentang Piknikin Lebih Detail Lagi?</h3>
                    <p style="text-align: left">Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis ipsa repellendus ullam consectetur! Vero ab a assumenda in eum, quas magni reiciendis illo aut praesentium inventore, iste autem quidem magnam explicabo nesciunt numquam ullam excepturi dolorem id, nemo laborum officia delectus dignissimos. Amet commodi quisquam, laboriosam consectetur et esse ullam.</p>
                    <p style="text-align: left">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repellendus esse deleniti saepe consectetur harum itaque doloremque ducimus omnis commodi, iusto hic assumenda laborum, nam suscipit earum, ut aspernatur! Sit animi quibusdam eos. Facilis, tempora saepe? Asperiores minima velit fuga nisi tenetur tempore sit deleniti dolorem facere quos saepe, quae illo doloremque ut necessitatibus, repellat repudiandae illum beatae molestias! Nostrum tenetur cupiditate dolorem enim ab maxime quaerat in accusamus magnam, aliquam aspernatur asperiores quidem ducimus totam incidunt. Culpa, laboriosam et dicta obcaecati dolorem in! Distinctio consequatur cumque est tempore ab quibusdam laudantium, voluptatibus molestiae laboriosam iure id nihil, placeat aspernatur recusandae voluptate reiciendis repudiandae tempora aliquid eveniet quod natus reprehenderit, pariatur consequuntur commodi. Sunt cupiditate voluptatibus cumque necessitatibus, repudiandae quas, excepturi dolores pariatur quae dolor quisquam, praesentium impedit quo itaque tempora expedita recusandae culpa nam molestiae natus ab placeat quos accusamus? Voluptatum tenetur omnis qui inventore. Praesentium eius perspiciatis temporibus enim obcaecati aliquam fugit cupiditate nisi aliquid sapiente necessitatibus ad ipsum blanditiis sint minima sunt, libero non, minus magnam! Nisi consectetur, nam placeat incidunt distinctio cumque amet, animi suscipit officiis sint sed sapiente cum velit ullam magni porro. Quaerat, sint commodi excepturi, saepe quibusdam similique deserunt facere magni voluptatem minus dolorem.</p>
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
                @foreach ($getTestimonial as $item)
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
                @endforeach
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
            <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.</p>
        </div>
        <div class="row" data-aos="fade-up" data-aos-delay="100">
            <div class="col-lg-6">
                <div class="info-box mb-4">
                    <i class="bx bx-map"></i>
                    <h3>Alamat Kami</h3>
                    <p>Perum Mastrip Blok P No 4, 62161 Indonesia</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="info-box  mb-4">
                    <i class="bx bx-envelope"></i>
                    <h3>Surel Kami</h3>
                    <p>piknikin@gmail.com</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="info-box  mb-4">
                    <i class="bx bx-phone-call"></i>
                    <h3>Nomor Telepon</h3>
                    <p>+62 812 5999 5788</p>
                </div>
            </div>
        </div>
        <div class="row" data-aos="fade-up" data-aos-delay="100">
            <div class="col-lg-6 ">
                <iframe class="mb-4 mb-lg-0" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15795.733718748328!2d114.3738107!3d-8.2094498!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd145fe8d8ad845%3A0xc19d0e217f5ccb7b!2sAlun%20Alun%20Kota%20Banyuwangi!5e0!3m2!1sid!2sid!4v1681402872220!5m2!1sid!2sid" frameborder="0" style="border:0; width: 100%; height: 384px;" allowfullscreen></iframe>
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