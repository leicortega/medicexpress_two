@extends('layouts.app')

@section('title', 'Blog - Medicexpress | '.$post->titulo)

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
                                <img src="{{ \Storage::url($post->imagen) }}" alt="">
                            </div>
                            <div class="news_details_date_box">
                                <p>{{$post->fecha}}</p>
                            </div>
                        </div>
                        <div class="news_details_content_box">
                            <h3 style="color: #000;">{{ $post->titulo }}</h3>
                            <ul class="list-unstyled news_details__meta">
                                <li><a href="#"><i class="far fa-user-circle"></i>{{$post->author}}</a></li>
                                <li><span>/</span></li>
                                <li><a href="#"><i class="far fa-comments"></i>2 Comments</a>
                                </li>
                            </ul>
                        </div>
                        <!-- contenido -->
                        <div class="news_details_text">
                            <?php echo $post->contenido; ?>
                        </div>
                        <!-- contenido end -->
                        {{-- carrousel --}}
                        @if ($post->galeria == 'Si')
                            <section class="explore_one" >
                                <div class="container">
                                    <div class="block-title text-left">
                                        <h4>Find Your Properties</h4>
                                        <h2>galeria de imagenes</h2>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="explore_one_inner_content">
                                                <div class="thm-swiper__slider swiper-container" data-swiper-options='{"spaceBetween": 100, "slidesPerView": 4, "autoplay": { "delay": 5000 }, "pagination": {
                                                        "el": "#testimonials-one-pagination",
                                                        "type": "bullets",
                                                        "clickable": true
                                                    },
                                                    "navigation": {
                                                        "nextEl": ".explore_one_prev",
                                                        "prevEl": ".explore_one_next",
                                                        "clickable": true
                                                    },
                                                    "breakpoints": {
                                                        "0": {
                                                            "spaceBetween": 30,
                                                            "slidesPerView": 1
                                                        },
                                                        "425": {
                                                            "spaceBetween": 30,
                                                            "slidesPerView": 1
                                                        },
                                                        "575": {
                                                            "spaceBetween": 30,
                                                            "slidesPerView": 1
                                                        },
                                                        "767": {
                                                            "spaceBetween": 30,
                                                            "slidesPerView": 1
                                                        },
                                                        "991": {
                                                            "spaceBetween": 20,
                                                            "slidesPerView": 3
                                                        },
                                                        "1289": {
                                                            "spaceBetween": 30,
                                                            "slidesPerView": 4
                                                        },
                                                        "1440": {
                                                            "spaceBetween": 30,
                                                            "slidesPerView": 5
                                                        }
                                                }}'>
                                                    <div class="swiper-wrapper">
                                                        @foreach ($post->media_posts as $key => $post_img)
                                                            <div class="swiper-slide">
                                                                <div class="explore_one_single">
                                                                    <div class="explore_one_img">
                                                                        <img src="{{ \Storage::url($post_img->imagen) }}" alt="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                <div class="explore_one_nav">
                                                    <div class="explore_one_next"><span class="icon-right-arrow"></span></div>
                                                    <div class="explore_one_prev"><span class="icon-right-arrow"></span> </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        @endif
                        
                        {{-- carrouse end --}}
                        <div class="news_details__bottom">
                            <p class="news_details__tags">
                                <span>Autor:</span>
                                <p>{{$post->author}}</p>
                                {{-- <a href="#">Business,</a>
                                <a href="#">Marketing</a> --}}
                            </p>
                            <div class="news_details__social-list">
                                <a href="#"><i class="fab fa-facebook-square"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                                <a href="#"><i class="fab fa-dribbble"></i></a>
                            </div>
                        </div>
                        {{-- <div class="author-one">
                            <div class="author-one__image">
                                <img src="{{asset('assets/img/blog/author-1-1.jpg')}}" alt="">
                            </div>
                            <div class="author-one__content">
                                <h3>Christine Eve</h3>
                                <p>It has survived not only five centuries, but also the leap into electronic
                                    typesetting,remaining unchanged. It was popularised in the sheets containing.
                                </p>
                            </div>
                        </div> --}}
                        <div class="comment-one">
                            <h3 class="comment-one__title">{{$post->comment}} Comments</h3>

                            @foreach ($post->comments as $comment)
                                <div class="comment-one__single">
                                    <div class="comment-one__image" style="width: 75px;">
                                        <img src="{{asset('assets/img/blog/comment-1-1.png')}}" alt="" style="width: 100%;">
                                    </div>
                                    <div class="comment-one__content">
                                        <h3>{{$comment->nombre}}</h3>
                                        <span style="font-size: 14px;">{{$comment->fecha}}</span>
                                        <p>{{$comment->contenido}}</p>
                                        {{-- <a href="#" class="thm-btn comment-one__btn">Reply</a> --}}
                                    </div>
                                </div>
                            @endforeach
                                
                           
                        </div>
                        {{-- realizar comentarios  --}}
                        <div class="comment-form">
                            <h3 class="comment-form__title">Realizar Comentario</h3>
                            <form action="{{route('blog.comment',$post)}}" class="comment-one__form" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="comment_input_box">
                                            <input type="text" placeholder="Nombre" name="nombre">
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="comment_input_box">
                                            <input type="email" placeholder="Correo" name="correo">
                                        </div>
                                        <div class="comment_input_box">
                                            <input type="hidden"  name="post_id" value="{{$post->id}}">
                                        </div>
                                    </div>
                                </div>                            
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="comment_input_box">
                                            <textarea name="contenido" placeholder="Mensaje"></textarea>
                                        </div>
                                        <button type="submit" class="thm-btn comment-form__btn">Comentar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        {{-- realizar comentarios end --}}
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5">
                    <div class="sidebar">
                        {{-- <div class="sidebar__single sidebar__search">
                            <h3 class="sidebar__title clr-white">Buscar</h3>
                            <form action="#" class="sidebar__search-form">
                                <input type="search" placeholder="Realizar busqueda">
                                <button type="submit"><i class="icon-magnifying-glass"></i></button>
                            </form>
                        </div> --}}
                        <div class="sidebar__single sidebar__post">
                            <h3 class="sidebar__title">Noticias Recientes</h3>
                            <ul class="sidebar__post-list list-unstyled">
                                @foreach ($posts as $post)
                                    <li>
                                        <div class="sidebar__post-image">
                                            <img src="{{\Storage::url($post->imagen) }}" alt="">
                                        </div>
                                        <div class="sidebar__post-content">
                                            <h3>
                                                <a href="#" class="sidebar__post-content_meta"><i
                                                        class="far fa-comments"></i>2 Comentarios</a>
                                                <a href="{{route('blog.vistas', $post)}}">{{$post->titulo}}</a>
                                            </h3>
                                        </div>
                                    </li>
                                @endforeach
                                
                            </ul>
                        </div>
                        {{-- <div class="sidebar__single sidebar__category">
                            <h3 class="sidebar__title">Categorias</h3>
                            <ul class="sidebar__category-list list-unstyled">
                                <li><a href="#">Medicina <span class="icon-right-arrow"></span></a></li>
                                <li><a href="#">Campañas de salud <span class="icon-right-arrow"></span></a></li>
                                <li><a href="#">Commercial <span class="icon-right-arrow"></span></a></li>
                                <li><a href="#">Covid 19 <span class="icon-right-arrow"></span></a></li>
                                <li><a href="#">Business Lisitings <span class="icon-right-arrow"></span></a></li>
                            </ul>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--News Details End-->
@endsection