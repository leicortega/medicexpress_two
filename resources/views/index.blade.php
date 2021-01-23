@extends('layouts.app')

@section('title', 'Medicexpress')

@section('content')
     <!-- Banner Section One Start -->
     <section class="banner-one">
        <div class="banner-bg-slide"
            data-options='{ "delay": 5000, "slides": [ { "src": "{{asset('assets/img/banner/5.jpeg')}}" },
             { "src": "{{asset('assets/img/banner/10.jpeg')}}" } , { "src": "{{asset('assets/img/banner/slider3.jpeg')}}" }], "transition": "fade", "timer": false, "align": "top", 
             "animation": [ "kenburnsUp", "kenburnsDown", "kenburnsLeft", "kenburnsRight" ] }'>
        </div><!-- /.banner-bg-slide -->
        <div class="container">
            <div class="content-box">
                <div class="top-title">
                    <h2>Lorem ipsum dolor sit  <br> amet consectetur</h2>
                </div>

                <!--<div class="product-tab-box tabs-box">
                    <ul class="tab-btns tab-buttons clearfix list-unstyled">
                        <li data-tab="#desc" class="tab-btn active-btn"><span>Buy</span></li>
                        <li data-tab="#addi__info" class="tab-btn"><span>Sale</span></li>
                        <li data-tab="#review" class="tab-btn"><span>Rent</span></li>
                    </ul>
                    <div class="tabs-content">
                        <div class="tab active-tab" id="desc">
                            <form class="banner_one_search_form" action="/listing-1.html">
                                <div class="banner_one_search_form_input_box">
                                    <input type="text" placeholder="Search for city, property, agent and more...">
                                    <button type="submit" class="thm-btn banner_one_search_btn">Search
                                        Property</button>
                                    <div class="banner_one_search_icon">
                                        <a href="#"><span class="icon-magnifying-glass"></span></a>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="tab" id="addi__info">
                            <form class="banner_one_search_form" action="/listing-1.html">
                                <div class="banner_one_search_form_input_box">
                                    <input type="text" placeholder="Search for city, property, agent and more...">
                                    <button type="submit" class="thm-btn banner_one_search_btn">Search
                                        Property</button>
                                    <div class="banner_one_search_icon">
                                        <a href="#"><span class="icon-magnifying-glass"></span></a>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="tab" id="review">
                            <form class="banner_one_search_form" action="/listing-1.html">
                                <div class="banner_one_search_form_input_box">
                                    <input type="text" placeholder="Search for city, property, agent and more...">
                                    <button type="submit" class="thm-btn banner_one_search_btn">Search
                                        Property</button>
                                    <div class="banner_one_search_icon">
                                        <a href="#"><span class="icon-magnifying-glass"></span></a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>-->
                <div class="banner_one_bottom_icon_text">
                    <p style="color: #fff;">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Soluta odio doloremque ex amet beatae esse,
                        eveniet libero labore voluptatum vero! Harum dolore labore modi quasi id error fuga magnam a?</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner Section One End -->
@endsection