@extends('frontend.layouts.app')
@section('hero')
<section class="d-flex align-items-center text-black  section-bg">
    <div class="container" data-aos="zoom-out" data-aos-delay="100">
        <div class="custom-hero-detail-article">
            <h1 class="text-center">{{$getDetail->title}}</span></h1>
            <p class="my-3 ">{{ \Carbon\Carbon::parse($getDetail->date_post)->format('D, d F Y') }} - {{$countComment}} Komentar</p>
        </div>
    </div>
</section>
@endsection
@section('content')
<section id="custom-packet" class="custom-packet">
    <div class="container" data-aos="fade-up">
        <div class="row">
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-12">
                        <img class="img-fluid" src="{{asset('assets/upload/promo/'.$getDetail->thumbnail)}}" style="width: 100%;" alt="">
                        <p class="mt-3" style="text-align: justify;">{!!$getDetail->description!!}</p>
                    </div>
                    <div class="col-md-12">
                        <section id="rate" class="contact">
                            <div class="container" data-aos="fade-up">
                                <form action="{{url('promo/detail/send/'.$getDetail->slug)}}" method="post" role="form" class="php-email-form">
                                    @csrf
                                    <div class="row text-center mb-3">
                                        <h2><strong>Tulis Komentarmu</strong></h2>
                                    </div>
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
                                    <div class="form-group">
                                        <label style="font-size: 11pt; margin-left: 3px; margin-bottom: 3px;" for="message">Komentar :</label>
                                        <textarea class="form-control @error('message') is-invalid @enderror" name="message" rows="5" placeholder="Komentar...">{{old('message')}}</textarea>
                                        @error('message')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="text-center"><button type="submit">Kirim Komentar</button></div>
                                </form>
                            </div>
                        </section>
                    </div>
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

    <div class="container mt-5 px-4" data-aos="fade-up">
        <div class="row border rounded shadow-sm">
            <div class="card-body p-4">
                <h4 class="text-center mb-4 pb-2">Komentar</h4>
                <div class="row">
                    <div class="col">
                        @foreach ($getComment as $item)
                        <div class="d-flex flex-start">
                            <div class="rounded-circle shadow-1-strong me-3" style="width: 65px; height: 65px; background: #106eea; display: flex; align-items: center; justify-content: center; color: white;">
                                <span><b>{{ \Illuminate\Support\Str::limit($item->name, 1, $end='') }}</b></span>
                            </div>
                            <div class="flex-grow-1 flex-shrink-1">
                                <div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <p class="mb-1">
                                        {{$item->name}} <span class="small">- {{ \Carbon\Carbon::parse($item->created_at)->format('D, d F Y') }}</span>
                                        </p>
                                    </div>
                                    <p class="small mb-0">
                                        {{$item->message}}
                                    </p>
                                </div>
                            </div>
                        </div>
                        {!!$loop->last ? '' : '<hr>'!!}
                        @endforeach
                    </div>
                </div>
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
@include('sweetalert::alert')
@endsection