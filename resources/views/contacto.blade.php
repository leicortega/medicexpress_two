@extends('layouts.app')
@section('title', 'Medicexpress - Contácto')

@section('content')
    <!--Page Header Start-->
    <section class="page-header" style="background-image: url({{asset('assets/img/backgrounds/page-header_bg.jpg')}});">
        <div class="container">
            <div class="page-header-inner">
                <h2>Contácto</h2>
                <ul class="thm-breadcrumb list-unstyled">
                    <li><a href="index.html">Inicio</a></li>
                    <li><span>/</span></li>
                    <li>Contácto</li>
                </ul>
            </div>
        </div>
    </section>
    <!--Page Header End-->

    <!--Locations Start-->
    <section class="locations">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-6 col-md-6">
                    <!--Locations Single-->
                    <div class="locations_three_single">
                        <div class="locations_three_title">
                            <h3>Austin</h3>
                            <p>22 Texas West Hills</p>
                        </div>
                        <div class="locations_three_contact">
                            <a href="mailto:needhelp@tolins.com" class="mail_box">needhelp@tolins.com</a>
                            <a href="tel:888-999-0000" class="number_box">888 999 0000</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6">
                    <!--Locations Single-->
                    <div class="locations_three_single">
                        <div class="locations_three_title">
                            <h3>Boston</h3>
                            <p>5 Federal Street Boston</p>
                        </div>
                        <div class="locations_three_contact">
                            <a href="mailto:needhelp@tolins.com" class="mail_box">needhelp@tolins.com</a>
                            <a href="tel:888-999-0000" class="number_box">888 999 0000</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6">
                    <!--Locations Single-->
                    <div class="locations_three_single">
                        <div class="locations_three_title">
                            <h3>New York</h3>
                            <p>8th Broklyn New York</p>
                        </div>
                        <div class="locations_three_contact">
                            <a href="mailto:needhelp@tolins.com" class="mail_box">needhelp@tolins.com</a>
                            <a href="tel:888-999-0000" class="number_box">888 999 0000</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6">
                    <!--Locations Single-->
                    <div class="locations_three_single">
                        <div class="locations_three_title">
                            <h3>Baltimore</h3>
                            <p>3 Lombabr 50 baltimore</p>
                        </div>
                        <div class="locations_three_contact">
                            <a href="mailto:needhelp@tolins.com" class="mail_box">needhelp@tolins.com</a>
                            <a href="tel:888-999-0000" class="number_box">888 999 0000</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Locations End-->

    <!--Contact Start-->
    <section class="contact">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-4">
                    <div class="block-title text-left">
                        <h4>Contact Us</h4>
                        <h2>Love to Hear From You</h2>
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
                    <form action="#" class="contact__form">
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="comment_input_box">
                                    <input type="text" placeholder="Nombre" name="name">
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="comment_input_box">
                                    <input type="email" placeholder="Correo" name="email">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="comment_input_box">
                                    <input type="text" placeholder="Telefono" name="phone">
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="comment_input_box">
                                    <input type="email" placeholder="Asunto" name="Subject">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="comment_input_box">
                                    <textarea name="message" placeholder="Mensaje"></textarea>
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

    <!--Google Map-->
    <section class="google_map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3987.0196366221985!2d-79.90515228529752!3d-2.146166298435592!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x902d6d76af04bcdd%3A0xd2266f5e6903676f!2sUrdenor%201%2C%20Guayaquil%20090509%2C%20Ecuador!5e0!3m2!1ses-419!2sco!4v1612329878190!5m2!1ses-419!2sco"
         frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0" class="google-map__contact"></iframe>

    </section>
@endsection