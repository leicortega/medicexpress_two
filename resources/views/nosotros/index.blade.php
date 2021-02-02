@extends('layouts.app')

@section('title','medicexpress - Quienes somos')

@section('content')
    <!--Page Header Start-->
    <section class="page-header" style="background-image: url({{asset('assets/img/about/about.jpg')}});">
        <div class="container">
            <div class="page-header-inner">
                <h2>Quienes somos</h2>
                <ul class="thm-breadcrumb list-unstyled">
                    <li><a href="{{route('index')}}">Inicio</a></li>
                    <li><span>/</span></li>
                    <li>Contácto</li>
                </ul>
            </div>
        </div>
    </section>
    <!--Page Header End-->
    <!--About Page Start-->
    <!--quienes somos-->
    <section class="about_page">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="about_page_left">
                        <div class="about_page_img">
                            <img src="{{asset('assets/img/about/5.jpeg')}}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="about_page_right">
                        <div class="block-title text-left">
                            <h2>Quienes somos</h2>
                        </div>
                        <div class="about_page_right_text">
                            <p class="second_text">Somos un grupo de profesionales dedicados al servicio privado 
                                en el área de la salud integral (medico/ambulatorio), salud ocupacional, jornadas preventivas de salud y
                                consultorías en seguridad y salud a toda la comunidad, trabajadores independientes, contratistas y empresas.
                                Brindando CALIDAD Y SERVICIO.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--About Page End-->
    <!--Are You Ready Start-->
    <section class="are_you_ready jarallax" data-jarallax data-speed="0.2" data-imgPosition="50% 0%"
        style="background-image: url({{asset('assets/img/about/fondo.jpg')}})">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="are_you_ready_content">
                        <div class="are_you_ready_shape"><img src="{{asset('assets/img/shapes/are_you_ready_shape.png')}}"
                            alt=""></div>
                     <h2>¿Que esperas para unirte?</h2>
                     <a href="listing-1.html" class="thm-btn">Cotizar ahora</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Are You Ready End-->
    <!--mision-->
    <section class="about_page">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="about_page_left">
                        <div class="block-title text-left">
                            <h2>Misión</h2>
                        </div>
                        <div class="about_page_right_text">
                            <p class="second_text">Quisq commodo simply free ornar tortor. Excepteur sint occaecat
                                sunt in culpa qui officia deserunt mollit anim id est laborum. Claritas est etiam
                                processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare
                                quam littera gothica, quam nunc putamus parum claram.</p>
                        </div>
                        <ul class="about_page_list list-unstyled">
                            <li><i class="fa fa-check"></i>Invest in your simply neighborhood</li>
                            <li><i class="fa fa-check"></i>Support people in free text extreme need</li>
                            <li><i class="fa fa-check"></i>Largest global industrial business community</li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="about_page_left">
                        <div class="about_page_img">
                            <img src="{{asset('assets/img/about/about_page_img_1.jpg')}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--vision-->
    <section class="about_page">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="about_page_left">
                        <div class="about_page_img">
                            <img src="{{asset('assets/img/about/about_page_img_1.jpg')}}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="about_page_right">
                        <div class="block-title text-left">
                            <h2>Visión</h2>
                        </div>
                        <div class="about_page_right_text">
                            <p class="second_text">Quisq commodo simply free ornar tortor. Excepteur sint occaecat
                                sunt in culpa qui officia deserunt mollit anim id est laborum. Claritas est etiam
                                processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare
                                quam littera gothica, quam nunc putamus parum claram.</p>
                        </div>
                        <ul class="about_page_list list-unstyled">
                            <li><i class="fa fa-check"></i>Invest in your simply neighborhood</li>
                            <li><i class="fa fa-check"></i>Support people in free text extreme need</li>
                            <li><i class="fa fa-check"></i>Largest global industrial business community</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--CTA One Start-->
    <section class="cta_one" data-jarallax data-speed="0.2" data-imgPosition="50% 0%" style="background-image: url({{asset('assets/img/about/fondo2.jpg')}})">
        {{-- <div class="cta_one_bg" style="background-image: url({{asset('assets/img/about/fondo2.jpg')}})"></div> --}}
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="cta_one_inner">
                        <div class="cta_one_text">
                            <h2>Conoce nuestros servicos</h2>
                        </div>
                        <div class="cta_one_btn">
                            <a href="listing-1.html" class="thm-btn">Leer mas</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--CTA One End-->
    <!--objetivos-->
    <section class="about_page">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="about_page_left">
                        <div class="block-title text-left">
                            <h2>Objetivo</h2>
                        </div>
                        <div class="about_page_right_text">
                            <p class="second_text">Nuestro objetivo esta con el compromiso social de preservar la salud y
                                salvar vidas, estando disponibles y dispuestos ayudar a nuestros afiliados y su entorno familiar y 
                                queriendo que estén más seguros en su vida cotidiana prestándole siempre un excelente servicio integral 
                                y aumentar la calidad de sus vidas.
                                Forjando juntos una intervención efectiva, eficiente y eficaz al compromiso de mejorar la calidad 
                                de vida y siguiendo las normativas vigentes establecidas a nivel Nacional.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="about_page_left">
                        <div class="about_page_img">
                            <img src="{{asset('assets/img/about/slider4.jpeg')}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection