@extends('layouts.app')
@section('title', 'Medicexpress - Servicios')

@section('content')
<!--Page Header Start-->
    <section class="page-header" style="background-image: url({{asset('assets/img/about/about.jpeg')}});">
        <div class="container">
            <div class="page-header-inner">
                <h2>Servicios</h2>
                <ul class="thm-breadcrumb list-unstyled">
                    <li><a href="{{route('index')}}">Inicio</a></li>
                    <li><span>/</span></li>
                    <li>Servicios</li>
                </ul>
         </div>
     </div>
    </section>
<!--Page Header End-->

    <!--servicios img Start-->
    <section class="explore_two">
        <div class="container">
            <div class="block-title text-center">
                <h2>Explore nuestros servicios</h2>
            </div>
            <div class="explore_two_top">
                <div class="row">
                    <div class="col-xl-6 col-lg-6">
                        <!--Explore Two Top single-->
                        <div class="explore_two_top_single">
                            <div class="explore_two_top_img">
                                <img src="{{asset('assets/img/banner/slider3.jpeg')}}" alt="">
                                <div class="explore_two_top_text">
                                    <p>Atención Medica Móvil</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <!--Explore Two Top single-->
                        <div class="explore_two_top_single">
                            <div class="explore_two_top_img">
                                <img src="{{asset('assets/img/banner/14.jpeg')}}" alt="">
                                <div class="explore_two_top_text">
                                    <p>Cobertura de Eventos</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="explore_two_bottom">
                <div class="row">
                    <div class="col-xl-4 col-lg-4">
                        <!--Explore Two Bottom Single-->
                        <div class="explore_two_bottom_single">
                            <div class="explore_two_bottom_img">
                                <img src="{{asset('assets/img/banner/slider4.jpeg')}}" alt="">
                                <div class="explore_two_bottom_text">
                                    <p>Jornadas Preventivas de Salud Corporativo</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4">
                        <!--Explore Two Bottom Single-->
                        <div class="explore_two_bottom_single">
                            <div class="explore_two_bottom_img">
                                <img src="{{asset('assets/img/banner/5.jpeg')}}" alt="">
                                <div class="explore_two_bottom_text">
                                    <p>Salud pre/pos ocupacional</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4">
                        <!--Explore Two Bottom Single-->
                        <div class="explore_two_bottom_single">
                            <div class="explore_two_bottom_img">
                                <img src="{{asset('assets/img/banner/6.jpeg')}}" alt="">
                                <div class="explore_two_bottom_text">
                                    <p>Consultorias</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--servicios img End-->

    <!--atencion-medica Start-->
    <section class="testimonials_two">
        <div class="container_box">
            <div class="block-title text-center">
                <h2>Atención Medica</h2>
            </div>
            <div class="row">

                <div class="col-xl-4 col-lg-4">
                    <!--Testimonials Two Single-->
                    <div class="testimonials_two_single wow fadeInUp" data-wow-delay="00ms">
                        <div class="testimonials_two_text">
                            <p>
                                <strong>Atención Medica Móvil:</strong> <br>
                                Familiar y/o Individual 24h/7,  Corporativo – VIP, Asistencia médica en su domicilio, 
                                lugar de trabajo y/u otro lugar dentro de la Cobertura:
                                <div id="servicio-atencion1" class="collapse">
                                    <ul>
                                        <li><p>Emergencias</p></li>
                                        <li><p>Urgencias</p></li>
                                        <li><p>Cita Medica</p></li>
                                        <li><p>Tomas de muestras de Laboratorio</p></li>
                                        <li><p>Traslado en ambulancia a su centro medico</p></li>
                                    </ul>
                                </div>
                                <a href="#servicio-atencion1" class="thm-btn" data-toggle="collapse" style="margin-top: 32px;">leer mas</a>
                            </p>
                        </div>
                    </div>
                </div>
                
                <div class="col-xl-4 col-lg-4">
                    <!--Testimonials Two Single-->
                    <div class="testimonials_two_single wow fadeInUp" data-wow-delay="00ms">
                        <div class="testimonials_two_text">
                            <p>
                                <strong>Jornadas Preventivas de Salud Corporativo: </strong> <br>
                                Programas Gratuitos de prevención a los trabajadores de las Empresas, con Servicios de:
                                <div id="servicio-atencion2" class="collapse">
                                    <ul>
                                        <li><p>Desparasitación y/o Nutrición</p></li>
                                        <li><p>Ecografía abdominal Detección Hígado graso</p></li>                                    
                                        <li><p>Ecografía Mamaria, Prostática – Prevención de Cáncer</p></li>                                       
                                        <li><p>Densitometría Ósea </p></li>                                     
                                        <li><p>Campaña Dermatológica – Prevención cáncer de piel</p></li>                                       
                                    </ul>
                                </div>
                                <a href="#servicio-atencion2" class="thm-btn" data-toggle="collapse" style="margin-top: 32px;">leer mas</a>                            
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4">
                    <!--Testimonials Two Single-->
                    <div class="testimonials_two_single wow fadeInUp" data-wow-delay="00ms">
                        <div class="testimonials_two_text">
                            <p>
                                <strong>Insumos Preventivos y Correctivos de salud: </strong> <br>
                                Manejamos la venta por mayor y menor de medicamentos Farmacológicos.
                                <div id="servicio-atencion3" class="collapse">
                                    <ul>
                                        <li><p>Materiales Médicos y Quirúrgicos</p></li>                                       
                                        <li><p>Artículos Ortopédicos</p></li>                                        
                                    </ul>
                                </div>
                                <a href="#servicio-atencion3" class="thm-btn" data-toggle="collapse" style="margin-top: 32px;">leer mas</a>                            
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--atencion-medica End-->

    <!--salud-ocupacional Start-->
    <section class="why_choose_two service-1">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-5">
                    <div class="why_choose_one_left">
                        {{-- <div class="why_choose_two_bg"
                            style="background-image: url({{asset('assets/img/resources/why_choose_two_bg.jpg')}})">
                        </div> --}}
                        <div class="block-title text-left">
                            <h2>Salud Ocupacional</h2>
                        </div>
                        <ul class="why_choose_two_points list-unstyled">
                            <li>
                                <div class="icon">
                                    <span class="icon-checked"></span>
                                </div>
                                <div class="text">
                                    <p>Cuente con nuestra ética e Imparcialidad para realizar 
                                        valoraciones médicas laborales indispensables para procesos de calificación de origen, 
                                        determinación de perdida de la capacidad laboral y reubicación. 
                                    </p>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <span class="icon-checked"></span>
                                </div>
                                <div class="text">
                                    <p>Disponemos de profesionales médicos especializados en salud ocupacional.
                                    </p>
                            </li>
                            <i ></i>
                        </ul>
                        
                    </div>
                </div>
                <div class="col-xl-7 col-lg-7">
                    <div class="why_choose_right">
                        <div class="why_choose_right_img">
                            <img src="{{asset('assets/img/banner/7.jpeg')}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--salud-ocupacional End-->

    <!--cotizacion Start-->
    <section class="cta_one" data-jarallax data-speed="0.2" data-imgPosition="50% 0%" style="background-image: url({{asset('assets/img/about/fondo2.jpeg')}})">
        {{-- <div class="cta_one_bg" style="background-image: url({{asset('assets/img/about/fondo2.jpg')}})"></div> --}}
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="cta_one_inner">
                        <div class="cta_one_text">
                            <h2>Puedes Realizar Tu Cotización Sin Problemas</h2>
                        </div>
                        <div class="cta_one_btn">
                            <a href="listing-1.html" class="thm-btn" data-toggle="modal" data-target="#cotizar">Cotizar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--cotizacion End-->

    <!--consultorias Start-->
    <section class="testimonials_two">
        <div class="container_box">
            <div class="block-title text-center">
                <h2>Consultorias</h2>
            </div>
            <div class="row">

                <div class="col-xl-8 col-lg-8" style="margin: auto;">
                    <!--Testimonials Two Single-->
                    <div class="testimonials_two_single wow fadeInUp" data-wow-delay="00ms">
                        <div class="testimonials_two_text">
                            <p>
                                <strong>Consultorias</strong> <br>
                                Análisis y explicación de conceptos de exámenes ocupacionales previos o
                                de dictámenes de calificación de pérdida de la capacidad laboral.
                                <div id="servicio-atencion1" class="collapse">
                                    <ul>
                                        <li><p>Diseño e implementación de los programas de vigilancia epidemiológica de su empresa.</p></li>
                                        <li><p>Diseño de intervenciones en salud con base en los datos de cada empresa. </p></li>                              
                                        <li><p>Acompañamiento en los procesos de diseño e implementación de sistemas de gestión de la seguridad y salud en el trabajo.</p></li>
                                        <li><p>Programa de prevención de Obligatorio Cumplimiento de Capacitación en:
                                        Programa de Alcohol y Drogas en el Trabajo, Prevención de Violencia Psicosocial, 
                                        Prevención de Salud Reproductiva y/o Prevención de Riesgos Psicosociales.</p></li>
                                    </ul>
                                </div>
                                <a href="#servicio-atencion1" class="thm-btn" data-toggle="collapse" style="margin-top: 32px;">leer mas</a>
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--consultorias End-->
@endsection