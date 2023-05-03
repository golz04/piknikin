@extends('frontend.layouts.app')
@section('hero')
<section id="hero" class="d-flex align-items-center" style="background-size: cover; background-image: url('{{ asset('assets/upload/rental/'.$getDetail->thumbnail)}}');">
    <div class="container" data-aos="zoom-out" data-aos-delay="100">
        <h1 class="text-white"><span>{{$getDetail->title}}</span></h1>
        <p class="my-3 text-white">{{$getDetail->description}}</p>
    </div>
</section>
@endsection
@section('content')
<section id="custom-detail">
    <div class="container" data-aos="fade-up">
        <div class="row mt-3">
            <div class="col-md-8 d-flex align-items-center justify-content-center">
                <img class="img-fluid" src="{{ asset('assets/upload/rental/'.$getDetail->thumbnail)}}" alt="">
            </div>
            <div class="col-md-4">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{url('/call')}}" class="rounded-2 btn btn-outline-success m-auto">Chat Via Whatsapp</a>
                    </div>
                </div>
                <h3 class="my-3">Tipe dan Harga Sewa</h3>
                <p>{!!$getDetail->type_and_price!!}</p>
                <h3 class="my-3">Syarat dan Ketentuan</h3>
                <p>{!!$getDetail->term_and_condition!!}</p>
            </div>
            <div class="col-md-12 mt-2">
                <h3 class="my-3">Faq</h3>
                <p>{!!$getDetail->faq!!}</p>
            </div>
        </div>
        
        <h3 class="my-4">Gambar Lainnya</h3>
        <div class="row">
            @forelse ($getGallery as $item)
            <div class="col-md-3 col-sm-6 mb-4">
                <span>
                    <img class="img-fluid" src="{{asset('assets/upload/rental-gallery/'.$item->image)}}" style="height: 100%;" alt="">
                </span>
            </div>
            @empty
            <div class="col-md-3 col-sm-6 mb-4">
                <span>
                    <img class="img-fluid" src="https://via.placeholder.com/500x300" alt="">
                </span>
            </div>
            <div class="col-md-3 col-sm-6 mb-4">
                <span>
                    <img class="img-fluid" src="https://via.placeholder.com/500x300" alt="">
                </span>
            </div>
            <div class="col-md-3 col-sm-6 mb-4">
                <span>
                    <img class="img-fluid" src="https://via.placeholder.com/500x300" alt="">
                </span>
            </div>
            <div class="col-md-3 col-sm-6 mb-4">
                <span>
                    <img class="img-fluid" src="https://via.placeholder.com/500x300" alt="">
                </span>
            </div>
            @endforelse
      
        </div>
    </div>
</section>

