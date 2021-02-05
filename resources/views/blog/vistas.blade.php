@extends('layouts.app')

@section('title', 'Blog - Medicexpress')

@section('content')
    <!--Page Header Start-->
    <section class="page-header" style="background-image: url({{asset('assets/img/blog/blog.jpg')}});">
        <div class="container">
            <div class="page-header-inner">
                <h2>Medicexpress - Blog</h2>
                <ul class="thm-breadcrumb list-unstyled">
                    <li><a href="{{route('index')}}">Inicio</a></li>
                    <li><span>/</span></li>
                    <li>Blog</li>
                </ul>
            </div>
        </div>
    </section>
    <!--Page Header End-->
    <!--News detials Start-->
    <section class="news_details">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-7">
                    <div class="news_details_left">
                        <div class="news_detials_img_box">
                            <div class="news_detials_img">
                                <img src="{{asset('assets/img/blog/news_details_img_1.jpg')}}" alt="">
                            </div>
                            <div class="news_details_date_box">
                                <p>20 Nov, 2020</p>
                            </div>
                        </div>
                        <div class="news_details_content_box">
                            <h3><a href="news-details.html">Save Thousands Selling Your Property</a></h3>
                            <ul class="list-unstyled news_details__meta">
                                <li><a href="#"><i class="far fa-user-circle"></i> Admin</a></li>
                                <li><span>/</span></li>
                                <li><a href="#"><i class="far fa-comments"></i> 2 Comments</a>
                                </li>
                            </ul>
                        </div>
                        <div class="news_details_text">
                            <p class="text_one">Lorem ipsum dolor sit amet, cibo mundi ea duo, vim exerci phaedrum.
                                There are many variations of passages of Lorem Ipsum available, but the majority
                                have alteration in some injected or words which don't look even slightly believable.
                                If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't
                                anything embarrang hidden in the middle of text. All the Lorem Ipsum generators on
                                the Internet tend to repeat predefined chunks as necessary, making this the first
                                true generator on the Internet. It uses a dictionary of over 200 Latin words,
                                combined with a handful of model sentence structures, to generate Lorem Ipsum which
                                looks reasonable.</p>
                            <p class="text_two">Lorem Ipsum has been the industry's standard dummy text ever since
                                the 1500s, when an unknown printer took a galley of type and scrambled it to make a
                                type simen book. It has survived not only five centuries, but also the leap into
                                electronic typesetting.</p>
                            <p class="text_three">Lorem Ipsum is simply dummy text of the printing and typesetting
                                industry. orem Ipsum has been the industry's standard dummy text ever since the when
                                an unknown printer took a galley of type and scrambled it to make a type specimen
                                book. It has survived not only five centuries, but also the leap into unchanged.</p>
                        </div>
                        <div class="news_details__bottom">
                            <p class="news_details__tags">
                                <span>Tags:</span>
                                <a href="#">Business,</a>
                                <a href="#">Marketing</a>
                            </p>
                            <div class="news_details__social-list">
                                <a href="#"><i class="fab fa-facebook-square"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                                <a href="#"><i class="fab fa-dribbble"></i></a>
                            </div>
                        </div>
                        <div class="author-one">
                            <div class="author-one__image">
                                <img src="{{asset('assets/img/blog/author-1-1.jpg')}}" alt="">
                            </div>
                            <div class="author-one__content">
                                <h3>Christine Eve</h3>
                                <p>It has survived not only five centuries, but also the leap into electronic
                                    typesetting,remaining unchanged. It was popularised in the sheets containing.
                                </p>
                            </div>
                        </div>
                        <div class="comment-one">
                            <h3 class="comment-one__title">2 Comments</h3>
                            <div class="comment-one__single">
                                <div class="comment-one__image">
                                    <img src="{{asset('assets/img/blog/comment-1-1.png')}}" alt="">
                                </div>
                                <div class="comment-one__content">
                                    <h3>Kevin Martin</h3>
                                    <p>It has survived not only five centuries, but also the leap into electronic
                                        typesetting unchanged. It was popularised in the sheets containing lorem
                                        ipsum is simply free text.</p>
                                    <a href="#" class="thm-btn comment-one__btn">Reply</a>
                                </div>
                            </div>
                            <div class="comment-one__single">
                                <div class="comment-one__image">
                                    <img src="{{asset('assets/img/blog/comment-1-2.png')}}" alt="">
                                </div>
                                <div class="comment-one__content">
                                    <h3>Sarah Albert</h3>
                                    <p>It has survived not only five centuries, but also the leap into electronic
                                        typesetting unchanged. It was popularised in the sheets containing lorem
                                        ipsum is simply free text.</p>
                                    <a href="#" class="thm-btn comment-one__btn">Reply</a>
                                </div>
                            </div>
                        </div>
                        <div class="comment-form">
                            <h3 class="comment-form__title">Realizar Comentario</h3>
                            <form action="inc/sendemail.php" class="comment-one__form">
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
                                        <button type="submit" class="thm-btn comment-form__btn">Comentar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5">
                    <div class="sidebar">
                        <div class="sidebar__single sidebar__search">
                            <h3 class="sidebar__title clr-white">Buscar</h3>
                            <form action="#" class="sidebar__search-form">
                                <input type="search" placeholder="Realizar busqueda">
                                <button type="submit"><i class="icon-magnifying-glass"></i></button>
                            </form>
                        </div>
                        <div class="sidebar__single sidebar__post">
                            <h3 class="sidebar__title">Noticias Recientes</h3>
                            <ul class="sidebar__post-list list-unstyled">
                                <li>
                                    <div class="sidebar__post-image">
                                        <img src="{{asset('assets/img/blog/lp-1-1.jpg')}}" alt="">
                                    </div>
                                    <div class="sidebar__post-content">
                                        <h3>
                                            <a href="#" class="sidebar__post-content_meta"><i
                                                    class="far fa-comments"></i>2 Comentarios</a>
                                            <a href="#">Commercial Home Approach with issue</a>
                                        </h3>
                                    </div>
                                </li>
                                <li>
                                    <div class="sidebar__post-image">
                                        <img src="{{asset('assets/img/blog/lp-1-2.jpg')}}" alt="">
                                    </div>
                                    <div class="sidebar__post-content">
                                        <h3>
                                            <a href="#" class="sidebar__post-content_meta"><i
                                                    class="far fa-comments"></i>2 Comentarios</a>
                                            <a href="#">Commercial Home Approach with issue</a>
                                        </h3>
                                    </div>
                                </li>
                                <li>
                                    <div class="sidebar__post-image">
                                        <img src="{{asset('assets/img/blog/lp-1-3.jpg')}}" alt="">
                                    </div>
                                    <div class="sidebar__post-content">
                                        <h3>
                                            <a href="#" class="sidebar__post-content_meta"><i
                                                    class="far fa-comments"></i>2 Comentarios</a>
                                            <a href="#">Commercial Home Approach with issue</a>
                                        </h3>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="sidebar__single sidebar__category">
                            <h3 class="sidebar__title">Categorias</h3>
                            <ul class="sidebar__category-list list-unstyled">
                                <li><a href="#">Medicina <span class="icon-right-arrow"></span></a></li>
                                <li><a href="#">Campañas de salud <span class="icon-right-arrow"></span></a></li>
                                <li><a href="#">Commercial <span class="icon-right-arrow"></span></a></li>
                                <li><a href="#">Covid 19 <span class="icon-right-arrow"></span></a></li>
                                <li><a href="#">Business Lisitings <span class="icon-right-arrow"></span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--News Details End-->
@endsection