<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>@yield('title')</title>
        <link rel="icon" type="image/png" sizes="32x32" href="{{asset('assets/img/logo/icono.svg')}}">
        <!-- Fonts-->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
            rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        {{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}
        <!-- Css-->
        <link rel="stylesheet" href="{{asset('assets/css/animate.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/owl.theme.default.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/magnific-popup.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/fontawesome-all.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/swiper.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/bootstrap-select.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/jarallax.css')}}">

        <link rel="stylesheet" href="{{asset('assets/css/jquery.mCustomScrollbar.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/bootstrap-datepicker.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/vegas.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/nouislider.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/nouislider.pips.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/tolips.css')}}">
        {{-- <link rel="stylesheet" href="{{asset('assets/js/plugins/select2/css/select2.min.css')}}"> --}}
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <!-- Template styles -->
        <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">

        <meta name="csrf-token" content="{{ csrf_token() }}">

    </head>
<body>
    <div class="page-wrapper">
        <div class="preloader">
            <img src="{{asset('assets/img/logo/logo.svg')}}" class="preloader__image" alt="">
        </div><!-- /.preloader -->
        <!-- ===============header ===================-->
        <div class="site-header__header-one-wrap clearfix">
            <!-- header-top-->
            <div class="header_top_one">
                <div class="container">
                    <div class="header_top_one_inner clearfix">
                        <div class="header_top_one_logo_box float-left">
                            <div class="header_top_one_logo">
                                <a href="#"><img src="{{asset('assets/img/logo/logo.svg')}}" alt="" style="width: 200px"></a>
                            </div>
                        </div>
                        <div class="header_top_one_content_box float-right">
                            <!-- <div class="header_top_one_content_box_top clearfix">
                                <div class="header_top_one_content_box_top_left float-left">
                                    <p>Bienvenido a Medicexpress</p>
                                </div>
                                <div class="header_top_one_content_box_top_right float-right">
                                    <ul class="list-unstyled header_top_one_content_box_top_right_list">
                                        <li><a href="#">Soporte<span>/</span></a></li>
                                        <li><a href="#">Lista de deseos<span>/</span></a></li>
                                        <li><a href="#">Mi cuenta</a></li>
                                    </ul>
                                </div>
                            </div> -->
                            <div class="header_top_one_content_box_bottom">
                                <div class="header_top_one_content_box_bottom_inner clearfix">
                                    <!--<div class="header_top_one_content_box_bottom__social_box">
                                        <div class="header_top_one_content_box_bottom__social">
                                            <a href="#"><i class="fab fa-twitter"></i></a>
                                            <a href="#"><i class="fab fa-facebook-square"></i></a>
                                            <a href="#"><i class="fab fa-instagram"></i></a>
                                        </div> -->
                                    </div>
                                    <div class="header_top_one_content_box_bottom_contact_info">
                                        <ul class="header_top_one_content_box_bottom_contact_info_list list-unstyled">
                                            <li>
                                                <div class="icon">
                                                    <span class="icon-phone-call"></span>
                                                </div>
                                                <div class="text">
                                                    <p>Telefono</p>
                                                    <a href="tel:+593 969 665 037">+593 969 665 037</a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="icon">
                                                    <span class="icon-message"></span>
                                                </div>
                                                <div class="text">
                                                    <p>Correo</p>
                                                    <a href="mailto:servicioalcliente@medicexpress.com">servicioalcliente@medicexpress.com</a>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /header-top-->
            <header class="main-nav__header-one">
                <div class="container">
                    <nav class="header-navigation one stricky">
                        <div class="container-box clearfix">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="main-nav__left main-nav__left_one float-left">
                                <a href="#" class="side-menu__toggler">
                                    <i class="fa fa-bars"></i>
                                </a>
                                <div class="main-nav__main-navigation one clearfix">
                                    <ul class=" main-nav__navigation-box float-left">
                                        <li>
                                            <a href="{{ route('index') }}" class="{{request()->routeIs('index') ? 'enlace' : ''}}">Inicio</a>
                                        </li>
                                        <li class="dropdown">
                                            <a href="{{ route('nosotros.index')}}" class="{{request()->routeIs('nosotros.index') ? 'enlace' : ''}}">Quienes somos</a>
                                            <ul>
                                                <li><a href="{{ route('nosotros.index')}}" >Misión</a></li>
                                                <li><a href="{{ route('nosotros.index')}}" >Visión</a></li>
                                                <li><a href="{{ route('nosotros.index')}}" >Objetivos y principios</a></li>
                                                <li><a href="{{ route('nosotros.index')}}" >Valores</a></li>
                                            </ul><!-- /.sub-menu -->
                                        </li>
                                        <li class="dropdown">
                                            <a href="{{route('servicios.index')}}" class="{{request()->routeIs('servicios.index') ? 'enlace' : ''}}">Servicios</a>
                                            <ul>
                                                <li><a href="{{route('servicios.index')}}">Atención medica</a></li>
                                                <li><a href="{{route('servicios.index')}}">Salud ocupacional</a></li>
                                                <li><a href="{{route('servicios.index')}}">Consultorias</a></li>
                                            </ul><!-- /.sub-menu -->
                                        </li>
                                        <li>
                                            <a href="{{route('blog.index')}}" class="{{request()->routeIs('blog.index') ? 'enlace' : ''}}">Blog</a>
                                        </li>

                                        <li>
                                            <a href="{{route('contacto')}}" class="{{request()->routeIs('contacto') ? 'enlace' : ''}}">Contactenos</a>
                                        </li>
                                        {{-- <li>
                                            <a href="{{route('admin')}}" target="_blank" >Admin</a>
                                        </li> --}}
                                    </ul>
                                </div><!-- /.navbar-collapse -->
                            </div>
                            <div class="main-nav__right main-nav__right_one float-right">
                                <div class="header_btn_1">
                                    <a href="{{route('contacto')}}" class="thm-btn" data-toggle="modal" data-target="#cotizar">Cotizar Ahora</a>
                                </div>
                                <!--<div class="icon_cart_box">
                                    <a href="#">
                                        <span class="icon-shopping-cart"></span>
                                    </a>
                                </div>
                                <div class="icon_search_box">
                                    <a href="#" class="main-nav__search search-popup__toggler">
                                        <i class="icon-magnifying-glass"></i>
                                    </a>
                                </div>-->
                            </div>
                        </div>
                    </nav>
                </div>
            </header>
        </div>

        <!--modal cotizar-->
        <div class="container">
            {{-- <h2>Modal Example</h2>
            <!-- Button to Open the Modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cotizar">
            Open modal
            </button> --}}

            <!-- The Modal -->
            <div class="modal fade" id="cotizar" style="margin-top: 10vh;">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        {{-- <div class="modal-header">
                            <h4 class="modal-title">Realizar Cotización</h4>

                        </div> --}}

                        <!-- Modal body -->
                        <div class="modal-body pt-5" style="padding-top: 1rem !important">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <div class="block-title text-center" style="padding: 2rem 5rem;">
                                <h2>Selecciona los sevicios a cotizar</h2>
                            </div>

                            <div id="content_servicios" style="padding: 2rem 4rem;">



                            </div>
                        </div>

                        <!-- Modal footer -->
                        {{-- <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                        </div> --}}

                        </div>
                    </div>
                </div>
            </div>
        <!--modal cotizar end-->


        @yield('content')

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
        <!--Site Footer One Start-->
        <footer class="site_footer">
            <div class="container">
                <div class="site_footer_one_top">
                    <div class="row">
                        <div class="col-xl-3 col-lg-6 wow fadeInUp" data-wow-delay="00ms">
                            <div class="footer-widget__column footer_widget__about">
                                <div class="footer_logo">
                                    <a href="#"><img src="{{asset('assets/img/logo/logo.svg')}}" alt="" style=" width: 225px;"></a>
                                </div>
                                <div class="footer_widget_about_text">
                                    <p>Forjando juntos una intervención efectiva, eficiente y eficaz al
                                        compromiso de mejorar la calidad de vida y siguiendo las normativas vigentes
                                        establecidas a nivel Nacional.</p>
                                </div>
                                <div class="footer_call_agent_box">
                                    <div class="icon">
                                        <span class="icon-phone-call"></span>
                                    </div>
                                    <div class="text">
                                        <p>Telefono</p>
                                        <a href="tel:+593 969 665 037">+593 969 665 037</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6 wow fadeInUp" data-wow-delay="200ms">
                            <div class="footer-widget__column footer_widget__explore clearfix">
                                <div class="footer-widget__title">
                                    <h3>Explorar</h3>
                                </div>
                                <ul class="footer_widget__explore_list list-unstyled">
                                    <li><a href="{{route('nosotros.index')}}">Sobre nosotros</a></li>
                                    <li><a href="{{route('servicios.index')}}">Servicios</a></li>
                                    <li><a href="{{route('blog.index')}}">Blog</a></li>
                                    <li><a href="{{route('contacto')}}">Contácto</a></li>
                                    <li><a href="{{route('admin')}}" target="_blank">Admin</a></li>
                                </ul>
                                <!--<ul class="footer_widget__explore_list two list-unstyled">
                                    <li><a href="#">Our Agents</a></li>
                                    <li><a href="#">Contact</a></li>
                                    <li><a href="#">FAQs</a></li>
                                    <li><a href="#">Blog</a></li>
                                </ul>-->
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-8 wow fadeInUp" data-wow-delay="300ms">
                            <div class="footer-widget__column footer_widget__newsletter">
                                <div class="footer-widget__title">
                                    <h3>Boletin informativo</h3>
                                </div>
                                <form action="#" class="footer_form">
                                    <div class="footer_input_box">
                                        <input type="email" name="email" placeholder="Correo electronico">
                                        <button type="submit" class="button" style="font-size: 14px">Suscribirse</button>
                                    </div>
                                </form>
                                <div class="footer_widget__newsletter_bottom">
                                    <p>Urdenor 1 MZ 139 EDIF. Citrino Ofc305</p>
                                    <a href="mailto:servicioalcliente@medicexpress.com">servicioalcliente@medicexpress.com</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!--Site Footer One End-->
        <!--Site Footer Bottom Start-->
        <div class="site_footer_bottom">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="site_footer_inner">
                            <div class="site_footer_left">
                                <p>© Copyright 2021 by <a href="{{route('index')}}">medicexpress</a></p>
                            </div>
                            <div class="site_footer__social">
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-facebook-square"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Site Footer Bottom End-->
    </div>
    <!--==================whatsapp====================-->
    <div class="btn-whatsapp scroll-to-target">
        <a href="https://api.whatsapp.com/send?phone=+593 969 665 037" target="_blank">
            <img src="http://s2.accesoperu.com/logos/btn_whatsapp.png" alt="" style="width: 60px">
        </a>
    </div>
    <a href="#" data-target="html" class="scroll-to-target scroll-to-top"><i class="fa fa-angle-up"></i></a>

    <div class="mobile-nav__wrapper">
        <div class="mobile-nav__overlay side-menu__toggler mobile-nav__toggler"></div>
        <div class="mobile-nav__content">
            <span class="mobile-nav__close side-menu__toggler mobile-nav__toggler">
                <i class="fa fa-times"></i>
            </span>
            <div class="logo-box">
                <a href="index.html" aria-label="logo image">
                    <img src="assets/images/resources/logo-2.png" alt="" />
                </a>
            </div>
            <!-- /.logo-box -->
            <div class="mobile-nav__container clearfix"></div>
            <!-- /.mobile-nav__container -->
            <ul class="mobile-nav__contact list-unstyled">
                <li>
                    <i class="icon-message"></i>
                    <a href="mailto:servicioalcliente@medicexpress.com">servicio al cliente</a>
                </li>
                <li>
                    <i class="icon-phone-call"></i>
                    <a href="tel:+593 969 665 037">+593 969 665 037</a>
                </li>
            </ul><!-- /.mobile-nav__contact -->
            <div class="mobile-nav__top">
                <div class="mobile-nav__social">
                    <a href="#" aria-label="twitter"><i class="fab fa-twitter"></i></a>
                    <a href="#" aria-label="facebook"><i class="fab fa-facebook-square"></i></a>
                    <a href="#" aria-label="pinterest"><i class="fab fa-pinterest-p"></i></a>
                    <a href="#" aria-label="instagram"><i class="fab fa-instagram"></i></a>
                </div><!-- /.mobile-nav__social -->
            </div><!-- /.mobile-nav__top -->
        </div>
    </div>

    <!-- =============scripts============ -->
    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets/js/waypoints.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('assets/js/TweenMax.min.js')}}"></script>
    <script src="{{asset('assets/js/wow.js')}}"></script>
    <script src="{{asset('assets/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.ajaxchimp.min.js')}}"></script>
    <script src="{{asset('assets/js/swiper.min.js')}}"></script>
    <script src="{{asset('assets/js/typed-2.0.11.js')}}"></script>
    <script src="{{asset('assets/js/vegas.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.validate.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap-select.min.js')}}"></script>
    <script src="{{asset('assets/js/countdown.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{asset('assets/js/nouislider.min.js')}}"></script>
    <script src="{{asset('assets/js/isotope.js')}}"></script>
    <script src="{{asset('assets/js/appear.js')}}"></script>
    <script src="{{asset('assets/js/jarallax.js')}}"></script>
    <script src="http://maps.google.com/maps/api/js?key=AIzaSyATY4Rxc8jNvDpsK8ZetC7JyN4PFVYGCGM"></script>
    {{-- <script src="{{asset('assets/js/plugins/select2/js/select2.full.min.js')}}"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- template scripts -->
    <script src="{{asset('assets/js/theme.js')}}"></script>
    <script src="{{asset('assets/js/index.js')}}"></script>
</body>
</html>
