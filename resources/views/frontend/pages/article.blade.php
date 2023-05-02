@extends('frontend.layouts.app')
@section('hero')
<section id="hero" class="d-flex align-items-center" style="background-size: cover; background-image: url('{{ asset('assets/frontend/img/hero-article.jpg')}}');">
    <div class="container" data-aos="zoom-out" data-aos-delay="100">
        <h1 class="text-white">Artikel Piknik<span>In.</span></h1>
        <p class="my-3 text-white">PiknikIn merupakan lorem ipsum dolor sit amet consectetur adipisicing elit. Quod sequi cumque veniam eius autem corporis numquam, odio enim amet cum totam explicabo voluptas ducimus facere eos distinctio, dolore error quasi?</p>
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
                            <strong>Temukan Artikel Menarik Disini</strong>
                        </h2>
                    </div>
                </div>
                <div class="row">
                    @forelse ($getArticle as $item)
                    <div class="col-md-12">
                        <article class="postcard light blue">
                            <a class="postcard__img_link" href="{{url('/article/detail/'.$item->slug)}}">
                                <img class="postcard__img" src="{{asset('assets/upload/article/'.$item->thumbnail)}}" alt="Image Title" />
                            </a>
                            <div class="postcard__text t-dark">
                                <h1 class="postcard__title blue"><a href="{{url('/article/detail/'.$item->slug)}}">{{$item->title}}</a></h1>
                                <div class="postcard__subtitle small">
                                    <time datetime="2020-05-25 12:00:00">
                                        <i class="fas fa-calendar-alt mr-2"></i>{{ \Carbon\Carbon::parse($item->date_post)->format('D, d F Y') }}
                                    </time>
                                </div>
                                <div class="postcard__bar"></div>
                                <div class="postcard__preview-txt">Baca lebih detail tentang artikel yang berjudul "{{$item->title}}" dan dirilis pada {{ \Carbon\Carbon::parse($item->date_post)->format('d F Y') }} dengan menekan tombol dibawah ini.</div>
                                <div>
                                    <a href="{{url('/article/detail/'.$item->slug)}}" class="btn btn-outline-primary mt-3 fs-8">Lebih Detail</a>
                                </div>
                            </div>
                        </article>
                    </div>
                    @empty
                    @endforelse
                </div>
            </div>

            <div class="col-md-3">
                <div class="row sticky-top" style="padding-top: 100px;">
                    @forelse ($getPacket as $item)
                    <div class="col-md-12 d-flex align-items-stretch">
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
        </div>
    </div>
</section>
@endsection