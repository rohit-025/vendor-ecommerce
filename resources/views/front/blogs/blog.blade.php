@extends('layouts.front.app')
@section('content')

<!--====== App Content ======-->
<div class="app-content">
    <!--====== Section 1 ======-->
    <div class="u-s-p-y-90">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-8 col-sm-12">
                    
                        @foreach($blogs as $blog)
                        <div class="bp bp--img u-s-m-b-30">
                        <div class="bp__wrap">
                            <div class="bp__thumbnail">
                                <!--====== Image Code ======-->

                                <a class="aspect aspect--bg-grey aspect--1366-768 u-d-block" href="{{url('/blogs/'.$blog->slug)}}"> 
                                    <img class="aspect__img" src="{{$blog->image}}" alt="" />
                                </a>

                                <!--====== End - Image Code ======-->
                            </div>
                            <div class="bp__info-wrap">
                                <div class="bp__stat">
                                    <span class="bp__stat-wrap">
                                        <span class="bp__publish-date">
                                            <a href="blog-right-sidebar.html">
                                                <span>{{date("Y M d",strtotime($blog->created_at))}}</span>
                                            </a>
                                        </span>
                                    </span>

                                    <span class="bp__stat-wrap">
                                        <span class="bp__author">
                                            <a href="blog-right-sidebar.html">{{$blog->author_name}}</a>
                                        </span>
                                    </span>

                                    <span class="bp__stat-wrap">
                                        <span class="bp__category">
                                            <a href="blog-right-sidebar.html">{{$blog->tag}}</a>
                                          </span>
                                    </span>
                                </div>

                                <span class="bp__h1">
                                    <a href="{{url('/blogs/'.$blog->slug)}}">{{$blog->title}}</a>
                                </span>

                                
                                <p class="bp__p">{{ substr(strip_tags($blog->blog),0,100) }}...</p>
                                <div class="gl-l-r">
                                    <div>
                                        <span class="bp__read-more"> <a href="blog-detail.html">READ MORE</a></span>
                                    </div>
                                    <ul class="bp__social-list">
                                        <li>
                                            <a class="s-fb--color" href="#"><i class="fab fa-facebook-f"></i></a>
                                        </li>
                                        <li>
                                            <a class="s-tw--color" href="#"><i class="fab fa-twitter"></i></a>
                                        </li>
                                        <li>
                                            <a class="s-insta--color" href="#"><i class="fab fa-instagram"></i></a>
                                        </li>
                                        <li>
                                            <a class="s-wa--color" href="#"><i class="fab fa-whatsapp"></i></a>
                                        </li>
                                        <li>
                                            <a class="s-gplus--color" href="#"><i class="fab fa-google-plus-g"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        </div>
                        @endforeach
                    

                    <nav class="post-center-wrap u-s-p-y-60">
                        <!--====== Pagination ======-->
                        <ul class="blog-pg">
                            <!-- <li class="blog-pg--active">
                                <a href="blog-right-sidebar.html"></a>
                            </li> -->
                            {{$blogs->links()}}
                            
                        </ul>
                        <!--====== End - Pagination ======-->
                    </nav>
                </div>
                
                        
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <div class="blog-w-master">
                        <!-- <div class="u-s-m-b-60">
                            <div class="blog-w">
                                <span class="blog-w__h">SEARCH</span>
                                <form class="blog-search-form">
                                    <label for="post-search"></label>

                                    <input class="input-text input-text--primary-style" type="text" id="post-search" placeholder="Search" />

                                    <button class="btn btn--icon fas fa-search" type="submit"></button>
                                </form>
                            </div>
                        </div>
                        <div class="u-s-m-b-60">
                            <div class="blog-w">
                                <span class="blog-w__h">CATEGORIES</span>
                                <ul class="blog-w__list">
                                    <li>
                                        <a href="blog-right-sidebar.html">Corporate</a>
                                    </li>
                                    <li>
                                        <a href="blog-right-sidebar.html">Creative</a>
                                    </li>
                                    <li>
                                        <a href="blog-right-sidebar.html">Design</a>
                                    </li>
                                    <li>
                                        <a href="blog-right-sidebar.html">News</a>
                                    </li>
                                    <li>
                                        <a href="blog-right-sidebar.html">Photography</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="u-s-m-b-60">
                            <div class="blog-w">
                                <span class="blog-w__h">ARCHIVES</span>
                                <ul class="blog-w__list">
                                    <li>
                                        <a href="blog-right-sidebar.html">March 2017 (1)</a>
                                    </li>
                                    <li>
                                        <a href="blog-right-sidebar.html">December 2017 (3)</a>
                                    </li>
                                    <li>
                                        <a href="blog-right-sidebar.html">November 2017 (4)</a>
                                    </li>
                                    <li>
                                        <a href="blog-right-sidebar.html">September 2017 (1)</a>
                                    </li>
                                    <li>
                                        <a href="blog-right-sidebar.html">August 2014 (1)</a>
                                    </li>
                                </ul>
                            </div>
                        </div> -->
                        <div class="u-s-m-b-60">
                            <div class="blog-w">
                                <span class="blog-w__h">RECENT POSTS</span>
                                <ul class="blog-w__b-l">
                                    @foreach($latestBlogs as $latest)
                                    <li>
                                        <div class="b-l__block">
                                            <div class="b-l__date">
                                                <span>{{date("d M Y",strtotime($latest->created_at))}}</span>
                                            </div>

                                            <span class="b-l__h"> <a href="{{url('/blogs/'.$blog->slug)}}">{{$latest->title}}</a></span>

                                            <span class="b-l__p">{{substr(strip_tags($latest->blog),0,100)}}</span>
                                        </div>
                                    </li>
                                    @endforeach
                                    
                                </ul>
                            </div>
                        </div>
                        <div>
                            <div class="blog-w">
                                <span class="blog-w__h">TAGS</span>
                                @foreach($tags as $tag)
                                <div class="blog-t-w">
                                    <a class="gl-tag btn--e-transparent-hover-brand-b-2" href="{{url('/blogs?tag='.$tag)}}">{{$tag}}</a>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====== End - Section 1 ======-->
</div>
<!--====== End - App Content ======-->


@endsection