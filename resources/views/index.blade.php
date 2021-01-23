@extends('layouts.app')

@section('title', 'Medicexpress')

@section('content')
     <!-- Banner Section One Start -->
     <section class="banner-one">
        <div class="banner-bg-slide"
            data-options='{ "delay": 5000, "slides": [ { "src": "{{asset('assets/img/banner/5.jpeg')}}" },
             { "src": "{{asset('assets/img/banner/10.jpeg')}}" } , { "src": "{{asset('assets/img/banner/slider3.jpeg')}}" }], "transition": "fade", "timer": false, "align": "top", 
             "animation": [ "kenburnsUp", "kenburnsDown", "kenburnsLeft", "kenburnsRight" ] }'>
        </div><!-- /.banner-bg-slide -->
        <div class="container">
            <div class="content-box">
                <div class="top-title">
                    <h2>Lorem ipsum dolor sit  <br> amet consectetur</h2>
                </div>

                <!--<div class="product-tab-box tabs-box">
                    <ul class="tab-btns tab-buttons clearfix list-unstyled">
                        <li data-tab="#desc" class="tab-btn active-btn"><span>Buy</span></li>
                        <li data-tab="#addi__info" class="tab-btn"><span>Sale</span></li>
                        <li data-tab="#review" class="tab-btn"><span>Rent</span></li>
                    </ul>
                    <div class="tabs-content">
                        <div class="tab active-tab" id="desc">
                            <form class="banner_one_search_form" action="/listing-1.html">
                                <div class="banner_one_search_form_input_box">
                                    <input type="text" placeholder="Search for city, property, agent and more...">
                                    <button type="submit" class="thm-btn banner_one_search_btn">Search
                                        Property</button>
                                    <div class="banner_one_search_icon">
                                        <a href="#"><span class="icon-magnifying-glass"></span></a>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="tab" id="addi__info">
                            <form class="banner_one_search_form" action="/listing-1.html">
                                <div class="banner_one_search_form_input_box">
                                    <input type="text" placeholder="Search for city, property, agent and more...">
                                    <button type="submit" class="thm-btn banner_one_search_btn">Search
                                        Property</button>
                                    <div class="banner_one_search_icon">
                                        <a href="#"><span class="icon-magnifying-glass"></span></a>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="tab" id="review">
                            <form class="banner_one_search_form" action="/listing-1.html">
                                <div class="banner_one_search_form_input_box">
                                    <input type="text" placeholder="Search for city, property, agent and more...">
                                    <button type="submit" class="thm-btn banner_one_search_btn">Search
                                        Property</button>
                                    <div class="banner_one_search_icon">
                                        <a href="#"><span class="icon-magnifying-glass"></span></a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>-->
                <div class="banner_one_bottom_icon_text">
                    <p style="color: #fff;">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Soluta odio doloremque ex amet beatae esse,
                        eveniet libero labore voluptatum vero! Harum dolore labore modi quasi id error fuga magnam a?</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner Section One End -->
    <!--servicios-->
    <section class="how_it_works">
        <div class="how_it_works_shape_1">
            <img src="{{asset('assets/img/shapes/how_it_works_shape_1.png')}}" alt="">
        </div>
        <div class="container">
            <div class="block-title text-center">
                <h4>--- Servicios ---</h4>
                <h2> Un excelente servicio </h2>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <ul class="how_it_works_single list-unstyled">
                        <li>
                            <div class="how_it_works_img">
                                <img src="{{asset('assets/img/iconos/medico.png')}}" alt="">
                                <div class="how_it_works_circle">
                                    <p>01</p>
                                </div>
                            </div>
                            <div class="how_it_works_content">
                                <h3>Atención medica</h3>
                                <p>Quisqu tell us risus adpis viera bibe um urna.</p>
                            </div>
                        </li>
                        <li class="item-2">
                            <div class="how_it_works_img">
                                <img src="{{asset('assets/img/iconos/salud.png')}}" alt="">
                                <div class="how_it_works_circle">
                                    <p>02</p>
                                </div>
                            </div>
                            <div class="how_it_works_content">
                                <h3>Salud ocupacional</h3>
                                <p>Quisqu tell us risus adpis viera bibe um urna.</p>
                            </div>
                        </li>
                        <li>
                            <div class="how_it_works_img">
                                <img src="{{asset('assets/img/iconos/consultoria.png')}}" alt="">
                                <div class="how_it_works_circle">
                                    <p>03</p>
                                </div>
                            </div>
                            <div class="how_it_works_content">
                                <h3>Consultorias</h3>
                                <p>Quisqu tell us risus adpis viera bibe um urna.</p>
                            </div>
                        </li>
                        <li class="item-4">
                            <div class="how_it_works_img">
                                <img src="{{asset('assets/img/iconos/ambulancia1.png')}}" alt="">
                                <div class="how_it_works_circle">
                                    <p>04</p>
                                </div>
                            </div>
                            <div class="how_it_works_content">
                                <h3>Servicio de ambulancia</h3>
                                <p>Quisqu tell us risus adpis viera bibe um urna.</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--servicios End-->
    <!--Cotizar-->
        <section class="providing_one jarallax" data-jarallax data-speed="0.2" data-imgPosition="50% 0%"
            style="background-image: url({{asset('assets/img/banner/slider3.jpeg')}})">
            <div class="container">
                <div class="row">
                    <div class="col-xl-5 col-lg-5">
                        <div class="providing_one_left">
                            <div class="block-title text-left">
                                <h4>--Cotizar--</h4>
                                <h2>Que esperas para realizar <br> tu cotización</h2>
                            </div>
                            <div class="providing_one_btn">
                                <a href="#" class="thm-btn">Cotizar ahora</a>
                            </div>
                            <div class="providing_one_shaape_one">
                                <img src="{{asset('assets/img/shapes/providing_one_shape_1.png')}}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-7 col-lg-7">
                        <div class="providing_one_four_boxes clearfix">
                            <ul class="list-unstyled">
                                <li>
                                    <div class="providing_one_four_boxes_iocn">
                                        <img src="{{asset('assets/img/iconos/hospital.png')}}" alt="">
                                    </div>
                                    <div class="providing_one_four_boxes_text">
                                        <p>Servicio de<br>Urgencias</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="providing_one_four_boxes_iocn">
                                        <img src="{{asset('assets/img/iconos/ambulancia.png')}}" alt="">
                                    </div>
                                    <div class="providing_one_four_boxes_text">
                                        <p>Servicio de <br>Ambulancia</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="providing_one_four_boxes_iocn">
                                        <img src="{{asset('assets/img/iconos/evento.png')}}" alt="">
                                    </div>
                                    <div class="providing_one_four_boxes_text">
                                        <p>Cobertura de <br>Eventos</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="providing_one_four_boxes_iocn">
                                        <img src="{{asset('assets/img/iconos/rapido.png')}}" alt="">
                                    </div>
                                    <div class="providing_one_four_boxes_text">
                                        <p>Atención<br>Medica 24/7</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <!--Cotizar End-->
    <!--Blog One Start-->
    <section class="blog_one">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-4">
                    <div class="blog_one_left">
                        <div class="block-title text-left">
                            <h4>Nuestro Blog</h4>
                            <h2>Ultimas noticias <br>& Articulos</h2>
                        </div>
                        <div class="blog_one_text">
                            <p>Lorem ipsum onts persp unde omnis iste natus errluptatem acc usantium demque
                                laudantium totam.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-8">
                    <div class="blog_one_right">
                        <div class="blog_one_carousel owl-theme owl-carousel">
                            <!--Blog One Single-->
                            <div class="blog_one_single">
                                <div class="blog_one_image_box">
                                    <div class="blog_one_img">
                                        <img src="{{asset('assets/img/blog/blog_1_img_1.jpg')}}" alt="">
                                    </div>
                                    <div class="blog_one_date_box">
                                        <p>20 Nov, 2020</p>
                                    </div>
                                </div>
                                <div class="blog_one_content_box">
                                    <h3><a href="news-details.html">Save Thousands Selling Your Property</a></h3>
                                    <ul class="list-unstyled blog-one__meta">
                                        <li><a href="blog-details.html"><i class="far fa-user-circle"></i> Admin</a>
                                        </li>
                                        <li><span>/</span></li>
                                        <li><a href="news-details.html"><i class="far fa-comments"></i> 2
                                                Comments</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!--Blog One Single-->
                            <div class="blog_one_single">
                                <div class="blog_one_image_box">
                                    <div class="blog_one_img">
                                        <img src="{{asset('assets/img/blog/blog_1_img_2.jpg')}}" alt="">
                                    </div>
                                    <div class="blog_one_date_box">
                                        <p>20 Nov, 2020</p>
                                    </div>
                                </div>
                                <div class="blog_one_content_box">
                                    <h3><a href="#">Leverage agile frame works to a
                                            robust</a></h3>
                                    <ul class="list-unstyled blog-one__meta">
                                        <li><a href="#"><i class="far fa-user-circle"></i> Admin</a>
                                        </li>
                                        <li><span>/</span></li>
                                        <li><a href="#"><i class="far fa-comments"></i> 2
                                                Comments</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!--Blog One Single-->
                            <div class="blog_one_single">
                                <div class="blog_one_image_box">
                                    <div class="blog_one_img">
                                        <img src="{{asset('assets/img/blog/blog_1_img_3.jpg')}}" alt="">
                                    </div>
                                    <div class="blog_one_date_box">
                                        <p>20 Nov, 2020</p>
                                    </div>
                                </div>
                                <div class="blog_one_content_box">
                                    <h3><a href="#"> Iterative approaches to corporate
                                            foster</a></h3>
                                    <ul class="list-unstyled blog-one__meta">
                                        <li><a href="#"><i class="far fa-user-circle"></i> Admin</a>
                                        </li>
                                        <li><span>/</span></li>
                                        <li><a href="#"><i class="far fa-comments"></i> 2
                                                Comments</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Blog One End-->
    <!--Brand One Start-->
    <div class="brand_one">
        <div class="container">
            <div class="thm-swiper__slider swiper-container" data-swiper-options='{"spaceBetween": 100, "slidesPerView": 5, "autoplay": { "delay": 5000 }, "breakpoints": {
            "0": {
                "spaceBetween": 30,
                "slidesPerView": 2
            },
            "375": {
                "spaceBetween": 30,
                "slidesPerView": 2
            },
            "575": {
                "spaceBetween": 30,
                "slidesPerView": 3
            },
            "767": {
                "spaceBetween": 50,
                "slidesPerView": 4
            },
            "991": {
                "spaceBetween": 50,
                "slidesPerView": 5
            },
            "1199": {
                "spaceBetween": 100,
                "slidesPerView": 5
            }
        }}'>
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img src="{{asset('assets/img/brand/brand_1_img_1.png')}}" alt="">
                    </div><!-- /.swiper-slide -->
                    <div class="swiper-slide">
                        <img src="{{asset('assets/img/brand/brand_1_img_2.png')}}" alt="">
                    </div><!-- /.swiper-slide -->
                    <div class="swiper-slide">
                        <img src="{{asset('assets/img/brand/brand_1_img_3.png')}}" alt="">
                    </div><!-- /.swiper-slide -->
                    <div class="swiper-slide">
                        <img src="{{asset('assets/img/brand/brand_1_img_4.png')}}" alt="">
                    </div><!-- /.swiper-slide -->
                    <div class="swiper-slide">
                        <img src="{{asset('assets/img/brand/brand_1_img_5.png')}}" alt="">
                    </div><!-- /.swiper-slide -->
                    <div class="swiper-slide">
                        <img src="{{asset('assets/img/brand/brand_1_img_1.png')}}" alt="">
                    </div><!-- /.swiper-slide -->
                    <div class="swiper-slide">
                        <img src="{{asset('assets/img/brand/brand_1_img_2.png')}}" alt="">
                    </div><!-- /.swiper-slide -->
                    <div class="swiper-slide">
                        <img src="{{asset('assets/img/brand/brand_1_img_3.png')}}" alt="">
                    </div><!-- /.swiper-slide -->
                    <div class="swiper-slide">
                        <img src="{{asset('assets/img/brand/brand_1_img_4.png')}}" alt="">
                    </div><!-- /.swiper-slide -->
                    <div class="swiper-slide">
                        <img src="{{asset('assets/img/brand/brand_1_img_5.png')}}" alt="">
                    </div><!-- /.swiper-slide -->
                </div>
            </div>
        </div>
    </div>
    <!--Brand One End-->
    <!--Contact Start-->
    <section class="contact">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-4">
                    <div class="block-title text-left">
                        <h4>--Contacto--</h4>
                        <h2>Contáctanos</h2>
                    </div>
                    <div class="contact_text">
                        <p>Lorem ipsum dolor sit amet, conse ctetur adipisicing elit sed do eiusm od tempor ut
                            labore. sit amet scelerisque. Phasellus hendrerit neque a augue.</p>
                    </div>
                    <div class="contact__social">
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-facebook-square"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-8">
                    <form action="inc/sendemail.php" class="contact__form">
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="comment_input_box">
                                    <input type="text" placeholder="Tu nombre" name="name">
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="comment_input_box">
                                    <input type="email" placeholder="Dirección de correo electronico" name="email">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="comment_input_box">
                                    <input type="text" placeholder="Numero de telefono" name="phone">
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="comment_input_box">
                                    <input type="email" placeholder="Tema" name="Subject">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="comment_input_box">
                                    <textarea name="message" placeholder="Escribir mensaje"></textarea>
                                </div>
                                <button type="submit" class="thm-btn comment-form__btn">Enviar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!--Contact End-->
@endsection