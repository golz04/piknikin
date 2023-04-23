@extends('frontend.layouts.app')
@section('hero')
<section class="d-flex align-items-center text-black  section-bg">
    <div class="container" data-aos="zoom-out" data-aos-delay="100">
        <div class="custom-hero-detail-article">
            <h1 class="text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</span></h1>
            <p class="my-3 ">23 04 2023 - 0 Komentar</p>
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
                        <img class="img-fluid" src="https://via.placeholder.com/950x500" alt="">
                        <p class="mt-3" style="text-align: justify;">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Unde quia maiores ex voluptatum culpa hic laudantium obcaecati eos natus saepe temporibus impedit illum perspiciatis corrupti doloribus quidem earum, fuga quam, iusto cum aperiam ducimus! Perferendis, excepturi voluptatum, aut quibusdam, voluptatibus laboriosam non quos error ipsum illum hic exercitationem culpa quasi rerum tempore explicabo beatae. Odio, perspiciatis tempore! Nihil rerum nisi, doloremque, magnam natus nobis sit, nostrum impedit ratione totam accusamus in blanditiis aliquid quod soluta odit molestias architecto veritatis. Omnis, reprehenderit aperiam? Voluptate doloribus cum quibusdam, dicta nisi dolor velit nam vel nesciunt voluptas nulla iure totam deleniti dolore. Autem, explicabo mollitia, similique eaque odio praesentium quo cum nam minima doloribus fugit ab soluta sunt, dolore illum inventore. Nemo magnam unde cupiditate ipsum quisquam, voluptatum iure corporis eos ab necessitatibus possimus et distinctio incidunt libero aliquid numquam blanditiis eum impedit in amet itaque. Ducimus illo quibusdam doloremque natus provident rerum, maiores facere quas modi assumenda sunt et corporis tempora consequatur cumque labore nostrum dolore id minus fuga accusantium? Molestias, iste minima? Exercitationem ea dignissimos officiis placeat? Quam aut at minus quidem nesciunt rerum reiciendis repellat, quaerat necessitatibus, dolorum maxime explicabo deserunt, assumenda praesentium suscipit accusantium. Ducimus placeat consectetur atque soluta, molestiae odio numquam quaerat dolorem, corporis aspernatur ab voluptatum exercitationem laboriosam quam neque excepturi voluptatibus quod modi impedit. Fuga ipsam esse architecto, dolor reiciendis hic placeat officia quam nihil officiis, atque harum cum, repellat nemo rem! Distinctio vitae ullam aliquid dolor, voluptates asperiores eum, libero hic ratione soluta ea repudiandae laudantium ab commodi a accusamus in delectus. Quis sapiente id beatae eum. Voluptas, nam officia! Repellendus quibusdam magni optio temporibus odio velit, natus asperiores odit recusandae delectus vero expedita magnam, nostrum unde. Ratione nihil voluptatibus ullam. Hic quos nulla optio ipsum expedita, voluptatem modi at eveniet nihil eaque nesciunt sequi maiores a laboriosam corporis libero doloribus sunt quaerat voluptas reprehenderit itaque necessitatibus et. Facilis similique voluptatem veniam quis beatae impedit a repellendus aliquid, nisi exercitationem dignissimos excepturi qui fugiat. Repellendus placeat temporibus ducimus eaque, harum alias voluptatem officiis. Odit optio nemo tempora, maiores cupiditate veritatis et illum autem nesciunt dignissimos excepturi fuga voluptatibus doloribus eligendi dicta aspernatur voluptas libero ut laboriosam a neque. Laudantium, accusantium provident adipisci nihil beatae minus blanditiis voluptates a error optio eligendi vero repudiandae aperiam. Officiis, voluptates. Neque hic provident totam vero consequuntur a quo sequi cupiditate nulla esse sapiente, error iusto repudiandae corrupti pariatur unde! Adipisci omnis cumque illo totam molestiae ipsa sequi cum rerum iste ad? Perferendis cupiditate inventore quo aliquid quae nulla soluta fuga, hic eligendi distinctio culpa voluptas. Quod molestias architecto repellat nesciunt excepturi harum numquam ut fugit, eos minima temporibus quis illum perferendis? Eum ut optio quas cum? Iste, possimus maiores eum officia ipsa pariatur adipisci accusantium fuga exercitationem, perferendis optio ad placeat quibusdam inventore eligendi nesciunt aspernatur? Provident repellendus tempore non iste aliquam odit. Dolor quo delectus, laudantium laborum sapiente nobis eaque voluptate dicta labore recusandae dolorum placeat assumenda commodi eius qui quae vitae aliquam provident a voluptatem dolore mollitia.</p>
                    </div>
                    <div class="col-md-12">
                        <section id="rate" class="contact">
                            <div class="container" data-aos="fade-up">
                                <form action="#" method="post" role="form" class="php-email-form">
                                    <div class="row text-center mb-3">
                                        <h2><strong>Tulis Komentarmu</strong></h2>
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
                                        <label style="font-size: 11pt; margin-left: 3px; margin-bottom: 3px;" for="comment">Komentar :</label>
                                        <textarea class="form-control" name="comment" rows="5" placeholder="Komentar..." required></textarea>
                                    </div>
                                    <div class="my-3">
                                        <div class="loading">Loading</div>
                                        <div class="error-message"></div>
                                        <div class="sent-message">Your message has been sent. Thank you!</div>
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
@endsection