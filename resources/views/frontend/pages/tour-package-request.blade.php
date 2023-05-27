@extends('frontend.layouts.app')
@section('hero')
<section id="hero" class="d-flex align-items-center" style="background-size: cover; background-image: url('{{ asset('assets/frontend/img/hero-tour-package-request.jpg')}}');">
    <div class="container" data-aos="zoom-out" data-aos-delay="100">
        <h1 class="text-white">Buat Tourmu Sendiri di Piknik<span>In.</span></h1>
        <p class="my-3 text-white">Kamu bisa membuat paket wisata impianmu sendiri, ayo segera buat!</p>
    </div>
</section>
@endsection
@section('content')
<section id="contact" class="contact section-bg">
    <div class="container" data-aos="fade-up">
        <form action="{{url('/tour-packages/request/send')}}" method="POST" role="form" class="php-email-form">
            @csrf
            <div class="row text-center my-3">
                <h2><strong>Silahkan Isi Form Berikut</strong></h2>
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
                <label style="font-size: 11pt; margin-left: 3px; margin-bottom: 3px;" for="date_departure">Tanggal Pemberangkatan :</label>
                <input type="date" class="form-control @error('date_departure') is-invalid @enderror" name="date_departure" id="date_departure" placeholder="Tanggal Pemberangkatan" value="{{old('date_departure')}}">
                @error('date_departure')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label style="font-size: 11pt; margin-left: 3px; margin-bottom: 3px;" for="phone_number">Nomor Whatsapp :</label>
                <input type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" id="phone_number" placeholder="Nomor Whatsapp" value="{{old('phone_number')}}">
                @error('phone_number')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label style="font-size: 11pt; margin-left: 3px; margin-bottom: 3px;" for="phone_number">Destinasi :</label>
                <div class="row">
                    @foreach ($getDestination as $item)
                    <div class="col-2">
                        <input type="checkbox" name="destination[]" value="{{$item->name}}">
                        <span style="font-size: 10pt;">
                            {{$item->name}}
                        </span>
                    </div>
                    @endforeach
                    <div class="col-2">
                        <input type="checkbox" name="destination[]" value="Lainnya">
                        <span style="font-size: 10pt;">
                            Lainnya
                        </span>
                    </div>
                </div>
                @error('destination')
                    <p style="color: #e74a3b; font-size: 80%; padding-left: 5px;">Minimal Pilih 1 Destinasi.</p>
                @enderror
            </div>
            <div class="form-group">
                <label style="font-size: 11pt; margin-left: 3px; margin-bottom: 3px;" for="long_vacation">Lama Berlibur :</label>
                <select name="long_vacation" id="long_vacation" class="form-control @error('long_vacation') is-invalid @enderror">
                    <option value="Lebih 5 Hari" @if(old('long_vacation') == 'Lebih 5 Hari') selected @endif>Lebih 5 Hari</option>
                    <option value="5 Hari 4 Malam" @if(old('long_vacation') == '5 Hari 4 Malam') selected @endif>5 Hari 4 Malam</option>
                    <option value="4 Hari 3 Malam" @if(old('long_vacation') == '4 Hari 3 Malam') selected @endif>4 Hari 3 Malam</option>
                    <option value="3 Hari 2 Malam" @if(old('long_vacation') == '3 Hari 2 Malam') selected @endif>3 Hari 2 Malam</option>
                    <option value="2 Hari 1 Malam" @if(old('long_vacation') == '2 Hari 1 Malam') selected @endif>2 Hari 1 Malam</option>
                    <option value="1 Hari 1 Malam" @if(old('long_vacation') == '1 Hari 1 Malam') selected @endif>1 Hari 1 Malam</option>
                    <option value="Tidak Lebih 1 Hari" @if(old('long_vacation') == 'Tidak Lebih 1 Hari') selected @endif>Tidak Lebih 1 Hari</option>
                    @error('long_vacation')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </select>
            </div>
            <div class="form-group">
                <label style="font-size: 11pt; margin-left: 3px; margin-bottom: 3px;" for="lodge">Penginapan :</label>
                <select name="lodge" id="lodge" class="form-control @error('lodge') is-invalid @enderror">
                    <option value="Hotel *5" @if(old('lodge') == 'Hotel *5') selected @endif>Hotel *5</option>
                    <option value="Hotel *4" @if(old('lodge') == 'Hotel *4') selected @endif>Hotel *4</option>
                    <option value="Hotel *3" @if(old('lodge') == 'Hotel *3') selected @endif>Hotel *3</option>
                    <option value="Hotel *2" @if(old('lodge') == 'Hotel *2') selected @endif>Hotel *2</option>
                    <option value="Hotel *1" @if(old('lodge') == 'Hotel *1') selected @endif>Hotel *1</option>
                    <option value="Hotel Kapsul" @if(old('lodge') == 'Hotel Kapsul') selected @endif>Hotel Kapsul</option>
                    <option value="Homestay" @if(old('lodge') == 'Homestay') selected @endif>Homestay</option>
                    <option value="Tanpa Penginapan" @if(old('lodge') == 'Tanpa Penginapan') selected @endif>Tanpa Penginapan</option>
                </select>
                @error('lodge')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
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
            <div class="form-group">
                <div class="row">
                    <div class="col-6">
                        <label style="font-size: 11pt; margin-left: 3px; margin-bottom: 3px;" for="qty_participant">Jumlah Peserta :</label>
                        <input type="number" class="form-control @error('qty_participant') is-invalid @enderror" name="qty_participant" id="qty_participant" placeholder="Jumlah Peserta" value="{{old('qty_participant')}}">
                        @error('qty_participant')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="col-6">
                        <label style="font-size: 11pt; margin-left: 3px; margin-bottom: 3px;" for="from">Berangkat Dari :</label>
                        <input type="text" class="form-control @error('from') is-invalid @enderror" name="from" id="from" placeholder="Berangkat Dari" value="{{old('from')}}">
                        @error('from')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="text-center">
                <button type="submit">Kirim Permintaan</button>
            </div>
        </form>
    </div>
</section>
@include('sweetalert::alert')
@endsection