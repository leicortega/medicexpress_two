@extends('layouts.app')

@section('title', 'Medicexpress')

@section('content')
    <!--Banner Three Start-->
    <section class="banner_three">
        <div class="banner_three_home_img">
            <img src="{{asset('assets/img/banner/slider3.jpeg')}}" alt="">
        </div>
        <div class="banner_three_shape_one"></div>
        <div class="banner_three_shape_two"></div>
        <div class="banner_three_shape_three"
            style="background-image: url({{asset('assets/img/shapes/banner_three_shape_3.png')}})"></div>
        <div class="banner_three_shape_four"
            style="background-image: url(assets/images/shapes/banner_three_shape_4.png)"></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-5">
                    <div class="banner_three_content">
                        <div class="banner_three_top_title">
                            <h2>Luxury <br> Downtown <br> Apartments</h2>
                            <p>From as low as $10 per day with limited time offer</p>
                        </div>
                        <div class="product-tab-box tabs-box">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Banner Three Start-->
    <!--Are You Ready Start-->
    <section class="are_you_ready two jarallax" data-jarallax data-speed="0.2" data-imgPosition="50% 0%"
    style="background-image: url({{asset('assets/img/banner/5.jpeg')}})">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="are_you_ready_content">
                    <div class="are_you_ready_shape"><img src="{{asset('assets/img//shapes/are_you_ready_shape.png')}}"
                            alt=""></div>
                    <h2>Nos especializamos en</h2>
                    <a href="listing-1.html" class="thm-btn">Leer mas..</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Are You Ready End-->
    <!--Three Icons Start-->
    <section class="three_icons">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="three_icons_inner">
                        <ul class="three_icons_list clearfix list-unstyled">
                            <li>
                                <div class="three_icons_box">
                                    <img src="{{asset('assets/img/iconos/medico.png')}}" alt="">
                                </div>
                                <div class="three_icons_text">
                                    <h4>Atención medica</h4>
                                    <p>Lorem ipsum is simply dolor <br> sit am adipi we help.</p>
                                </div>
                            </li>
                            <li>
                                <div class="three_icons_box">
                                    <img src="{{asset('assets/img/iconos/salud.png')}}" alt="">
                                </div>
                                <div class="three_icons_text">
                                    <h4>Salud ocupacional</h4>
                                    <p>Lorem ipsum is simply dolor <br> sit am adipi we help.</p>
                                </div>
                            </li>
                            <li>
                                <div class="three_icons_box">
                                    <img src="{{asset('assets/img/iconos/consultoria.png')}}" alt="">
                                </div>
                                <div class="three_icons_text">
                                    <h4>Consultorias</h4>
                                    <p>Lorem ipsum is simply dolor <br> sit am adipi we help.</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Three Icons End-->
    <!--About us-->
    <section class="featured_properties jarallax" data-jarallax data-speed="0.2" data-imgPosition="50% 0%"
        style="background-image: url(assets/images/backgrounds/featured_properties_bg.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="featured_properties_left wow slideInLeft" data-wow-delay="100ms">
                        <div class="featured_properties_img">
                            <img src="{{asset('assets/img/banner/6.jpeg')}}" alt="">
                            <!--<div class="featured_and_sale_btn">
                                <a href="#" class="featured_btn">Featured</a>
                                <a href="#" class="sale_btn">For Rent</a>
                            </div>-->
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="featured_properties_right">
                        <div class="block-title text-left">
                            <h4>--Nosotros--</h4>
                            <h2>Quienes Somos</h2>
                        </div>
                     <div class="featured_properties_text">
                            <p>Somos un grupo de profesionales dedicados al servicio privado en el área de la
                                 salud integral (medico/ambulatorio), salud ocupacional, jornadas preventivas de salud y consultorías en seguridad 
                                 y salud a
                                 toda la comunidad, trabajadores independientes, contratistas y empresas. Brindando CALIDAD Y SERVICIO.
                            </p>
                        </div>
                    <ul class="featured_properties_right_list list-unstyled">
                         <li><span class="icon-confirmation"></span>Misión</li>
                            <li><span class="icon-confirmation"></span>Visión
                            </li>
                            <li><span class="icon-confirmation"></span>Objetivo y principios de calidad
                            </li>
                        </ul>
                        <a href="#" class="thm-btn" style="margin-top: 27px;">Leer mas</a>
                    
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--About us End-->
    <!--Membership Plan Start-->
        <section class="membership_plan two">
            <div class="container">
                <div class="block-title text-center">
                    <h4>Choose the Right Plan</h4>
                    <h2>Membership Plans</h2>
                </div>
                <div class="row">
                    <div class="col-xl-4 col-lg-4">
                        <!--Membership Plan Single-->
                        <div class="membership_plan_single wow fadeInUp" data-wow-delay="00ms">
                            <div class="membership_plan_icon">
                                <span class="icon-home-1"></span>
                            </div>
                            <div class="membership_plan_price">
                                <p>Personal</p>
                                <h2>$20.00</h2>
                            </div>
                            <ul class="membership_plan_serivce_list list-unstyled">
                                <li><span class="fa fa-check"></span>10 Listings</li>
                                <li><span class="fa fa-check"></span>2 Featured Listings</li>
                            </ul>
                            <div class="membership_plan_btn">
                                <a href="#" class="thm-btn">Choose Plan</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4">
                        <!--Membership Plan Single-->
                        <div class="membership_plan_single wow fadeInUp" data-wow-delay="200ms">
                            <div class="membership_plan_icon">
                                <span class="icon-house"></span>
                            </div>
                            <div class="membership_plan_price">
                                <p>Professional</p>
                                <h2>$30.00</h2>
                            </div>
                            <ul class="membership_plan_serivce_list list-unstyled">
                                <li><span class="fa fa-check"></span>20 Listings</li>
                                <li><span class="fa fa-check"></span>6 Featured Listings</li>
                            </ul>
                            <div class="membership_plan_btn">
                                <a href="#" class="thm-btn">Choose Plan</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4">
                        <!--Membership Plan Single-->
                        <div class="membership_plan_single wow fadeInUp" data-wow-delay="300ms">
                            <div class="membership_plan_icon">
                                <span class="icon-cityscape"></span>
                            </div>
                            <div class="membership_plan_price">
                                <p>Business</p>
                                <h2>$40.00</h2>
                            </div>
                            <ul class="membership_plan_serivce_list list-unstyled">
                                <li><span class="fa fa-check"></span>40 Listings</li>
                                <li><span class="fa fa-check"></span>20 Featured Listings</li>
                            </ul>
                            <div class="membership_plan_btn">
                                <a href="#" class="thm-btn">Choose Plan</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <!--Membership Plan End-->
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
@endsection