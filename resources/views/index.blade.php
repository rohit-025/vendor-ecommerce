@extends('layouts.front.app') @section('content')
<!--====== App Content ======-->
<div class="app-content">
    <!--====== Primary Slider ======-->
    <div class="s-skeleton s-skeleton--h-600 s-skeleton--bg-grey">
        <div class="owl-carousel primary-style-1 hero-slider">
            @foreach($banners1 as $banner)
            <div class="hero-slide hero-slide--1" style="background-image: url({{$banner->image}})">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="slider-content slider-content--animation">
                                <a class="shop-now-link btn--e-brand" href="{{url('shop/all')}}">SHOP NOW</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <!--====== End - Primary Slider ======-->

    <!--====== Section 1 ======-->
    <div class="u-s-p-y-60">
        <!--====== Section Intro ======-->
        <div class="section__intro u-s-m-b-46">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section__text-wrap">
                            <h1 class="section__heading u-c-secondary u-s-m-b-12">SHOP BY CATEGORIES</h1>

                            <span class="section__span u-c-silver">BROWSE FAVOURITE CATEGORIES</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====== End - Section Intro ======-->

        <!--====== Section Content ======-->
        <div class="section__content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-md-5 u-s-m-b-30" style="position:relative;">
                        <a class="collection" href="shop-side-version-2.html">
                            <div class="aspect aspect--bg-grey aspect--square">
                                <img class="aspect__img collection__img" src="{{asset($featuredCategories[0]->cover)}}" alt="" />
                            </div>
                        </a>
                          <a href="{{url('shop/'.$featuredCategories[0]->slug)}}" class="shop-now-links btn--e-brands">{{$featuredCategories[0]->name}}</a>
                    </div>
                    <div class="col-lg-7 col-md-7 u-s-m-b-30" style="position:relative;">
                        <a class="collection" href="shop-side-version-2.html">
                            <div class="aspect aspect--bg-grey aspect--1286-890">
                                <img class="aspect__img collection__img" src="{{asset($featuredCategories[1]->cover)}}" alt="" />
                            </div>
                        </a>
                          <a href="{{url('shop/'.$featuredCategories[1]->slug)}}" class="shop-now-links btn--e-brands">{{$featuredCategories[1]->name}}</a>
                    </div>
                    <div class="col-lg-7 col-md-7 u-s-m-b-30" style="position:relative;">
                        <a class="collection" href="shop-side-version-2.html">
                            <div class="aspect aspect--bg-grey aspect--1286-890">
                                <img class="aspect__img collection__img" src="{{asset($featuredCategories[2]->cover)}}" alt="" />
                            </div>
                        </a>
                          <a href="{{url('shop/'.$featuredCategories[2]->slug)}}" class="shop-now-links btn--e-brands">{{$featuredCategories[2]->name}}</a>
                    </div>
                    <div class="col-lg-5 col-md-5 u-s-m-b-30" style="position:relative;">
                        <a class="collection" href="shop-side-version-2.html">
                            <div class="aspect aspect--bg-grey aspect--square">
                                <img class="aspect__img collection__img" src="{{asset($featuredCategories[3]->cover)}}" alt="" />
                            </div>
                        </a>
                          <a href="{{url('shop/'.$featuredCategories[3]->slug)}}" class="shop-now-links btn--e-brands">{{$featuredCategories[3]->name}}</a>
                    </div>
                </div>
            </div>
        </div>

        <!--====== Section Content ======-->
    </div>
    <!--====== End - Section 1 ======-->

    <!--====== Section 2 ======-->
    <div class="u-s-p-b-60">
        <!--====== Section Intro ======-->
        <div class="section__intro u-s-m-b-16">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section__text-wrap">
                            <h1 class="section__heading u-c-secondary u-s-m-b-12">TOP TRENDING</h1>

                            <span class="section__span u-c-silver">CHOOSE CATEGORY</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====== End - Section Intro ======-->

        <!--====== Section Content ======-->
        <div class="section__content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        @livewire('category-filter')
                    </div>

                </div>
            </div>
        </div>
        <!--====== End - Section Content ======-->
    </div>
    <!--====== End - Section 2 ======-->

    <!--====== Section 7 ======-->
    <div class="u-s-p-b-60">

        <!--====== Section Content ======-->
        <div class="section__content">
            <div class="container">
                <div class="row">
                    @if(count($featuredCategories) > 4)
                    <div class="col-lg-4 col-md-4 col-sm-6 u-s-m-b-30">

                        <a class="promotion" href="{{url('shop/'.$featuredCategories[4]->slug)}}">
                            <div class="aspect aspect--bg-grey aspect--square">

                                <img class="aspect__img promotion__img" src="{{$featuredCategories[4]->cover}}" alt="">
                            </div>
                            <div class="promotion__content">
                                <div class="promotion__text-wrap">
                                    <div class="promotion__text-1">

                                        <span class="u-c-secondary">{{$featuredCategories[4]->name}}</span>
                                    </div>
                                    <!-- <div class="promotion__text-2">

                                        <span class="u-c-secondary">GET IN</span>

                                        <span class="u-c-brand">TOUCH</span>
                                    </div> -->
                                </div>
                            </div>
                        </a>
                    </div>
                    @endif
                    @if(count($featuredCategories) > 5)
                    <div class="col-lg-4 col-md-4 col-sm-6 u-s-m-b-30">

                        <a class="promotion" href="{{url('shop/'.$featuredCategories[5]->slug)}}">
                            <div class="aspect aspect--bg-grey aspect--square">

                                <img class="aspect__img promotion__img" src="{{$featuredCategories[5]->cover}}" alt="">
                            </div>
                            <div class="promotion__content">
                                <div class="promotion__text-wrap">
                                    <div class="promotion__text-1">

                                        <span class="u-c-secondary">{{$featuredCategories[5]->name}}</span>

                                        <!-- <span class="u-c-brand">2019</span> -->
                                    </div>
                                    <!-- <div class="promotion__text-2">

                                        <span class="u-c-secondary">NEW ARRIVALS</span>
                                    </div> -->
                                </div>
                            </div>
                        </a>
                    </div>
                    @endif
                    @if(count($featuredCategories) > 6)
                    <div class="col-lg-4 col-md-4 col-sm-6 u-s-m-b-30">

                        <a class="promotion" href="{{url('shop/'.$featuredCategories[6]->slug)}}">
                            <div class="aspect aspect--bg-grey aspect--square">

                                <img class="aspect__img promotion__img" src="{{$featuredCategories[6]->cover}}" alt="">
                            </div>
                            <div class="promotion__content">
                                <div class="promotion__text-wrap">
                                    <div class="promotion__text-1">

                                        <span class="u-c-secondary">{{$featuredCategories[6]->name}}</span>
                                    </div>
                                    <!-- <div class="promotion__text-2">

                                        <span class="u-c-brand">GET UP TO 10% OFF</span>
                                    </div> -->
                                </div>
                            </div>
                        </a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        <!--====== End - Section Content ======-->
    </div>
    <!--====== End - Section 7 ======-->


    <!--====== Primary Slider ======-->
    <div class="s-skeleton s-skeleton--h-600 s-skeleton--bg-grey">
        <div class="owl-carousel primary-style-1 hero-slider">
            @foreach($banners2 as $banner)
            <div class="hero-slide hero-slide--1" style="background-image: url({{$banner->image}})">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="slider-content slider-content--animation">
                                <!-- <span class="content-span-1 u-c-secondary">Latest Update Stock</span>

                                <span class="content-span-2 u-c-secondary">30% Off On Electronics</span>

                                <span class="content-span-3 u-c-secondary">Find electronics on best prices, Also Discover most selling products of electronics</span>

                                <span class="content-span-4 u-c-secondary">Starting At

                                    <span class="u-c-brand">$1050.00</span></span> -->

                                <a class="shop-now-link btn--e-brand" href="{{url('shop/all')}}">SHOP NOW</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <!--====== End - Primary Slider ======-->

    <!-- <div class="u-s-p-y-60"> -->
    @livewire('featured-products')
    
    
    <!--====== Section 9 ======-->
    <div class="u-s-p-b-60">

        <!--====== Section Content ======-->
        <div class="section__content">
            <div class="container">
                <div class="row">
                    <!-- <div class="col-lg-4 col-md-6 u-s-m-b-30">
                <div class="service u-h-100">
                    <div class="service__icon"><i class="fas fa-truck"></i></div>
                    <div class="service__info-wrap">

                        <span class="service__info-text-1">Free Shipping</span>

                        <span class="service__info-text-2">Free shipping on all US order or order above $200</span></div>
                </div>
            </div> -->
                    <div class="col-lg-6 col-md-6 u-s-m-b-30">
                        <div class="service u-h-100">
                            <div class="service__icon"><i class="fas fa-redo"></i></div>
                            <div class="service__info-wrap">

                                <span class="service__info-text-1">Shop with Confidence</span>

                                <span class="service__info-text-2">Our Protection covers your purchase from click to delivery</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 u-s-m-b-30">
                        <div class="service u-h-100">
                            <div class="service__icon"><i class="fas fa-headphones-alt"></i></div>
                            <div class="service__info-wrap">

                                <span class="service__info-text-1">24/7 Help Center</span>

                                <span class="service__info-text-2">Round-the-clock assistance for a smooth shopping experience</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====== End - Section Content ======-->
    </div>
    <!--====== End - Section 9 ======-->


    <!--====== Section 10 ======-->
    <div class="u-s-p-b-60">
        <!--====== Section Intro ======-->
        <div class="section__intro u-s-m-b-46">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section__text-wrap">
                            <h1 class="section__heading u-c-secondary u-s-m-b-12">LATEST FROM BLOG</h1>

                            <span class="section__span u-c-silver">START YOU DAY WITH FRESH AND LATEST NEWS</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====== End - Section Intro ======-->

        <!--====== Section Content ======-->
        <div class="section__content">
            <div class="container">
                <div class="row">
                    @foreach($blogs as $blog)
                    <div class="col-lg-4 col-md-6 u-s-m-b-30">
                        <div class="bp-mini bp-mini--img u-h-100">
                            <div class="bp-mini__thumbnail">
                                <!--====== Image Code ======-->

                                <a class="aspect aspect--bg-grey aspect--1366-768 u-d-block" href="blog-detail.html"> <img class="aspect__img" src="{{asset($blog->image)}}" alt="" /></a>

                                <!--====== End - Image Code ======-->
                            </div>
                            <div class="bp-mini__content">
                                <div class="bp-mini__stat">
                                    <span class="bp-mini__stat-wrap">
                                        <span class="bp-mini__publish-date">
                                            <a> <span>{{ $blog->created_at}}</span></a>
                                        </span>
                                    </span>

                                    <span class="bp-mini__stat-wrap">
                                        <span class="bp-mini__preposition">By</span>

                                        <span class="bp-mini__author"> <a href="#">{{ $blog->author_name }}</a></span>
                                    </span>

                                    
                                </div>
                                <div class="bp-mini__category">
                                    
                                <span>{{$blog->tags}}</span>
                                </div>

                                <span class="bp-mini__h1"> <a href="blog-detail.html">{{$blog->title}}</a></span>
                                <p class="bp-mini__p">{{ substr(strip_tags($blog->blog),0,100) }}...</p>
                                <a class="btn btn-primary" href="{{url('/blogs/'.$blog->slug)}}">Read more</button>
                                <!-- <div class="blog-t-w">
                                    <a class="gl-tag btn--e-transparent-hover-brand-b-2">Travel</a>

                                    <a class="gl-tag btn--e-transparent-hover-brand-b-2">Culture</a>

                                    <a class="gl-tag btn--e-transparent-hover-brand-b-2">Place</a>
                                </div> -->
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!--====== End - Section Content ======-->
    </div>
    <!--====== End - Section 10 ======-->

    <!--====== Section 11 ======-->
    <div class="u-s-p-b-90 u-s-m-b-30">
        <!--====== Section Intro ======-->
        <div class="section__intro u-s-m-b-46">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section__text-wrap">
                            <h1 class="section__heading u-c-secondary u-s-m-b-12">CLIENTS FEEDBACK</h1>

                            <span class="section__span u-c-silver">WHAT OUR CLIENTS SAY</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====== End - Section Intro ======-->

        <!--====== Section Content ======-->
        <div class="section__content">
            <div class="container">
                <!--====== Testimonial Slider ======-->
                <div class="slider-fouc">
                    <div class="owl-carousel" id="testimonial-slider">
                        <div class="testimonial">
                            <div class="testimonial__img-wrap">
                                <img class="testimonial__img" src="{{asset('front/images/about/test-1.jpg')}}" alt="" />
                            </div>
                            <div class="testimonial__content-wrap">
                                <span class="testimonial__double-quote"><i class="fas fa-quote-right"></i></span>
                                <blockquote class="testimonial__block-quote">
                                    <p>
                                        "Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large
                                        language ocean."
                                    </p>
                                </blockquote>

                                <span class="testimonial__author">John D. / DVNTR Inc.</span>
                            </div>
                        </div>
                        <div class="testimonial">
                            <div class="testimonial__img-wrap">
                                <img class="testimonial__img" src="{{asset('front/images/about/test-2.jpg')}}" alt="" />
                            </div>
                            <div class="testimonial__content-wrap">
                                <span class="testimonial__double-quote"><i class="fas fa-quote-right"></i></span>
                                <blockquote class="testimonial__block-quote">
                                    <p>
                                        "Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large
                                        language ocean."
                                    </p>
                                </blockquote>

                                <span class="testimonial__author">John D. / DVNTR Inc.</span>
                            </div>
                        </div>
                        <div class="testimonial">
                            <div class="testimonial__img-wrap">
                                <img class="testimonial__img" src="{{asset('front/images/about/test-3.jpg')}}" alt="" />
                            </div>
                            <div class="testimonial__content-wrap">
                                <span class="testimonial__double-quote"><i class="fas fa-quote-right"></i></span>
                                <blockquote class="testimonial__block-quote">
                                    <p>
                                        "Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large
                                        language ocean."
                                    </p>
                                </blockquote>

                                <span class="testimonial__author">John D. / DVNTR Inc.</span>
                            </div>
                        </div>
                        <div class="testimonial">
                            <div class="testimonial__img-wrap">
                                <img class="testimonial__img" src="{{asset('front/images/about/test-4.jpg')}}" alt="" />
                            </div>
                            <div class="testimonial__content-wrap">
                                <span class="testimonial__double-quote"><i class="fas fa-quote-right"></i></span>
                                <blockquote class="testimonial__block-quote">
                                    <p>
                                        "Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large
                                        language ocean."
                                    </p>
                                </blockquote>

                                <span class="testimonial__author">John D. / DVNTR Inc.</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!--====== End - Testimonial Slider ======-->
            </div>
        </div>
        <!--====== End - Section Content ======-->
    </div>
    <!--====== End - Section 11 ======-->

    <!--====== Section 12 ======-->
    <div class="u-s-p-b-60">
        <!--====== Section Content ======-->
        <div class="section__content">
            <div class="container">
                <!--====== Brand Slider ======-->
                <div class="slider-fouc">
                    <div class="owl-carousel" id="brand-slider" data-item="5">
                        <div class="brand-slide">
                            <a href="shop-side-version-2.html"> <img src="{{asset('front/images/brand/b1.png')}}" alt="" /></a>
                        </div>
                        <div class="brand-slide">
                            <a href="shop-side-version-2.html"> <img src="{{asset('front/images/brand/b2.png')}}" alt="" /></a>
                        </div>
                        <div class="brand-slide">
                            <a href="shop-side-version-2.html"> <img src="{{asset('front/images/brand/b3.png')}}" alt="" /></a>
                        </div>
                        <div class="brand-slide">
                            <a href="shop-side-version-2.html"> <img src="{{asset('front/images/brand/b4.png')}}" alt="" /></a>
                        </div>
                        <div class="brand-slide">
                            <a href="shop-side-version-2.html"> <img src="{{asset('front/images/brand/b5.png')}}" alt="" /></a>
                        </div>
                        <div class="brand-slide">
                            <a href="shop-side-version-2.html"> <img src="{{asset('front/images/brand/b6.png')}}" alt="" /></a>
                        </div>
                    </div>
                </div>
                <!--====== End - Brand Slider ======-->
            </div>
        </div>
        <!--====== End - Section Content ======-->
    </div>
    <!--====== End - Section 12 ======-->

    <!--====== End - App Content ======-->
    @endsection