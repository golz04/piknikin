@extends('frontend.layouts.app')
@section('hero')
<section id="hero" class="d-flex align-items-center" style="background-size: cover; background-image: url('{{ asset('assets/frontend/img/hero-promo.jpg')}}');">
    <div class="container" data-aos="zoom-out" data-aos-delay="100">
        <h1 class="text-white">Promo Di Piknik<span>In.</span></h1>
        <p class="my-3 text-white">Promo PiknikIn merupakan lorem ipsum dolor sit amet consectetur adipisicing elit. Quod sequi cumque veniam eius autem corporis numquam, odio enim amet cum totam explicabo voluptas ducimus facere eos distinctio, dolore error quasi?</p>
    </div>
</section>
@endsection
@section('content')
<section id="custom-packet" class="custom-packet section-bg">
    <div class="container" data-aos="fade-up">
        <div class="row">
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="text-center" style="height: 90px;">
                            <strong>Temukan Promo Menarik Disini</strong>
                        </h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <article class="postcard light blue">
                            <div class="postcard__text t-dark">
                                <h1 class="postcard__title blue"><a href="#">Podcast Title</a></h1>
                                <div class="postcard__subtitle small">
                                    <time datetime="2020-05-25 12:00:00">
                                        <i class="fas fa-calendar-alt mr-2"></i>Mon, May 25th 2020
                                    </time>
                                </div>
                                <div class="postcard__bar"></div>
                                <div class="postcard__preview-txt">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi, fugiat asperiores inventore beatae accusamus odit minima enim, commodi quia, doloribus eius! Ducimus nemo accusantium maiores velit corrupti tempora reiciendis molestiae repellat vero. Eveniet ipsam adipisci illo iusto quibusdam, sunt neque nulla unde ipsum dolores nobis enim quidem excepturi, illum quos!</div>
                                <div>
                                    <a href="{{url('/promo/detail')}}" class="btn btn-outline-primary mt-3 fs-8">Lebih Detail</a>
                                </div>
                            </div>
                            <a class="postcard__img_link" href="#">
                                <img class="postcard__img" src="{{asset('assets/upload/packet/kawah-ijen.jpeg')}}" alt="Image Title" />
                            </a>
                        </article>
                    </div>
                    <div class="col-md-12">
                        <article class="postcard light blue">
                            <div class="postcard__text t-dark">
                                <h1 class="postcard__title blue"><a href="#">Podcast Title</a></h1>
                                <div class="postcard__subtitle small">
                                    <time datetime="2020-05-25 12:00:00">
                                        <i class="fas fa-calendar-alt mr-2"></i>Mon, May 25th 2020
                                    </time>
                                </div>
                                <div class="postcard__bar"></div>
                                <div class="postcard__preview-txt">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi, fugiat asperiores inventore beatae accusamus odit minima enim, commodi quia, doloribus eius! Ducimus nemo accusantium maiores velit corrupti tempora reiciendis molestiae repellat vero. Eveniet ipsam adipisci illo iusto quibusdam, sunt neque nulla unde ipsum dolores nobis enim quidem excepturi, illum quos!</div>
                                <div>
                                    <a href="{{url('/promo/detail')}}" class="btn btn-outline-primary mt-3 fs-8">Lebih Detail</a>
                                </div>
                            </div>
                            <a class="postcard__img_link" href="#">
                                <img class="postcard__img" src="{{asset('assets/upload/packet/kawah-ijen.jpeg')}}" alt="Image Title" />
                            </a>
                        </article>
                    </div>
                    <div class="col-md-12">
                        <article class="postcard light blue">
                            <div class="postcard__text t-dark">
                                <h1 class="postcard__title blue"><a href="#">Podcast Title</a></h1>
                                <div class="postcard__subtitle small">
                                    <time datetime="2020-05-25 12:00:00">
                                        <i class="fas fa-calendar-alt mr-2"></i>Mon, May 25th 2020
                                    </time>
                                </div>
                                <div class="postcard__bar"></div>
                                <div class="postcard__preview-txt">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi, fugiat asperiores inventore beatae accusamus odit minima enim, commodi quia, doloribus eius! Ducimus nemo accusantium maiores velit corrupti tempora reiciendis molestiae repellat vero. Eveniet ipsam adipisci illo iusto quibusdam, sunt neque nulla unde ipsum dolores nobis enim quidem excepturi, illum quos!</div>
                                <div>
                                    <a href="{{url('/promo/detail')}}" class="btn btn-outline-primary mt-3 fs-8">Lebih Detail</a>
                                </div>
                            </div>
                            <a class="postcard__img_link" href="#">
                                <img class="postcard__img" src="{{asset('assets/upload/packet/kawah-ijen.jpeg')}}" alt="Image Title" />
                            </a>
                        </article>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="row sticky-top" style="padding-top: 100px;">
                    <div class="col-md-12 d-flex align-items-stretch">
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
        
                    <div class="col-md-12 d-flex align-items-stretch">
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
                </div>
            </div>
        </div>
    </div>
</section>
@endsection