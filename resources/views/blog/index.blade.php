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
    <!--Blog Two Start-->
    <section class="blog_one two blog-page">
        <div class="container">
            <div class="row">
                @foreach ($posts as $post)
                    <div class="col-xl-4 col-lg-4">
                        <!--Blog One Single-->
                        <div class="blog_one_single wow fadeInUp" data-wow-delay="00ms">
                            <div class="blog_one_image_box">
                                <div class="blog_one_img">
                                    <img src="http://127.0.0.1:8000/storage/{{ $post->imagen }}" alt="">
                                </div>
                                <div class="blog_one_date_box">
                                    <p>{{$post->fecha}}</p>
                                </div>
                            </div>
                            <div class="blog_one_content_box">
                                <h3><a href="{{route('blog.vistas', $post)}}">{{$post->titulo}}</a></h3>
                                <ul class="list-unstyled blog-one__meta">
                                    <li><a href="{{route('blog.vistas', $post)}}"><i class="far fa-user-circle"></i> {{$post->author}}</a></li>
                                    <li><span>/</span></li>
                                    <li><a href="{{route('blog.vistas', $post)}}"><i class="far fa-comments"></i> {{$post->comments}} Comentarios</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <ul class="list-unstyled post-pagination d-flex justify-content-center align-items-center">
                <li><a href="#"><i class="fa fa-angle-left"></i></a></li>
                <li><a href="#">01</a></li>
                <li><a href="#">02</a></li>
                <li><a href="#">03</a></li>
                <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
            </ul><!-- /.post-pagination -->
        </div>
    </section>
    <!--Blog Two End-->
@endsection