@extends('frontend.layouts.app')
@section('hero')
<section id="hero" class="d-flex align-items-center" style="background-size: cover; background-image: url('{{ asset('assets/frontend/img/hero-tour-package-request.jpg')}}');">
    <div class="container" data-aos="zoom-out" data-aos-delay="100">
        <h1 class="text-white">Buat Tourmu Sendiri di Piknik<span>In.</span></h1>
        <p class="my-3 text-white">PiknikIn merupakan lorem ipsum dolor sit amet consectetur adipisicing elit. Quod sequi cumque veniam eius autem corporis numquam, odio enim amet cum totam explicabo voluptas ducimus facere eos distinctio, dolore error quasi?</p>
    </div>
</section>
@endsection
@section('content')
<section id="contact" class="contact section-bg">
    <div class="container" data-aos="fade-up">
        <form action="#" method="post" role="form" class="php-email-form">
            <div class="row text-center my-3">
                <h2><strong>Silahkan Isi Form Berikut</strong></h2>
            </div>
            <div class="row">
                <div class="col form-group">
                    <label style="font-size: 11pt; margin-left: 3px; margin-bottom: 3px;" for="name">Nama Lengkap :</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Nama Lengkap" required>
                </div>
                <div class="col form-group">
                    <label style="font-size: 11pt; margin-left: 3px; margin-bottom: 3px;" for="email">Surel :</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Surel" required>
                </div>
            </div>
            <div class="form-group">
                <label style="font-size: 11pt; margin-left: 3px; margin-bottom: 3px;" for="date">Tanggal Pemberangkatan :</label>
                <input type="date" class="form-control" name="date" id="date" placeholder="Tanggal Pemberangkatan" required>
            </div>
            <div class="form-group">
                <label style="font-size: 11pt; margin-left: 3px; margin-bottom: 3px;" for="phone_number">Nomor Whatsapp :</label>
                <input type="text" class="form-control" name="phone_number" id="phone_number" placeholder="Nomor Whatsapp" required>
            </div>
            <div class="form-group">
                <label style="font-size: 11pt; margin-left: 3px; margin-bottom: 3px;" for="phone_number">Destinasi :</label>
                <div class="row">
                    <div class="col-2">
                        <input type="checkbox" name="destination" id="destination">
                        <span style="font-size: 10pt;">
                            Kawah Ijen
                        </span>
                    </div>
                    <div class="col-2">
                        <input type="checkbox" name="destination" id="destination">
                        <span style="font-size: 10pt;">
                            Taman Baluran
                        </span>
                    </div>
                    <div class="col-2">
                        <input type="checkbox" name="destination" id="destination">
                        <span style="font-size: 10pt;">
                            Pulau Tabuhan
                        </span>
                    </div>
                    <div class="col-2">
                        <input type="checkbox" name="destination" id="destination">
                        <span style="font-size: 10pt;">
                            Red Island
                        </span>
                    </div>
                    <div class="col-2">
                        <input type="checkbox" name="destination" id="destination">
                        <span style="font-size: 10pt;">
                            Green Bay
                        </span>
                    </div>
                    <div class="col-2">
                        <input type="checkbox" name="destination" id="destination">
                        <span style="font-size: 10pt;">
                            Alas Purwo
                        </span>
                    </div>
                    <div class="col-2">
                        <input type="checkbox" name="destination" id="destination">
                        <span style="font-size: 10pt;">
                            Pantai G Land
                        </span>
                    </div>
                    <div class="col-2">
                        <input type="checkbox" name="destination" id="destination">
                        <span style="font-size: 10pt;">
                            Pantai Sukamade
                        </span>
                    </div>
                    <div class="col-2">
                        <input type="checkbox" name="destination" id="destination">
                        <span style="font-size: 10pt;">
                            Kawah Wurung
                        </span>
                    </div>
                    <div class="col-2">
                        <input type="checkbox" name="destination" id="destination">
                        <span style="font-size: 10pt;">
                            Jagir Waterfall
                        </span>
                    </div>
                    <div class="col-2">
                        <input type="checkbox" name="destination" id="destination">
                        <span style="font-size: 10pt;">
                            Blue Ray
                        </span>
                    </div>
                    <div class="col-2">
                        <input type="checkbox" name="destination" id="destination">
                        <span style="font-size: 10pt;">
                            Karo Rafting
                        </span>
                    </div>
                    <div class="col-2">
                        <input type="checkbox" name="destination" id="destination">
                        <span style="font-size: 10pt;">
                            City Tour
                        </span>
                    </div>
                    <div class="col-2">
                        <input type="checkbox" name="destination" id="destination">
                        <span style="font-size: 10pt;">
                            Lainnya
                        </span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label style="font-size: 11pt; margin-left: 3px; margin-bottom: 3px;" for="days">Lama Berlibur :</label>
                <select name="days" id="days" class="form-control">
                    <option value="">5 Hari 4 Malam</option>
                    <option value="">4 Hari 3 Malam</option>
                    <option value="">3 Hari 2 Malam</option>
                    <option value="">2 Hari 1 Malam</option>
                </select>
            </div>
            <div class="form-group">
                <label style="font-size: 11pt; margin-left: 3px; margin-bottom: 3px;" for="hotel">Penginapan :</label>
                <select name="hotel" id="hotel" class="form-control">
                    <option value="">Hotel *4</option>
                    <option value="">Hotel *3</option>
                    <option value="">Hotel *2</option>
                    <option value="">Hotel *1</option>
                    <option value="">Hotel Melati</option>
                    <option value="">Homestay</option>
                    <option value="">Tanpa Penginapan</option>
                </select>
            </div>
            <div class="form-group">
                <label style="font-size: 11pt; margin-left: 3px; margin-bottom: 3px;" for="message">Pesan / Catatan Khusus :</label>
                <textarea class="form-control" name="message" rows="5" placeholder="Pesan..." required></textarea>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-6">
                        <label style="font-size: 11pt; margin-left: 3px; margin-bottom: 3px;" for="participant">Jumlah Peserta :</label>
                        <input type="number" class="form-control" name="participant" id="participant" placeholder="Jumlah Peserta" required>
                    </div>
                    <div class="col-6">
                        <label style="font-size: 11pt; margin-left: 3px; margin-bottom: 3px;" for="from">Kota Asal :</label>
                        <input type="text" class="form-control" name="from" id="from" placeholder="Kota Asal" required>
                    </div>
                </div>
            </div>
            <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
            </div>
            <div class="text-center"><button type="submit">Kirim Permintaan</button></div>
        </form>
    </div>
</section>
@endsection