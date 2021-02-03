@extends('layouts.app')
@section('title', 'Medicexpress - Servicios')

@section('content')
<!--Page Header Start-->
    <section class="page-header" style="background-image: url({{asset('assets/img/about/about.jpg')}});">
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
    <!--Why Choose One Start-->
    <section class="why_choose_two service-1">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-5">
                    <div class="why_choose_one_left">
                        {{-- <div class="why_choose_two_bg"
                            style="background-image: url({{asset('assets/img/resources/why_choose_two_bg.jpg')}})">
                        </div> --}}
                        <div class="block-title text-left">
                            <h2>Atención Medica</h2>
                        </div>
                        <ul class="why_choose_two_points list-unstyled">
                            <li>
                                <div class="icon">
                                    <span class="icon-checked"></span>
                                </div>
                                <div class="text">
                                    <p><strong>Atención Medica Móvil:</strong> <br>
                                    Familiar y/o Individual 24h/7
                                    Corporativo – VIP
                                     Asistencia médica en su domicilio, lugar de trabajo y/u otro lugar dentro de la Cobertura:
                                     Emergencias,
                                     Urgencias,
                                     Cita Medica,
                                     Tomas de muestras de Laboratorio,
                                     Traslado en ambulancia a su centro medico.
                                     </p>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <span class="icon-checked"></span>
                                </div>
                                <div class="text">
                                    <p><strong> Preventivas de Salud Corporativo: </strong><br>
                                        Programas Gratuitos de prevención a los trabajadores de las Empresas, con Servicios de: 
                                        Desparasitación y/o Nutrición, Ecografía abdominal Detección Hígado graso,
                                        Ecografía Mamaria, Prostática – Prevención de Cáncer, 
                                        Densitometría Ósea, 
                                        Campaña Dermatológica – Prevención cáncer de piel, 
                                        Campaña Odontológica.
                                    </p>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <span class="icon-checked"></span>
                                </div>
                                <div class="text">
                                    <p><strong> Preventivos y Correctivos de salud:</strong><br>
                                        Manejamos la venta por mayor y menor de medicamentos Farmacológicos, 
                                        Materiales Médicos y Quirúrgicos, 
                                        Artículos Ortopédicos.
                                    </p>
                                </div>
                            </li>
                        </ul>
                        <div class="why_choose_two_btn">
                            <a href="#" class="thm-btn">Search Property</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-7">
                    <div class="why_choose_right">
                        <div class="why_choose_right_img">
                            <img src="{{asset('assets/img/resources/why_choose_two_img_1.jpg')}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="why_choose_two ">
        <div class="container">
            <div class="row">
                <div class="col-xl-7 col-lg-7">
                    <div class="why_choose_right">
                        <div class="why_choose_right_img letf-choose">
                            <img src="{{asset('assets/img/resources/why_choose_two_img_1.jpg')}}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-5">
                    <div class="why_choose_one_left">
                        {{-- <div class="why_choose_two_bg"
                            style="background-image: url({{asset('assets/img/resources/why_choose_two_bg.jpg')}})"></div> --}}
                        <div class="block-title text-left">
                            <h2>Atención Medica</h2>
                        </div>
                        <ul class="why_choose_two_points list-unstyled">
                            <li>
                                <div class="icon">
                                    <span class="icon-checked"></span>
                                </div>
                                <div class="text">
                                    <p>Atención Medica Móvil</p>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <span class="icon-checked"></span>
                                </div>
                                <div class="text">
                                    <p>Cobertura de Eventos</p>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <span class="icon-checked"></span>
                                </div>
                                <div class="text">
                                    <p>Jornadas Preventivas de Salud Corporativo</p>
                                </div>
                            </li>
                        </ul>
                        <div class="why_choose_two_btn">
                            <a href="listing-1.html" class="thm-btn">Search Property</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="why_choose_two service-1">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-5">
                    <div class="why_choose_one_left">
                        {{-- <div class="why_choose_two_bg"
                            style="background-image: url({{asset('assets/img/resources/why_choose_two_bg.jpg')}})">
                        </div> --}}
                        <div class="block-title text-left">
                            <h2>Helping People to Find the Home</h2>
                        </div>
                        <ul class="why_choose_two_points list-unstyled">
                            <li>
                                <div class="icon">
                                    <span class="icon-checked"></span>
                                </div>
                                <div class="text">
                                    <p>Solution for small and large businesses voluptatem accusantium doloremque
                                        laudantium</p>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <span class="icon-checked"></span>
                                </div>
                                <div class="text">
                                    <p>Solution for small and large businesses voluptatem accusantium doloremque
                                        laudantium</p>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <span class="icon-checked"></span>
                                </div>
                                <div class="text">
                                    <p>Solution for small and large businesses voluptatem accusantium doloremque
                                        laudantium</p>
                                </div>
                            </li>
                        </ul>
                        <div class="why_choose_two_btn">
                            <a href="listing-1.html" class="thm-btn">Search Property</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-7">
                    <div class="why_choose_right">
                        <div class="why_choose_right_img">
                            <img src="{{asset('assets/img/resources/why_choose_two_img_1.jpg')}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Why Choose One End-->
@endsection