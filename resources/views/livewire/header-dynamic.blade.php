    <!--====== Main Header ======-->
    <header class="header--style-1 header--box-shadow">
        <!--====== Nav 1 ======-->
        <nav class="primary-nav primary-nav-wrapper--border">
            <div class="container-fluid">
                <!--====== Primary Nav ======-->
                <div class="primary-nav">
                    <!--====== Main Logo ======-->
                    <div style="width:37%" class="mob-hide" href="{{url('/')}}">
                        <!-- <img src="{{asset('front/images/logo/logo-1.png')}}" alt="" /> -->
                    </div>
                    <a class="main-logo" href="{{url('/')}}"> <img src="{{asset('front/images/logo/main-logo.png')}}" alt="" /></a>

                    <!--====== End - Main Logo ======-->



                    <!--====== Dropdown Main plugin ======-->
                    <div class="menu-init" id="navigation">
                        <!--   <button class="btn btn--icon toggle-button toggle-button--secondary fas fa-cogs" type="button"></button> -->

                        <!--====== Menu ======-->
                        <div>
                            <!--    <span class="ah-close">✕ Close</span> -->

                            <!--====== List ======-->
                            <ul class="ah-list ah-list--design1 ah-list--link-color-secondary" style="display: flex;">
                                <li class="has-dropdown" data-tooltip="tooltip" data-placement="left" title="Account">
                                    <a class="addCls"><i class="far fa-user-circle"></i></a>

                                    <!--====== Dropdown ======-->
                                    <!-- 
                                    <span class="js-menu-toggle"></span> -->
                                    <ul style="width: 120px;top:45px;">
                                        @if(Auth::check())
                                        <li>
                                            <a href="dashboard.html">
                                                <i class="fas fa-user-circle u-s-m-r-6"></i>

                                                <span>{{Auth::user()->name}}</span>
                                            </a>
                                        </li>

                                        <li>
                                            <!-- <form action="{{route('logout')}}" method="post">
                                            @csrf
                                            <i class="fas fa-lock-open u-s-m-r-6"></i>

                                            <button type="submit"><span>Signout</span></button>
                                        </form> -->

                                            <a href="" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();"><i class="fas fa-lock-open u-s-m-r-6"></i>
                                                <span>Sign Out</span>
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>



                                        </li>
                                        @else
                                        <li>
                                            <a href="{{route('register')}}">
                                                <i class="fas fa-user-plus u-s-m-r-6"></i>

                                                <span>Signup</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{route('login')}}">
                                                <i class="fas fa-lock u-s-m-r-6"></i>

                                                <span>Signin</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{route('vendor-register')}}">
                                                <i class="fas fa-user-plus u-s-m-r-6"></i>

                                                <span>Register as vendor</span>
                                            </a>
                                        </li>
                                        @endif

                                    </ul>
                                    <!--====== End - Dropdown ======-->
                                </li>
                                <!--   <li>
                                    <a href="{{route('home')}}"><i class="fas fa-home u-c-brand"></i></a>
                                </li> -->
                                <li>
                                    <a href="{{route('home')}}" data-toggle="modal" data-target=".search-modal">
                                        <i class="fas fa-search"></i>
                                    </a>
                                </li>

                                @if(Auth::check())
                                <li class="has-dropdown">
                                    <a href="{{route('cart.index')}}" class="mini-cart-shop-link">
                                        <i class="fas fa-shopping-bag"></i>

                                        <span class="total-item-round">{{$count}}</span>
                                    </a>
                                </li>
                                @endif
                            </ul>
                        </div>
                        <!--====== End - Menu ======-->
                    </div>
                    <!--====== End - Dropdown Main plugin ======-->
                </div>
                <!--====== End - Primary Nav ======-->
            </div>
        </nav>
        <!--====== End - Nav 1 ======-->
        <!--====== Dropdown Main plugin ======-->


        <!--====== Nav 2 ======-->
        <nav class="secondary-nav-wrapper" id="navbar">
            <div class="container-fluid">
                <!--====== Secondary Nav ======-->
                <div class="secondary-nav">

                    <a class="main-logo1 first" href="{{url('/')}}"> <img src="{{asset('front/images/logo/logo-1.png')}}" alt="" /></a>
                    <!--====== Dropdown Main plugin ======-->
                    <div class="menu-init" id="navigation1">

                        <button class="btn btn--icon toggle-mega-text toggle-button" type="button"><i class="fas fa-bars"></i></button>

                        <!--====== Menu ======-->
                        <div class="ah-lg-mode">

                            <span class="ah-close">✕ Close</span>

                            <!--====== List ======-->
                            <ul class=" ah-list ah-list--design2 ah-list--link-color-secondary">
                                <li class="has-dropdown">

                                    <a href="{{url('shop/all')}}" class="mega-texts">Shop</a>

                                    <!--====== Mega Menu ======-->

                                    <span class="js-menu-toggle"></span>
                                    <div class="mega-menu">
                                        <div class="mega-menu-wrap">
                                            <!--    <div class="mega-menu-list">
                                                <ul>
                                                <li class="">

                                                    <a href="{{url('shop/all')}}"><i class="fas fa-tv u-s-m-r-6"></i>

                                                        <span>All</span></a>

                                                         <span class="js-menu-toggle js-toggle-mark"></span> 
                                                </li>
                                                    @foreach($categories as $category)
                                                    <li class="">

                                                        <a href="{{url('shop/'.$category->slug)}}"><i class="fas fa-tv u-s-m-r-6"></i>

                                                            <span>{{$category->name}}</span></a>

                                                         <span class="js-menu-toggle js-toggle-mark"></span>
                                                    </li>
                                                    @endforeach


                                                </ul>
                                            </div> -->

                                            <!--====== Electronics ======-->
                                            <div class="mega-menu-content js-active">

                                                <!--====== Mega Menu Row ======-->
                                                <div class="row">
                                                    @foreach($categories as $category)
                                                    <div class="col-lg-3">
                                                        <ul>
                                                            <li class="mega-list-title">

                                                                <a href="shop-side-version-2.html">{{$category->name}}</a>
                                                            </li>
                                                            @foreach($category->childCategory as $cat)
                                                            <li>

                                                                <a href="shop-side-version-2.html">{{$cat->name}}</a>
                                                            </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                    @endforeach


                                                </div>
                                                <!--====== End - Mega Menu Row ======-->
                                                <br>

                                            </div>
                                            <!--====== End - Electronics ======-->


                                            <!--====== Women ======-->
                                            <div class="mega-menu-content">

                                                <!--====== Mega Menu Row ======-->
                                                <div class="row">
                                                    <div class="col-lg-6 mega-image">
                                                        <div class="mega-banner">

                                                            <a class="u-d-block" href="shop-side-version-2.html">

                                                                <img class="u-img-fluid u-d-block" src="images/banners/banner-mega-1.jpg" alt=""></a>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 mega-image">
                                                        <div class="mega-banner">

                                                            <a class="u-d-block" href="shop-side-version-2.html">

                                                                <img class="u-img-fluid u-d-block" src="images/banners/banner-mega-2.jpg" alt=""></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--====== End - Mega Menu Row ======-->
                                                <br>

                                                <!--====== Mega Menu Row ======-->
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <ul>
                                                            <li class="mega-list-title">

                                                                <a href="shop-side-version-2.html">HOT CATEGORIES</a>
                                                            </li>
                                                            <li>

                                                                <a href="shop-side-version-2.html">Dresses</a>
                                                            </li>
                                                            <li>

                                                                <a href="shop-side-version-2.html">Blouses & Shirts</a>
                                                            </li>
                                                            <li>

                                                                <a href="shop-side-version-2.html">T-shirts</a>
                                                            </li>
                                                            <li>

                                                                <a href="shop-side-version-2.html">Rompers</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <ul>
                                                            <li class="mega-list-title">

                                                                <a href="shop-side-version-2.html">INTIMATES</a>
                                                            </li>
                                                            <li>

                                                                <a href="shop-side-version-2.html">Bras</a>
                                                            </li>
                                                            <li>

                                                                <a href="shop-side-version-2.html">Brief Sets</a>
                                                            </li>
                                                            <li>

                                                                <a href="shop-side-version-2.html">Bustiers & Corsets</a>
                                                            </li>
                                                            <li>

                                                                <a href="shop-side-version-2.html">Panties</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <ul>
                                                            <li class="mega-list-title">

                                                                <a href="shop-side-version-2.html">WEDDING & EVENTS</a>
                                                            </li>
                                                            <li>

                                                                <a href="shop-side-version-2.html">Wedding Dresses</a>
                                                            </li>
                                                            <li>

                                                                <a href="shop-side-version-2.html">Evening Dresses</a>
                                                            </li>
                                                            <li>

                                                                <a href="shop-side-version-2.html">Prom Dresses</a>
                                                            </li>
                                                            <li>

                                                                <a href="shop-side-version-2.html">Flower Dresses</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <ul>
                                                            <li class="mega-list-title">

                                                                <a href="shop-side-version-2.html">BOTTOMS</a>
                                                            </li>
                                                            <li>

                                                                <a href="shop-side-version-2.html">Skirts</a>
                                                            </li>
                                                            <li>

                                                                <a href="shop-side-version-2.html">Shorts</a>
                                                            </li>
                                                            <li>

                                                                <a href="shop-side-version-2.html">Leggings</a>
                                                            </li>
                                                            <li>

                                                                <a href="shop-side-version-2.html">Jeans</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <!--====== End - Mega Menu Row ======-->
                                                <br>

                                                <!--====== Mega Menu Row ======-->
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <ul>
                                                            <li class="mega-list-title">

                                                                <a href="shop-side-version-2.html">OUTWEAR</a>
                                                            </li>
                                                            <li>

                                                                <a href="shop-side-version-2.html">Blazers</a>
                                                            </li>
                                                            <li>

                                                                <a href="shop-side-version-2.html">Basics Jackets</a>
                                                            </li>
                                                            <li>

                                                                <a href="shop-side-version-2.html">Trench</a>
                                                            </li>
                                                            <li>

                                                                <a href="shop-side-version-2.html">Leather & Suede</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <ul>
                                                            <li class="mega-list-title">

                                                                <a href="shop-side-version-2.html">JACKETS</a>
                                                            </li>
                                                            <li>

                                                                <a href="shop-side-version-2.html">Denim Jackets</a>
                                                            </li>
                                                            <li>

                                                                <a href="shop-side-version-2.html">Trucker Jackets</a>
                                                            </li>
                                                            <li>

                                                                <a href="shop-side-version-2.html">Windbreaker Jackets</a>
                                                            </li>
                                                            <li>

                                                                <a href="shop-side-version-2.html">Leather Jackets</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <ul>
                                                            <li class="mega-list-title">

                                                                <a href="shop-side-version-2.html">ACCESSORIES</a>
                                                            </li>
                                                            <li>

                                                                <a href="shop-side-version-2.html">Tech Accessories</a>
                                                            </li>
                                                            <li>

                                                                <a href="shop-side-version-2.html">Headwear</a>
                                                            </li>
                                                            <li>

                                                                <a href="shop-side-version-2.html">Baseball Caps</a>
                                                            </li>
                                                            <li>

                                                                <a href="shop-side-version-2.html">Belts</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <ul>
                                                            <li class="mega-list-title">

                                                                <a href="shop-side-version-2.html">OTHER ACCESSORIES</a>
                                                            </li>
                                                            <li>

                                                                <a href="shop-side-version-2.html">Bags</a>
                                                            </li>
                                                            <li>

                                                                <a href="shop-side-version-2.html">Wallets</a>
                                                            </li>
                                                            <li>

                                                                <a href="shop-side-version-2.html">Watches</a>
                                                            </li>
                                                            <li>

                                                                <a href="shop-side-version-2.html">Sunglasses</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <!--====== End - Mega Menu Row ======-->
                                                <br>

                                                <!--====== Mega Menu Row ======-->
                                                <div class="row">
                                                    <div class="col-lg-9 mega-image">
                                                        <div class="mega-banner">

                                                            <a class="u-d-block" href="shop-side-version-2.html">

                                                                <img class="u-img-fluid u-d-block" src="images/banners/banner-mega-3.jpg" alt=""></a>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 mega-image">
                                                        <div class="mega-banner">

                                                            <a class="u-d-block" href="shop-side-version-2.html">

                                                                <img class="u-img-fluid u-d-block" src="images/banners/banner-mega-4.jpg" alt=""></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--====== End - Mega Menu Row ======-->
                                            </div>
                                            <!--====== End - Women ======-->


                                            <!--====== Men ======-->
                                            <div class="mega-menu-content">

                                                <!--====== Mega Menu Row ======-->
                                                <div class="row">
                                                    <div class="col-lg-4 mega-image">
                                                        <div class="mega-banner">

                                                            <a class="u-d-block" href="shop-side-version-2.html">

                                                                <img class="u-img-fluid u-d-block" src="images/banners/banner-mega-5.jpg" alt=""></a>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 mega-image">
                                                        <div class="mega-banner">

                                                            <a class="u-d-block" href="shop-side-version-2.html">

                                                                <img class="u-img-fluid u-d-block" src="images/banners/banner-mega-6.jpg" alt=""></a>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 mega-image">
                                                        <div class="mega-banner">

                                                            <a class="u-d-block" href="shop-side-version-2.html">

                                                                <img class="u-img-fluid u-d-block" src="images/banners/banner-mega-7.jpg" alt=""></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--====== End - Mega Menu Row ======-->
                                                <br>

                                                <!--====== Mega Menu Row ======-->
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <ul>
                                                            <li class="mega-list-title">

                                                                <a href="shop-side-version-2.html">HOT SALE</a>
                                                            </li>
                                                            <li>

                                                                <a href="shop-side-version-2.html">T-Shirts</a>
                                                            </li>
                                                            <li>

                                                                <a href="shop-side-version-2.html">Tank Tops</a>
                                                            </li>
                                                            <li>

                                                                <a href="shop-side-version-2.html">Polo</a>
                                                            </li>
                                                            <li>

                                                                <a href="shop-side-version-2.html">Shirts</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <ul>
                                                            <li class="mega-list-title">

                                                                <a href="shop-side-version-2.html">OUTWEAR</a>
                                                            </li>
                                                            <li>

                                                                <a href="shop-side-version-2.html">Hoodies</a>
                                                            </li>
                                                            <li>

                                                                <a href="shop-side-version-2.html">Trench</a>
                                                            </li>
                                                            <li>

                                                                <a href="shop-side-version-2.html">Parkas</a>
                                                            </li>
                                                            <li>

                                                                <a href="shop-side-version-2.html">Sweaters</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <ul>
                                                            <li class="mega-list-title">

                                                                <a href="shop-side-version-2.html">BOTTOMS</a>
                                                            </li>
                                                            <li>

                                                                <a href="shop-side-version-2.html">Casual Pants</a>
                                                            </li>
                                                            <li>

                                                                <a href="shop-side-version-2.html">Cargo Pants</a>
                                                            </li>
                                                            <li>

                                                                <a href="shop-side-version-2.html">Jeans</a>
                                                            </li>
                                                            <li>

                                                                <a href="shop-side-version-2.html">Shorts</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <ul>
                                                            <li class="mega-list-title">

                                                                <a href="shop-side-version-2.html">UNDERWEAR</a>
                                                            </li>
                                                            <li>

                                                                <a href="shop-side-version-2.html">Boxers</a>
                                                            </li>
                                                            <li>

                                                                <a href="shop-side-version-2.html">Briefs</a>
                                                            </li>
                                                            <li>

                                                                <a href="shop-side-version-2.html">Robes</a>
                                                            </li>
                                                            <li>

                                                                <a href="shop-side-version-2.html">Socks</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <!--====== End - Mega Menu Row ======-->
                                                <br>

                                                <!--====== Mega Menu Row ======-->
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <ul>
                                                            <li class="mega-list-title">

                                                                <a href="shop-side-version-2.html">JACKETS</a>
                                                            </li>
                                                            <li>

                                                                <a href="shop-side-version-2.html">Denim Jackets</a>
                                                            </li>
                                                            <li>

                                                                <a href="shop-side-version-2.html">Trucker Jackets</a>
                                                            </li>
                                                            <li>

                                                                <a href="shop-side-version-2.html">Windbreaker Jackets</a>
                                                            </li>
                                                            <li>

                                                                <a href="shop-side-version-2.html">Leather Jackets</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <ul>
                                                            <li class="mega-list-title">

                                                                <a href="shop-side-version-2.html">SUNGLASSES</a>
                                                            </li>
                                                            <li>

                                                                <a href="shop-side-version-2.html">Pilot</a>
                                                            </li>
                                                            <li>

                                                                <a href="shop-side-version-2.html">Wayfarer</a>
                                                            </li>
                                                            <li>

                                                                <a href="shop-side-version-2.html">Square</a>
                                                            </li>
                                                            <li>

                                                                <a href="shop-side-version-2.html">Round</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <ul>
                                                            <li class="mega-list-title">

                                                                <a href="shop-side-version-2.html">ACCESSORIES</a>
                                                            </li>
                                                            <li>

                                                                <a href="shop-side-version-2.html">Eyewear Frames</a>
                                                            </li>
                                                            <li>

                                                                <a href="shop-side-version-2.html">Scarves</a>
                                                            </li>
                                                            <li>

                                                                <a href="shop-side-version-2.html">Hats</a>
                                                            </li>
                                                            <li>

                                                                <a href="shop-side-version-2.html">Belts</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <ul>
                                                            <li class="mega-list-title">

                                                                <a href="shop-side-version-2.html">OTHER ACCESSORIES</a>
                                                            </li>
                                                            <li>

                                                                <a href="shop-side-version-2.html">Bags</a>
                                                            </li>
                                                            <li>

                                                                <a href="shop-side-version-2.html">Wallets</a>
                                                            </li>
                                                            <li>

                                                                <a href="shop-side-version-2.html">Watches</a>
                                                            </li>
                                                            <li>

                                                                <a href="shop-side-version-2.html">Tech Accessories</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <!--====== End - Mega Menu Row ======-->
                                                <br>

                                                <!--====== Mega Menu Row ======-->
                                                <div class="row">
                                                    <div class="col-lg-6 mega-image">
                                                        <div class="mega-banner">

                                                            <a class="u-d-block" href="shop-side-version-2.html">

                                                                <img class="u-img-fluid u-d-block" src="images/banners/banner-mega-8.jpg" alt=""></a>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 mega-image">
                                                        <div class="mega-banner">

                                                            <a class="u-d-block" href="shop-side-version-2.html">

                                                                <img class="u-img-fluid u-d-block" src="images/banners/banner-mega-9.jpg" alt=""></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--====== End - Mega Menu Row ======-->
                                            </div>
                                            <!--====== End - Men ======-->


                                            <!--====== No Sub Categories ======-->
                                            <div class="mega-menu-content">
                                                <h5>No Categories</h5>
                                            </div>
                                            <!--====== End - No Sub Categories ======-->


                                            <!--====== No Sub Categories ======-->
                                            <div class="mega-menu-content">
                                                <h5>No Categories</h5>
                                            </div>
                                            <!--====== End - No Sub Categories ======-->


                                            <!--====== No Sub Categories ======-->
                                            <div class="mega-menu-content">
                                                <h5>No Categories</h5>
                                            </div>
                                            <!--====== End - No Sub Categories ======-->


                                            <!--====== No Sub Categories ======-->
                                            <div class="mega-menu-content">
                                                <h5>No Categories</h5>
                                            </div>
                                            <!--====== End - No Sub Categories ======-->
                                        </div>
                                    </div>
                                    <!--====== End - Mega Menu ======-->
                                </li>
                                <li>

                                    <a href="{{url('/blogs')}}">Blog</a>
                                </li>
                                <li>
                                    <a href="#">Sample Request</a>
                                </li>
                                <li>
                                    <a href="#">Contact Us</a>
                                </li>
                                <li>
                                    <a href="#">About Us</a>
                                </li>


                            </ul>
                            <!--====== End - Dropdown ======-->
                            <!--====== End - List ======-->
                        </div>
                        <!--====== End - Menu ======-->
                    </div>
                    <!--====== End - Dropdown Main plugin ======-->
                    <a class="main-logo1 second" href="{{url('/')}}"> <img src="{{asset('front/images/logo/logo-1.png')}}" alt="" /></a>
                    <div class="menu-init" id="navigation3">
                        <!--     <button class="btn btn--icon toggle-button toggle-button--secondary fas fa-shopping-bag toggle-button-shop" type="button"></button>

                        <span class="total-item-round">2</span> -->
                        <div class="nav-hide-sm">
                            <!--    <span class="ah-close">✕ Close</span> -->

                            <!--====== List ======-->
                            <ul class="ah-list ah-list--design1 ah-list--link-color-secondary" style="display: flex;">
                                <li class="has-dropdown" data-tooltip="tooltip" data-placement="left" title="Account">
                                    <a class="addCls"><i class="far fa-user-circle"></i></a>

                                    <!--====== Dropdown ======-->
                                    <!-- 
                                    <span class="js-menu-toggle"></span> -->
                                    <ul style="width: 120px;top:45px;">
                                        @if(Auth::check())
                                        <li>
                                            <a href="dashboard.html">
                                                <i class="fas fa-user-circle u-s-m-r-6"></i>

                                                <span>{{Auth::user()->name}}</span>
                                            </a>
                                        </li>

                                        <li>
                                            <!-- <form action="{{route('logout')}}" method="post">
                                            @csrf
                                            <i class="fas fa-lock-open u-s-m-r-6"></i>

                                            <button type="submit"><span>Signout</span></button>
                                        </form> -->

                                            <a href="" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();"><i class="fas fa-lock-open u-s-m-r-6"></i>
                                                <span>Sign Out</span>
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>



                                        </li>
                                        @else
                                        <li>
                                            <a href="{{route('register')}}">
                                                <i class="fas fa-user-plus u-s-m-r-6"></i>

                                                <span>Signup</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{route('login')}}">
                                                <i class="fas fa-lock u-s-m-r-6"></i>

                                                <span>Signin</span>
                                            </a>
                                        </li>
                                        @endif

                                    </ul>
                                    <!--====== End - Dropdown ======-->
                                </li>
                                <!--   <li>
                                    <a href="{{route('home')}}"><i class="fas fa-home u-c-brand"></i></a>
                                </li> -->
                                <li>
                                    <a href="#" data-toggle="modal" data-target=".search-modal">
                                        <i class="fas fa-search"></i>
                                    </a>
                                </li>

                                @if(Auth::check())
                                <li class="has-dropdown">
                                    <a href="{{route('cart.index')}}" class="mini-cart-shop-link">
                                        <i class="fas fa-shopping-bag"></i>

                                        <span class="total-item-round">{{$count}}</span>
                                    </a>
                                </li>
                                @endif
                            </ul>
                        </div>
                        <!--====== Menu ======-->
                        <div class="ah-lg-mode">
                            <span class="ah-close">✕ Close</span>

                            <!--====== List ======-->
                            <ul class="ah-list ah-list--design1 ah-list--link-color-secondary">
                                <li>
                                    <div class="menu-init nav-hide" id="navigation">
                                        <button class="btn btn--icon toggle-button toggle-button--secondary fas fa-cogs" type="button"></button>

                                        <!--====== Menu ======-->
                                        <div class="ah-lg-mode">
                                            <span class="ah-close">✕ Close</span>

                                            <!--====== List ======-->
                                            <ul class="ah-list ah-list--design1 ah-list--link-color-secondary">
                                                <li class="has-dropdown" data-tooltip="tooltip" data-placement="left" title="Account">
                                                    <a class="addCls"><i class="far fa-user-circle"></i></a>

                                                    <!--====== Dropdown ======-->

                                                    <span class="js-menu-toggle"></span>
                                                    <ul style="width: 120px;">
                                                        @if(Auth::check())
                                                        <li>
                                                            <a href="{{route('accounts')}}">
                                                                <i class="fas fa-user-circle u-s-m-r-6"></i>

                                                                <span>{{Auth::user()->name}}</span>
                                                            </a>
                                                        </li>

                                                        <li>
                                                            <!-- <form action="{{route('logout')}}" method="post">
                                            @csrf
                                            <i class="fas fa-lock-open u-s-m-r-6"></i>

                                            <button type="submit"><span>Signout</span></button>
                                        </form> -->

                                                            <a href="" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();"><i class="fas fa-lock-open u-s-m-r-6"></i>
                                                                <span>Sign Out</span>
                                                            </a>

                                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                                @csrf
                                                            </form>



                                                        </li>
                                                        @else
                                                        <li>
                                                            <a href="{{route('register')}}">
                                                                <i class="fas fa-user-plus u-s-m-r-6"></i>

                                                                <span>Signup</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="{{route('login')}}">
                                                                <i class="fas fa-lock u-s-m-r-6"></i>

                                                                <span>Signin</span>
                                                            </a>
                                                        </li>
                                                        @endif

                                                    </ul>
                                                    <!--====== End - Dropdown ======-->
                                                </li>
                                                <!--====== End - List ======-->
                                        </div>
                                        <!--====== End - Menu ======-->
                                    </div>
                                </li>
                                <!--   <li>
                                    <a href="{{route('home')}}" class="nav-hide"><i class="fas fa-home u-c-brand"></i></a>
                                </li> -->
                                <li>
                                    <a href="#" class="nav-hide" data-toggle="modal" data-target=".search-modal"><i class="fas fa-search"></i></a>
                                </li>
                                @if(Auth::check())
                                <li class="has-dropdown">
                                    <a href="{{route('cart.index')}}" class="mini-cart-shop-link nav-hide">
                                        <i class="fas fa-shopping-bag"></i>

                                        <span class="total-item-round">{{$count}}</span>
                                    </a>
                                </li>
                                @endif

                            </ul>
                            <!--====== End - List ======-->
                        </div>
                        <!--====== End - Menu ======-->
                    </div>
                    <!--====== End - Dropdown Main plugin ======-->
                </div>
                <!--====== End - Secondary Nav ======-->
            </div>
        </nav>
        <!--====== End - Nav 2 ======-->
        <form method="get" action="{{url('/search')}}">
            <input class="input-text input-text--style-1" type="text" name="product" id="main-search" placeholder="Search Products..." />
            <button class="btn btn--icon fas fa-search main-search-button" type="submit"></button>
        </form>
    </header>
    <!--====== End - Main Header ======-->