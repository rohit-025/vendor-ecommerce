 <!--====== Main Footer ======-->
 <!--====== Main Footer ======-->
 <footer>
     <div class="outer-footer">
         <div class="container">
             <div class="row">
                 <div class="col-lg-4 col-md-6">
                     <div class="outer-footer__content u-s-m-b-40">

                         <span class="outer-footer__content-title">Contact Us</span>
                         <div class="outer-footer__text-wrap"><i class="fas fa-home"></i>

                             <span>Mumbai, Maharashtra, India</span>
                         </div>
                         <div class="outer-footer__text-wrap"><i class="fas fa-phone-volume"></i>

                             <span>(+91) 123456789 </span>
                         </div>
                         <div class="outer-footer__text-wrap"><i class="far fa-envelope"></i>

                             <span>dummy@gmail.com</span>
                         </div>
                         <div class="outer-footer__social">
                             <ul>
                                 <li>

                                     <a class="s-fb--color-hover" href="#"><i class="fab fa-facebook-f"></i></a>
                                 </li>
                                 <li>

                                     <a class="s-youtube--color-hover" href="#"><i class="fab fa-youtube"></i></a>
                                 </li>
                                 <li>

                                     <a class="s-insta--color-hover" href="#"><i class="fab fa-instagram"></i></a>
                                 </li>
                             </ul>
                         </div>
                     </div>
                 </div>
                 <div class="col-lg-4 col-md-6">
                     <div class="row">
                         <div class="col-lg-6 col-md-6">
                             <div class="outer-footer__content u-s-m-b-40">

                                 <span class="outer-footer__content-title">Information</span>
                                 <div class="outer-footer__list-wrap">
                                     <ul>
                                         <li>

                                             <a href="{{url('cart')}}">Cart</a>
                                         </li>
                                         <li>

                                             <a href="">Account</a>
                                         </li>
                                         <!-- <li>

                                             <a href="shop-side-version-2.html">Manufacturer</a>
                                         </li>
                                         <li>

                                             <a href="dash-payment-option.html">Finance</a>
                                         </li> -->
                                         <li>

                                             <a href="{{url('/shop/all')}}">Shop</a>
                                         </li>
                                     </ul>
                                 </div>
                             </div>
                         </div>
                         <div class="col-lg-6 col-md-6">
                             <div class="outer-footer__content u-s-m-b-40">
                                 <div class="outer-footer__list-wrap">

                                     <span class="outer-footer__content-title">Our Company</span>
                                     <ul>
                                         <li>

                                             <a href="about.html">About us</a>
                                         </li>
                                         <li>

                                             <a href="contact.html">Contact Us</a>
                                         </li>
                                         <li>

                                             <a href="blog-right-sidebar.html">Blogs</a>
                                         </li>
                                         <!-- <li>

                                             <a href="dash-my-order.html">Delivery</a>
                                         </li> -->
                                         <li>

                                             <a href="{{url('shop/all')}}">Store</a>
                                         </li>
                                     </ul>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
                 <!-- <div class="col-lg-4 col-md-12">
                     <div class="outer-footer__content">

                         <span class="outer-footer__content-title">Stay in Touch</span>
                         <form class="newsletter">
                             <div class="newsletter__group">

                                 <label for="newsletter"></label>

                                 <input class="input-text input-text--only-white" type="text" id="newsletter" placeholder="Enter your Email">

                                 <button class="btn btn--e-brand newsletter__btn" type="submit">SUBSCRIBE</button>
                             </div>

                             <span class="newsletter__text">Subscribe to the mailing list to receive updates on promotions, new arrivals, discount and coupons.</span>
                         </form>
                     </div>
                 </div> -->
             </div>
         </div>
     </div>
     <div class="lower-footer">
         <div class="container">
             <div class="row">
                 <div class="col-lg-12">
                     <div class="lower-footer__content">
                         <div class="lower-footer__copyright">

                             <span>Copyright © 2021</span>

                             <a href="index.html">E-Commerce</a>

                             <span>All Right Reserved</span>
                         </div>
                         <div class="lower-footer__payment">
                             <ul>
                                 <li><i class="fab fa-cc-stripe"></i></li>
                                 <li><i class="fab fa-cc-paypal"></i></li>
                                 <li><i class="fab fa-cc-mastercard"></i></li>
                                 <li><i class="fab fa-cc-visa"></i></li>
                                 <li><i class="fab fa-cc-discover"></i></li>
                                 <li><i class="fab fa-cc-amex"></i></li>
                             </ul>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </footer>

 <!--====== Add to Cart Modal ======-->
 <div class="modal fade" id="add-to-cart">
     <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content modal-radius modal-shadow">

             <button class="btn dismiss-button fas fa-times" type="button" data-dismiss="modal"></button>
             <div class="modal-body">
                 <div class="row">
                     <div class="col-lg-6 col-md-12">
                         <div class="success u-s-m-b-30">
                             <div class="success__text-wrap"><i class="fas fa-check"></i>

                                 <span>Item is added successfully!</span>
                             </div>
                             <!-- <div class="success__img-wrap">

                                 <img class="u-img-fluid" src="{{asset('front/images/product/electronic/product1.jpg')}}" alt="">
                             </div>
                             <div class="success__info-wrap">

                                 <span class="success__name">Beats Bomb Wireless Headphone</span>

                                 <span class="success__quantity">Quantity: 1</span>

                                 <span class="success__price">$170.00</span>
                             </div> -->
                         </div>
                     </div>
                     <div class="col-lg-6 col-md-12">
                         <div class="s-option">

                             <!-- <span class="s-option__text">1 item (s) in your cart</span> -->
                             <div class="s-option__link-box">

                                 <a class="s-option__link btn--e-white-brand-shadow" href="{{route('home')}}">CONTINUE SHOPPING</a>

                                 <a class="s-option__link btn--e-white-brand-shadow" href="{{route('cart.index')}}">VIEW CART</a>

                                 <!-- <a class="s-option__link btn--e-brand-shadow" href="{{route('checkout.index')}}">PROCEED TO CHECKOUT</a> -->
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <!--====== End - Add to Cart Modal ======-->

 <!--====== Login First Modal ======-->
 <div class="modal fade" id="login-first">
     <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content modal-radius modal-shadow">

             <button class="btn dismiss-button fas fa-times" type="button" data-dismiss="modal"></button>
             <div class="modal-body">
                 <div class="row">
                     <div class="col-md-12">
                         <div class="success u-s-m-b-30">
                             <div class="success__text-wrap">

                                 <span style="color: red;">Please login to use full functionalities</span>
                             </div>

                         </div>
                     </div>

                 </div>
             </div>
         </div>
     </div>
 </div>
 <!--====== End - Login First Modal ======-->


 <!--====== Newsletter Subscribe Modal ======-->
 <div class="modal fade new-l" id="newsletter-modal">
     <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content modal--shadow">

             <button class="btn new-l__dismiss fas fa-times" type="button" data-dismiss="modal"></button>
             <div class="modal-body">
                 <div class="row u-s-m-x-0">
                     <div class="col-lg-6 new-l__col-1 u-s-p-x-0">

                         <a class="new-l__img-wrap u-d-block" href="#">

                             <img class="u-img-fluid u-d-block" src="{{asset('front/images/newsletter/newsletter.jpg')}}" alt=""></a>
                     </div>
                     <div class="col-lg-6 new-l__col-2">
                         <div class="new-l__section u-s-m-t-30">
                             <div class="u-s-m-b-8 new-l--center">
                                 <h3 class="new-l__h3">Stay in Touch</h3>
                             </div>
                             <div class="u-s-m-b-30 new-l--center">
                                 <!-- <p class="new-l__p1">Sign up for emails to get the scoop on new arrivals, special sales and more.</p> -->
                             </div>
                             <form class="new-l__form" method="post" action="{{route('subscribe')}}">
                                 @csrf
                                 <div class="u-s-m-b-15">

                                     <input class="news-l__input" name="name" id="" placeholder="Name" required/>

                                 </div>
                                 <div class="u-s-m-b-15">

                                     <input class="news-l__input" type="email" name="email" placeholder="E-mail Address" required>
                                 </div>
                                 <div class="u-s-m-b-15">

                                     <!-- <input class="news-l__input" name="birthday" id="datepicker" /> -->
                                    <select class="news-l__input" name="birth_month" required>
                                    
                                        <option value="1">January</option>
                                        <option value="2">February</option>
                                        <option value="3">March</option>
                                        <option value="4">April</option>
                                        <option value="5">May</option>
                                        <option value="6">June</option>
                                        <option value="7">July</option>
                                        <option value="8">August</option>
                                        <option value="9">September</option>
                                        <option value="10">October</option>
                                        <option value="11">November</option>
                                        <option value="12">December</option>
                                    </select>
                                 </div>
                                 <div class="u-s-m-b-15">

                                     <button class="btn btn--e-brand-b-2" type="submit">Subscribe!</button>
                                 </div>
                             </form>
                             <div class="u-s-m-b-15 new-l--center">
                                 <!-- <p class="new-l__p2">By Signing up, you agree to receive Reshop offers,<br />promotions and other commercial messages. You may unsubscribe at any time.</p> -->
                             </div>
                             <div class="u-s-m-b-15 new-l--center">

                                 <a class="new-l__link" data-dismiss="modal">No Thanks</a>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <!--====== End - Newsletter Subscribe Modal ======-->
 <!--====== Quick Look Modal ======-->
 <div class="modal fade" id="quick-look">
     <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content modal--shadow">

             <button class="btn dismiss-button fas fa-times" type="button" data-dismiss="modal"></button>
             <div class="modal-body">
                 <div class="row">
                    <div class="col-lg-5">
                         <!--====== Product Detail ======-->
                         <div class="pd u-s-m-b-30">
                             <div class="pd-wrap" id="prod-cover">

                             </div>
                             <div class="u-s-m-t-15" id="prod-cover-thumb">

                             </div>
                             <!--====== End - Product Detail ======-->
                         </div>
                    </div>
                    <div class="col-lg-7">

                         <!--====== Product Right Side Details ======-->
                         <div class="pd-detail">
                             <div>

                                 <span class="pd-detail__name" id="prod-name"></span>
                             </div>
                             <div>
                                 <div class="pd-detail__inline">

                                     <span class="pd-detail__price" id="prod-price">$6.99</span>

                                     <span class="pd-detail__discount" id="prod-discount">(76% OFF)</span><del class="pd-detail__del" id="prod-discounted-price">$28.97</del>
                                 </div>
                             </div>
                             <!-- <div class="u-s-m-b-15">
                                    <div class="pd-detail__rating gl-rating-style"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>

                                        <span class="pd-detail__review u-s-m-l-4">

                                            <a href="product-detail.html">23 Reviews</a></span>
                                    </div>
                                </div> -->
                             <div class="u-s-m-b-15">
                                 <div class="pd-detail__inline" id="prod-stock">

                                     <!-- <span class="pd-detail__stock">200 in stock</span>

                                        <span class="pd-detail__left" >Only 2 left</span> -->
                                 </div>
                             </div>
                             <div class="u-s-m-b-15">

                                 <span class="pd-detail__preview-desc" id="prod-short-description">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</span>
                             </div>
                             <!-- <div class="u-s-m-b-15">
                                    <div class="pd-detail__inline">

                                        <span class="pd-detail__click-wrap"><i class="far fa-heart u-s-m-r-6"></i>

                                            <a href="signin.html">Add to Wishlist</a>

                                            <span class="pd-detail__click-count">(222)</span></span>
                                    </div>
                                </div> -->
                             <div class="u-s-m-b-15" id="prod-email">

                             </div>
                             <div class="u-s-m-b-15">
                                 <ul class="pd-social-list">
                                     <li>

                                         <a class="s-fb--color-hover" href="#"><i class="fab fa-facebook-f"></i></a>
                                     </li>
                                     <li>

                                         <a class="s-insta--color-hover" href="#"><i class="fab fa-instagram"></i></a>
                                     </li>
                                     <li>

                                         <a class="s-wa--color-hover" href="#"><i class="fab fa-whatsapp"></i></a>
                                     </li>

                                 </ul>
                             </div>
                             <div class="u-s-m-b-15">
                                 <form class="pd-detail__form">
                                     <div class="pd-detail-inline-2">
                                         <div class="u-s-m-b-15">

                                             <!--====== Input Counter ======-->
                                             <!-- <div class="input-counter">

                                                 <span class="input-counter__minus fas fa-minus"></span>

                                                 <input class="input-counter__text input-counter--text-primary-style" type="text" value="1" data-min="1" data-max="1000">

                                                 <span class="input-counter__plus fas fa-plus"></span>
                                             </div> -->
                                             <!--====== End - Input Counter ======-->
                                         </div>
                                         <div class="u-s-m-b-15" id="cart">


                                         </div>
                                     </div>
                                 </form>
                             </div>
                             <div class="u-s-m-b-15">

                                 <span class="pd-detail__label u-s-m-b-8">Product Policy:</span>
                                 <ul class="pd-detail__policy-list">
                                     <li><i class="fas fa-check-circle u-s-m-r-8"></i>

                                         <span>Buyer Protection.</span>
                                     </li>
                                     <li><i class="fas fa-check-circle u-s-m-r-8"></i>

                                         <span>Full Refund if you don't receive your order.</span>
                                     </li>
                                     <li><i class="fas fa-check-circle u-s-m-r-8"></i>

                                         <span>Returns accepted if product not as described.</span>
                                     </li>
                                 </ul>
                             </div>
                         </div>
                         <!--====== End - Product Right Side Details ======-->
                    </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <!--====== End - Quick Look Modal ======-->

 <!--====== End - Modal Section ======-->

 <!--====== End - Main App ======-->