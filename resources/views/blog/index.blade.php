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
                <div class="col-xl-4 col-lg-4">
                    <!--Blog One Single-->
                    <div class="blog_one_single wow fadeInUp" data-wow-delay="00ms">
                        <div class="blog_one_image_box">
                            <div class="blog_one_img">
                                <img src="{{asset('assets/img/blog/news_page_img_1.jpg')}}" alt="">
                            </div>
                            <div class="blog_one_date_box">
                                <p>20 Nov, 2020</p>
                            </div>
                        </div>
                        <div class="blog_one_content_box">
                            <h3><a href="{{route('blog.vistas')}}">Save Thousands Selling Your Property</a></h3>
                            <ul class="list-unstyled blog-one__meta">
                                <li><a href="{{route('blog.vistas')}}"><i class="far fa-user-circle"></i> Admin</a></li>
                                <li><span>/</span></li>
                                <li><a href="{{route('blog.vistas')}}"><i class="far fa-comments"></i> 2 Comments</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4">
                    <!--Blog One Single-->
                    <div class="blog_one_single wow fadeInUp" data-wow-delay="100ms">
                        <div class="blog_one_image_box">
                            <div class="blog_one_img">
                                <img src="{{asset('assets/img/blog/news_page_img_2.jpg')}}" alt="">
                            </div>
                            <div class="blog_one_date_box">
                                <p>20 Nov, 2020</p>
                            </div>
                        </div>
                        <div class="blog_one_content_box">
                            <h3><a href="{{route('blog.vistas')}}">Iterative approaches to corporate
                                    foster</a></h3>
                            <ul class="list-unstyled blog-one__meta">
                                <li><a href="{{route('blog.vistas')}}"><i class="far fa-user-circle"></i> Admin</a></li>
                                <li><span>/</span></li>
                                <li><a href="{{route('blog.vistas')}}"><i class="far fa-comments"></i> 2 Comments</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4">
                    <!--Blog One Single-->
                    <div class="blog_one_single wow fadeInUp" data-wow-delay="200ms">
                        <div class="blog_one_image_box">
                            <div class="blog_one_img">
                                <img src="{{asset('assets/img/blog/news_page_img_3.jpg')}}" alt="">
                            </div>
                            <div class="blog_one_date_box">
                                <p>20 Nov, 2020</p>
                            </div>
                        </div>
                        <div class="blog_one_content_box">
                            <h3><a href="{{route('blog.vistas')}}">Leverage agile frame works to a
                                    robust</a></h3>
                            <ul class="list-unstyled blog-one__meta">
                                <li><a href="{{route('blog.vistas')}}"><i class="far fa-user-circle"></i> Admin</a></li>
                                <li><span>/</span></li>
                                <li><a href="{{route('blog.vistas')}}"><i class="far fa-comments"></i> 2 Comments</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4">
                    <!--Blog One Single-->
                    <div class="blog_one_single wow fadeInUp" data-wow-delay="300ms">
                        <div class="blog_one_image_box">
                            <div class="blog_one_img">
                                <img src="{{asset('assets/img/blog/news_page_img_4.jpg')}}" alt="">
                            </div>
                            <div class="blog_one_date_box">
                                <p>20 Nov, 2020</p>
                            </div>
                        </div>
                        <div class="blog_one_content_box">
                            <h3><a href="{{route('blog.vistas')}}">Organically grow the holistic world view of</a></h3>
                            <ul class="list-unstyled blog-one__meta">
                                <li><a href="{{route('blog.vistas')}}"><i class="far fa-user-circle"></i> Admin</a></li>
                                <li><span>/</span></li>
                                <li><a href="{{route('blog.vistas')}}"><i class="far fa-comments"></i> 2 Comments</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4">
                    <!--Blog One Single-->
                    <div class="blog_one_single wow fadeInUp" data-wow-delay="400ms">
                        <div class="blog_one_image_box">
                            <div class="blog_one_img">
                                <img src="{{asset('assets/img/blog/news_page_img_5.jpg')}}" alt="">
                            </div>
                            <div class="blog_one_date_box">
                                <p>20 Nov, 2020</p>
                            </div>
                        </div>
                        <div class="blog_one_content_box">
                            <h3><a href="{{route('blog.vistas')}}">Bring to the table win-win survival strategies</a></h3>
                            <ul class="list-unstyled blog-one__meta">
                                <li><a href="{{route('blog.vistas')}}"><i class="far fa-user-circle"></i> Admin</a></li>
                                <li><span>/</span></li>
                                <li><a href="{{route('blog.vistas')}}"><i class="far fa-comments"></i> 2 Comments</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4">
                    <!--Blog One Single-->
                    <div class="blog_one_single wow fadeInUp" data-wow-delay="500ms">
                        <div class="blog_one_image_box">
                            <div class="blog_one_img">
                                <img src="{{asset('assets/img/blog/news_page_img_6.jpg')}}" alt="">
                            </div>
                            <div class="blog_one_date_box">
                                <p>20 Nov, 2020</p>
                            </div>
                        </div>
                        <div class="blog_one_content_box">
                            <h3><a href="{{route('blog.vistas')}}">At the end of the day, going forward, a new</a></h3>
                            <ul class="list-unstyled blog-one__meta">
                                <li><a href="{{route('blog.vistas')}}"><i class="far fa-user-circle"></i> Admin</a></li>
                                <li><span>/</span></li>
                                <li><a href="{{route('blog.vistas')}}"><i class="far fa-comments"></i> 2 Comments</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
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