<section id="rate" class="contact">
    <div class="container" data-aos="fade-up">
        <form action="{{url('/rental/detail/send/'.$getDetail->slug)}}" method="POST" role="form" class="php-email-form">
            @csrf
            <div class="row text-center mb-3">
                <h2><strong>Tulis Reviewmu</strong></h2>
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
            <div class="row">
                <div class="col-md-2 col-sm-6">
                    <div class="form-group">
                        <label style="font-size: 11pt; margin-left: 3px; margin-bottom: 3px;" for="input-1">Rating Akomodasi:</label>
                        <div id="ratings">
                            <div class="rating-group">
                                <input disabled checked class="rating__input rating__input--none" name="rating_accomodation" id="rating_accomodation-none" value="0" type="radio">
                                <label aria-label="1 star" class="rating__label" for="rating_accomodation-1"><i class="rating__icon rating__icon--star bx bx-star"></i></label>
                                <input class="rating__input" @if(old('rating_accomodation') == '1') checked @endif name="rating_accomodation" id="rating_accomodation-1" value="1" type="radio">
                                <label aria-label="2 stars" class="rating__label" for="rating_accomodation-2"><i class="rating__icon rating__icon--star bx bx-star"></i></label>
                                <input class="rating__input" @if(old('rating_accomodation') == '2') checked @endif name="rating_accomodation" id="rating_accomodation-2" value="2" type="radio">
                                <label aria-label="3 stars" class="rating__label" for="rating_accomodation-3"><i class="rating__icon rating__icon--star bx bx-star"></i></label>
                                <input class="rating__input" @if(old('rating_accomodation') == '3') checked @endif name="rating_accomodation" id="rating_accomodation-3" value="3" type="radio">
                                <label aria-label="4 stars" class="rating__label" for="rating_accomodation-4"><i class="rating__icon rating__icon--star bx bx-star"></i></label>
                                <input class="rating__input" @if(old('rating_accomodation') == '4') checked @endif name="rating_accomodation" id="rating_accomodation-4" value="4" type="radio">
                                <label aria-label="5 stars" class="rating__label" for="rating_accomodation-5"><i class="rating__icon rating__icon--star bx bx-star"></i></label>
                                <input class="rating__input" @if(old('rating_accomodation') == '5') checked @endif name="rating_accomodation" id="rating_accomodation-5" value="5" type="radio">
                            </div>
                        </div>
                        @error('rating_accomodation')
                            <p style="color: #e74a3b; font-size: 80%; padding-left: 5px;">Harus memberikan rating.</p>
                        @enderror
                    </div>
                </div>
                <div class="col-md-2 col-sm-6">
                    <div class="form-group">
                        <label style="font-size: 11pt; margin-left: 3px; margin-bottom: 3px;" for="input-1">Rating Wisata:</label>
                        <div id="ratings">
                            <div class="rating-group">
                                <input disabled checked class="rating__input rating__input--none" name="rating_destination" id="rating_destination-none" value="0" type="radio">
                                <label aria-label="1 star" class="rating__label" for="rating_destination-1"><i class="rating__icon rating__icon--star bx bx-star"></i></label>
                                <input class="rating__input" @if(old('rating_destination') == '1') checked @endif name="rating_destination" id="rating_destination-1" value="1" type="radio">
                                <label aria-label="2 stars" class="rating__label" for="rating_destination-2"><i class="rating__icon rating__icon--star bx bx-star"></i></label>
                                <input class="rating__input" @if(old('rating_destination') == '2') checked @endif name="rating_destination" id="rating_destination-2" value="2" type="radio">
                                <label aria-label="3 stars" class="rating__label" for="rating_destination-3"><i class="rating__icon rating__icon--star bx bx-star"></i></label>
                                <input class="rating__input" @if(old('rating_destination') == '3') checked @endif name="rating_destination" id="rating_destination-3" value="3" type="radio">
                                <label aria-label="4 stars" class="rating__label" for="rating_destination-4"><i class="rating__icon rating__icon--star bx bx-star"></i></label>
                                <input class="rating__input" @if(old('rating_destination') == '4') checked @endif name="rating_destination" id="rating_destination-4" value="4" type="radio">
                                <label aria-label="5 stars" class="rating__label" for="rating_destination-5"><i class="rating__icon rating__icon--star bx bx-star"></i></label>
                                <input class="rating__input" @if(old('rating_destination') == '5') checked @endif name="rating_destination" id="rating_destination-5" value="5" type="radio">
                            </div>
                        </div>
                        @error('rating_overall')
                            <p style="color: #e74a3b; font-size: 80%; padding-left: 5px;">Harus memberikan rating.</p>
                        @enderror
                    </div>
                </div>
                <div class="col-md-2 col-sm-6">
                    <div class="form-group">
                        <label style="font-size: 11pt; margin-left: 3px; margin-bottom: 3px;" for="input-1">Rating Makanan:</label>
                        <div id="ratings">
                            <div class="rating-group">
                                <input disabled checked class="rating__input rating__input--none" name="rating_meal" id="rating_meal-none" value="0" type="radio">
                                <label aria-label="1 star" class="rating__label" for="rating_meal-1"><i class="rating__icon rating__icon--star bx bx-star"></i></label>
                                <input class="rating__input" @if(old('rating_meal') == '1') checked @endif name="rating_meal" id="rating_meal-1" value="1" type="radio">
                                <label aria-label="2 stars" class="rating__label" for="rating_meal-2"><i class="rating__icon rating__icon--star bx bx-star"></i></label>
                                <input class="rating__input" @if(old('rating_meal') == '2') checked @endif name="rating_meal" id="rating_meal-2" value="2" type="radio">
                                <label aria-label="3 stars" class="rating__label" for="rating_meal-3"><i class="rating__icon rating__icon--star bx bx-star"></i></label>
                                <input class="rating__input" @if(old('rating_meal') == '3') checked @endif name="rating_meal" id="rating_meal-3" value="3" type="radio">
                                <label aria-label="4 stars" class="rating__label" for="rating_meal-4"><i class="rating__icon rating__icon--star bx bx-star"></i></label>
                                <input class="rating__input" @if(old('rating_meal') == '4') checked @endif name="rating_meal" id="rating_meal-4" value="4" type="radio">
                                <label aria-label="5 stars" class="rating__label" for="rating_meal-5"><i class="rating__icon rating__icon--star bx bx-star"></i></label>
                                <input class="rating__input" @if(old('rating_meal') == '5') checked @endif name="rating_meal" id="rating_meal-5" value="5" type="radio">
                            </div>
                        </div>
                        @error('rating_meal')
                            <p style="color: #e74a3b; font-size: 80%; padding-left: 5px;">Harus memberikan rating.</p>
                        @enderror
                    </div>
                </div>
                <div class="col-md-2 col-sm-6">
                    <div class="form-group">
                        <label style="font-size: 11pt; margin-left: 3px; margin-bottom: 3px;" for="input-1">Rating Kendaraan:</label>
                        <div id="ratings">
                            <div class="rating-group">
                                <input disabled checked class="rating__input rating__input--none" name="rating_transport" id="rating_transport-none" value="0" type="radio">
                                <label aria-label="1 star" class="rating__label" for="rating_transport-1"><i class="rating__icon rating__icon--star bx bx-star"></i></label>
                                <input class="rating__input" @if(old('rating_transport') == '1') checked @endif name="rating_transport" id="rating_transport-1" value="1" type="radio">
                                <label aria-label="2 stars" class="rating__label" for="rating_transport-2"><i class="rating__icon rating__icon--star bx bx-star"></i></label>
                                <input class="rating__input" @if(old('rating_transport') == '2') checked @endif name="rating_transport" id="rating_transport-2" value="2" type="radio">
                                <label aria-label="3 stars" class="rating__label" for="rating_transport-3"><i class="rating__icon rating__icon--star bx bx-star"></i></label>
                                <input class="rating__input" @if(old('rating_transport') == '3') checked @endif name="rating_transport" id="rating_transport-3" value="3" type="radio">
                                <label aria-label="4 stars" class="rating__label" for="rating_transport-4"><i class="rating__icon rating__icon--star bx bx-star"></i></label>
                                <input class="rating__input" @if(old('rating_transport') == '4') checked @endif name="rating_transport" id="rating_transport-4" value="4" type="radio">
                                <label aria-label="5 stars" class="rating__label" for="rating_transport-5"><i class="rating__icon rating__icon--star bx bx-star"></i></label>
                                <input class="rating__input" @if(old('rating_transport') == '5') checked @endif name="rating_transport" id="rating_transport-5" value="5" type="radio">
                            </div>
                        </div>
                        @error('rating_transport')
                            <p style="color: #e74a3b; font-size: 80%; padding-left: 5px;">Harus memberikan rating.</p>
                        @enderror
                    </div>
                </div>
                <div class="col-md-2 col-sm-6">
                    <div class="form-group">
                        <label style="font-size: 11pt; margin-left: 3px; margin-bottom: 3px;" for="input-1">Rating Biaya:</label>
                        <div id="ratings">
                            <div class="rating-group">
                                <input disabled checked class="rating__input rating__input--none" name="rating_money" id="rating_money-none" value="0" type="radio">
                                <label aria-label="1 star" class="rating__label" for="rating_money-1"><i class="rating__icon rating__icon--star bx bx-star"></i></label>
                                <input class="rating__input" @if(old('rating_money') == '1') checked @endif name="rating_money" id="rating_money-1" value="1" type="radio">
                                <label aria-label="2 stars" class="rating__label" for="rating_money-2"><i class="rating__icon rating__icon--star bx bx-star"></i></label>
                                <input class="rating__input" @if(old('rating_money') == '2') checked @endif name="rating_money" id="rating_money-2" value="2" type="radio">
                                <label aria-label="3 stars" class="rating__label" for="rating_money-3"><i class="rating__icon rating__icon--star bx bx-star"></i></label>
                                <input class="rating__input" @if(old('rating_money') == '3') checked @endif name="rating_money" id="rating_money-3" value="3" type="radio">
                                <label aria-label="4 stars" class="rating__label" for="rating_money-4"><i class="rating__icon rating__icon--star bx bx-star"></i></label>
                                <input class="rating__input" @if(old('rating_money') == '4') checked @endif name="rating_money" id="rating_money-4" value="4" type="radio">
                                <label aria-label="5 stars" class="rating__label" for="rating_money-5"><i class="rating__icon rating__icon--star bx bx-star"></i></label>
                                <input class="rating__input" @if(old('rating_money') == '5') checked @endif name="rating_money" id="rating_money-5" value="5" type="radio">
                            </div>
                        </div>
                        @error('rating_money')
                            <p style="color: #e74a3b; font-size: 80%; padding-left: 5px;">Harus memberikan rating.</p>
                        @enderror
                    </div>
                </div>
                <div class="col-md-2 col-sm-6">
                    <div class="form-group">
                        <label style="font-size: 11pt; margin-left: 3px; margin-bottom: 3px;" for="input-1">Rating Keseluruhan:</label>
                        <div id="ratings">
                            <div class="rating-group">
                                <input disabled checked class="rating__input rating__input--none" name="rating_overall" id="rating_overall-none" value="0" type="radio">
                                <label aria-label="1 star" class="rating__label" for="rating_overall-1"><i class="rating__icon rating__icon--star bx bx-star"></i></label>
                                <input class="rating__input" @if(old('rating_overall') == '1') checked @endif name="rating_overall" id="rating_overall-1" value="1" type="radio">
                                <label aria-label="2 stars" class="rating__label" for="rating_overall-2"><i class="rating__icon rating__icon--star bx bx-star"></i></label>
                                <input class="rating__input" @if(old('rating_overall') == '2') checked @endif name="rating_overall" id="rating_overall-2" value="2" type="radio">
                                <label aria-label="3 stars" class="rating__label" for="rating_overall-3"><i class="rating__icon rating__icon--star bx bx-star"></i></label>
                                <input class="rating__input" @if(old('rating_overall') == '3') checked @endif name="rating_overall" id="rating_overall-3" value="3" type="radio">
                                <label aria-label="4 stars" class="rating__label" for="rating_overall-4"><i class="rating__icon rating__icon--star bx bx-star"></i></label>
                                <input class="rating__input" @if(old('rating_overall') == '4') checked @endif name="rating_overall" id="rating_overall-4" value="4" type="radio">
                                <label aria-label="5 stars" class="rating__label" for="rating_overall-5"><i class="rating__icon rating__icon--star bx bx-star"></i></label>
                                <input class="rating__input" @if(old('rating_overall') == '5') checked @endif name="rating_overall" id="rating_overall-5" value="5" type="radio">
                            </div>
                        </div>
                        @error('rating_overall')
                            <p style="color: #e74a3b; font-size: 80%; padding-left: 5px;">Harus memberikan rating.</p>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label style="font-size: 11pt; margin-left: 3px; margin-bottom: 3px;" for="message">Pesan / Catatan Khusus :</label>
                <textarea class="form-control @error('message') is-invalid @enderror" name="message" rows="5" placeholder="Pesan...">{{old('message')}}</textarea>
                @error('message')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
            </div>
            <div class="text-center"><button type="submit">Kirim Komentar</button></div>
        </form>
    </div>
    <div class="container mt-5 px-4" data-aos="fade-up">
        <div class="row border rounded shadow-sm">
            <div class="card-body p-4">
                <h4 class="text-center mb-4 pb-2">Komentar</h4>
                <div class="row">
                    <div class="col">
                        @foreach ($getRating as $item)
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

<section id="custom-packet" class="custom-packet section-bg">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h2>#Paket-Wisata-Terbaru</h2>
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
    </div>
</section>
@include('sweetalert::alert')
@endsection