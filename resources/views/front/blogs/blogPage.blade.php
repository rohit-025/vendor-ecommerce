@extends('layouts.front.app')
@section('content')
<!--====== App Content ======-->
<div class="app-content">

<!--====== Section 1 ======-->
<div class="u-s-p-y-90">

    <!--====== Detail Post ======-->
    <div class="detail-post">
        <div class="bp-detail">
            <div class="bp-detail__thumbnail">

                <!--====== Image Code ======-->
                <div class="aspect aspect--bg-grey aspect--1366-768">

                    <img class="aspect__img" src="{{asset($blog->image)}}" alt=""></div>
                <!--====== End - Image Code ======-->
            </div>
            <div class="bp-detail__info-wrap">
                <div class="bp-detail__stat">

                    <span class="bp-detail__stat-wrap">

                        <span class="bp-detail__publish-date">

                            <a href="blog-right-sidebar.html">

                                <span>{{date("d M Y",strtotime($blog->created_at))}}</span></a></span></span>

                    <span class="bp-detail__stat-wrap">

                        <span class="bp-detail__author">

                            <a href="blog-right-sidebar.html">{{$blog->author_name}}</a></span></span>

                    <span class="bp-detail__stat-wrap">

                        <span class="bp-detail__category">

                            <a href="#">{{$blog->tags}}</a>

                            <!-- <a href="blog-right-sidebar.html">News</a>

                            <a href="blog-right-sidebar.html">Health</a></span></span></div> -->

                <span class="bp-detail__h1">

                    <a href="blog-detail.html">{{$blog->title}}</a></span>
                <!-- <div class="blog-t-w">

                    <a class="gl-tag btn--e-transparent-hover-brand-b-2" href="blog-right-sidebar.html">Travel</a>

                    <a class="gl-tag btn--e-transparent-hover-brand-b-2" href="blog-right-sidebar.html">Culture</a>

                    <a class="gl-tag btn--e-transparent-hover-brand-b-2" href="blog-right-sidebar.html">Place</a>
                </div> -->
                <p class="bp-detail__p">
{!! $blog->blog !!}
                </p>
                <!-- <p class="bp-detail__p">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using <del>Lorem Ipsum</del> is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
                <blockquote class="bp-detail__q"><i class="fas fa-quote-left"></i>

                    <span class="bp-detail__q-title">It’s Easier to Fool People Than to Convince Them That They Have Been Fooled.</span><cite class="bp-detail__q-citation">— MARK TWAIN</cite></blockquote>
                <p class="bp-detail__p">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p> -->
                <!-- <div class="post-center-wrap">
                    <ul class="bp-detail__social-list">
                        <li>

                            <a class="s-fb--color" href="#"><i class="fab fa-facebook-f"></i></a></li>
                        <li>

                            <a class="s-tw--color" href="#"><i class="fab fa-twitter"></i></a></li>
                        <li>

                            <a class="s-insta--color" href="#"><i class="fab fa-instagram"></i></a></li>
                        <li>

                            <a class="s-wa--color" href="#"><i class="fab fa-whatsapp"></i></a></li>
                        <li>

                            <a class="s-gplus--color" href="#"><i class="fab fa-google-plus-g"></i></a></li>
                    </ul>
                </div> -->
                <!-- <div class="gl-l-r bp-detail__postnp">
                    <div>

                        <a href="blog-detail.html">Previous Post</a></div>
                    <div>

                        <a href="blog-detail.html">Next Post</a></div>
                </div> -->
            </div>
        </div>
    </div>
</div>
<!--====== End - Section 1 ======-->
</div>
<!--====== End - App Content ======-->

@endsection