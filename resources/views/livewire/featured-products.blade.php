<div>
   <!--====== Section 4 ======-->
   <div class="u-s-p-b-60">

<!--====== Section Intro ======-->
<div class="section__intro u-s-m-b-46">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section__text-wrap">
                    <h1 class="section__heading u-c-secondary u-s-m-b-12">FEATURED PRODUCTS</h1>

                    <span class="section__span u-c-silver">GET UP FOR NEW ARRIVALS</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!--====== End - Section Intro ======-->


<!--====== Section Content ======-->
<div class="section__content">
    <div class="container">
        <div class="slider-fouc">
            <div class="owl-carousel product-slider" data-item="4">
                @foreach($products as $product)
                <div class="u-s-m-b-30">
                    <div class="product-o product-o--hover-on">
                        <div class="product-o__wrap">

                            <a class="aspect aspect--bg-grey aspect--square u-d-block" href="product-detail.html">

                                <img class="aspect__img" src="{{isset($product->cover) ? asset($product->cover) : asset('front/images/product/electronic/product13.jpg')}}" alt=""></a>
                            <div class="product-o__action-wrap">
                                <ul class="product-o__action-list">
                                    <li>

                                        <a data-modal="modal" data-modal-id="quick-look" data-tooltip="tooltip" wire:click="quick({{$product}})" data-placement="top" title="Quick View"><i class="fas fa-search-plus"></i></a>
                                    </li>
                                    
                                    <li>
                                        
                                        <a href="#" data-tooltip="tooltip" data-placement="top" title="Add to Cart" class="cart" data-item="{{$product->id}}"><i class="fas fa-plus-circle"></i></a>
                                    </li>
                                    <!-- <li>

                                        <a href="signin.html" data-tooltip="tooltip" data-placement="top" title="Add to Wishlist"><i class="fas fa-heart"></i></a>
                                    </li> -->
                                    <!-- <li>

                                        <a href="signin.html" data-tooltip="tooltip" data-placement="top" title="Email me When the price drops"><i class="fas fa-envelope"></i></a>
                                    </li> -->
                                </ul>
                            </div>
                        </div>

                        <span class="product-o__category">

                            <a href="">
                                @foreach($product->categories as $category)
                                {{$category->name}}
                                @endforeach
                            </a></span>

                        <span class="product-o__name">

                            <a href="{{'product/'.$product->slug}}">{{$product->name}}</a></span>
                        <!-- <div class="product-o__rating gl-rating-style"><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i>

                            <span class="product-o__review">(0)</span>
                        </div> -->

                        <span class="product-o__price">{{config('cart.currency_symbol'). $product->price}}

                            <span class="product-o__discount">{{isset($product->sale_price) ? config('cart.currency_symbol'). $product->sale_price : ""}}</span></span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<!--====== End - Section Content ======-->
</div>
<!--====== End - Section 4 ======-->

<!--====== Quick Look Modal ======-->
<div wire:ignore>
<div class="modal fade">
     @livewire('quick-look')
 </div>
 <!--====== End - Quick Look Modal ======-->



</div>
</div>