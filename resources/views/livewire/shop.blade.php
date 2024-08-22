<div>
    <!--====== App Content ======-->
    <div class="app-content">

        <!--====== Section 1 ======-->
        <div class="u-s-p-y-90">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-12">
                        <div class="shop-w-master">
                            <h1 class="shop-w-master__heading u-s-m-b-30"><i class="fas fa-filter u-s-m-r-8"></i>

                                <span>FILTERS</span>
                            </h1>
                            <div class="shop-w-master__sidebar">
                                <div class="u-s-m-b-30">
                                    <div class="shop-w shop-w--style">
                                        <div class="shop-w__intro-wrap">
                                            <h1 class="shop-w__h">CATEGORY</h1>

                                            <span class="fas fa-minus shop-w__toggle" data-target="#s-category" data-toggle="collapse"></span>
                                        </div>
                                        <div class="shop-w__wrap collapse show" id="s-category">
                                            <ul class="shop-w__category-list gl-scroll">
                                                @foreach($categories as $category)
                                                <li class="has-list">

                                                    <a href={{$category->slug}}>{{$category->name}}</a>

                                                    <span class="js-shop-category-span is-expanded fas fa-plus u-s-m-l-6"></span>
                                                    <ul style="display:block">
                                                        @foreach($category->childCategory as $cat)
                                                        <li>

                                                            <a href="{{$cat->slug}}">{{$cat->name}}</a>
                                                        </li>
                                                        @endforeach
                                                    </ul>
                                                </li>
                                                @endforeach

                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="u-s-m-b-30">
                                    <div class="shop-w shop-w--style">
                                        <div class="shop-w__intro-wrap">
                                            <h1 class="shop-w__h">PRICE</h1>

                                            <span class="fas fa-minus shop-w__toggle" data-target="#s-price" data-toggle="collapse"></span>
                                        </div>
                                        <div class="shop-w__wrap collapse show" id="s-price">
                                            <!-- <form class="shop-w__form-p"> -->
                                            <div class="shop-w__form-p-wrap">
                                                <div>

                                                    <label for="price-min"></label>

                                                    <input class="input-text input-text--primary-style" type="text" id="price-min" name="min" wire:model.defer="min" placeholder="Min">
                                                </div>
                                                <div>

                                                    <label for="price-max"></label>

                                                    <input class="input-text input-text--primary-style" type="text" id="price-max" name="max" wire:model.defer="max" placeholder="Max">
                                                </div>
                                                <div>

                                                    <button class="btn btn--icon fas fa-angle-right btn--e-transparent-platinum-b-2" wire:click="price"></button>
                                                </div>
                                            </div>
                                            <!-- </form> -->
                                        </div>
                                    </div>
                                </div>

                                <!-- <div class="u-s-m-b-30">
                                    <div class="shop-w shop-w--style">
                                        <div class="shop-w__intro-wrap">
                                            <h1 class="shop-w__h">SIZE</h1>

                                            <span class="fas fa-minus collapsed shop-w__toggle" data-target="#s-size" data-toggle="collapse"></span>
                                        </div>
                                        <div class="shop-w__wrap collapse" id="s-size">
                                            <ul class="shop-w__list gl-scroll">
                                                <li>

                                                    <!--====== Check Box ======-->
                                <!-- <div class="check-box">

                                                        <input type="checkbox" id="xs">
                                                        <div class="check-box__state check-box__state--primary">

                                                            <label class="check-box__label" for="xs">XS</label>
                                                        </div>
                                                    </div> -->
                                <!--====== End - Check Box ======-->

                                <!-- <span class="shop-w__total-text">(2)</span>
                                                </li>
                                                <li> -->

                                <!--====== Check Box ======-->
                                <!-- <div class="check-box">

                                                        <input type="checkbox" id="small">
                                                        <div class="check-box__state check-box__state--primary">

                                                            <label class="check-box__label" for="small">Small</label>
                                                        </div>
                                                    </div> -->
                                <!--====== End - Check Box ======-->

                                <!-- <span class="shop-w__total-text">(4)</span>
                                                </li>
                                                <li> -->

                                <!--====== Check Box ======-->
                                <!-- <div class="check-box">

                                                        <input type="checkbox" id="medium">
                                                        <div class="check-box__state check-box__state--primary">

                                                            <label class="check-box__label" for="medium">Medium</label>
                                                        </div>
                                                    </div> -->
                                <!--====== End - Check Box ======-->

                                <!-- <span class="shop-w__total-text">(6)</span>
                                                </li>
                                                <li> -->

                                <!--====== Check Box ======-->
                                <!-- <div class="check-box">

                                                        <input type="checkbox" id="large">
                                                        <div class="check-box__state check-box__state--primary">

                                                            <label class="check-box__label" for="large">Large</label>
                                                        </div>
                                                    </div> -->
                                <!--====== End - Check Box ======-->

                                <!-- <span class="shop-w__total-text">(8)</span>
                                                </li>
                                                <li> -->

                                <!--====== Check Box ======-->
                                <!-- <div class="check-box">

                                                        <input type="checkbox" id="xl">
                                                        <div class="check-box__state check-box__state--primary">

                                                            <label class="check-box__label" for="xl">XL</label>
                                                        </div>
                                                    </div> -->
                                <!--====== End - Check Box ======-->

                                <!-- <span class="shop-w__total-text">(10)</span>
                                                </li>
                                                <li> -->

                                <!--====== Check Box ======-->
                                <!-- <div class="check-box">

                                                        <input type="checkbox" id="xxl">
                                                        <div class="check-box__state check-box__state--primary">

                                                            <label class="check-box__label" for="xxl">XXL</label>
                                                        </div>
                                                    </div> -->
                                <!--====== End - Check Box ======-->

                                <!-- <span class="shop-w__total-text">(12)</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-12">
                        <div class="shop-p">
                            <div class="shop-p__toolbar u-s-m-b-30">
                                <!-- <div class="shop-p__meta-wrap u-s-m-b-60">

                            <span class="shop-p__meta-text-1">FOUND 18 RESULTS</span>
                            <div class="shop-p__meta-text-2">

                                <span>Related Searches:</span>

                                <a class="gl-tag btn--e-brand-shadow" href="#">men's clothing</a>

                                <a class="gl-tag btn--e-brand-shadow" href="#">mobiles & tablets</a>

                                <a class="gl-tag btn--e-brand-shadow" href="#">books & audible</a></div>
                        </div> -->
                                <div class="shop-p__tool-style">
                                    <div class="tool-style__group u-s-m-b-8">

                                        <span class="js-shop-grid-target is-active">Grid</span>

                                        <span class="js-shop-list-target">List</span>
                                    </div>
                                    <form>
                                        <div class="tool-style__form-wrap">
                                            <!-- <div class="u-s-m-b-8"><select class="select-box select-box--transparent-b-2">
                                            <option>Show: 8</option>
                                            <option selected>Show: 12</option>
                                            <option>Show: 16</option>
                                            <option>Show: 28</option>
                                        </select></div> -->
                                            <div class="u-s-m-b-8">
                                                <form><select class="select-box select-box--transparent-b-2" wire:change="sort($event.target.value)">
                                                        <option value="latest">Sort By: Newest Items</option>
                                                        <!-- <option>Sort By: Best Rating</option> -->
                                                        <option value="lowest">Sort By: Lowest Price</option>
                                                        <option value="highest">Sort By: Highest Price</option>
                                                    </select></form>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="shop-p__collection">
                                <div class="row is-grid-active">
                                    @foreach($products as $product)
                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                        <div class="product-m">
                                            <div class="product-m__thumb">

                                                <a class="aspect aspect--bg-grey aspect--square u-d-block" href="{{url('/product/'.$product->slug)}}">

                                                    <img class="aspect__img" src="{{(!!$product->cover) ? asset($product->cover) : asset('front/images/product/men/product6.jpg')}}" alt=""></a>
                                                <div class="product-m__quick-look">

                                                    <a class="fas fa-search" data-modal="modal" data-modal-id="#quick-look" data-tooltip="tooltip" data-placement="top" title="Quick Look"></a>
                                                </div>
                                                <div class="product-m__add-cart">

                                                    <a class="btn--e-brand cart" data-modal="modal" data-item="{{$product->id}}">Add to Cart</a>
                                                </div>
                                            </div>
                                            <div class="product-m__content">
                                                <div class="product-m__category">

                                                    <a href="#"><a href="">
                                                            @foreach($product->categories as $category)
                                                            {{$category->name}}
                                                            @endforeach
                                                        </a></a>
                                                </div>
                                                <div class="product-m__name">

                                                    <a href="{{url('/product/'.$product->slug)}}">{{$product->name}}</a>
                                                </div>
                                                <!-- <div class="product-m__rating gl-rating-style"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i><i class="far fa-star"></i><i class="far fa-star"></i>

                                            <span class="product-m__review">(23)</span></div> -->
                                            <div class="row">    
                                            <div class="product-m__price">{{ env("CURRENCY_SYMBOL")." ".((!!$product->sale_price) ? $product->sale_price : $product->price) }}</div>
                                                <div class="product-o__discount">{{((!!$product->sale_price) ? env("CURRENCY_SYMBOL")." ".$product->price : '')}}</div>
                                                </div>
                                                <div class="product-m__hover">
                                                    <div class="product-m__preview-description">

                                                        <span>{!! $product->description !!}</span>
                                                    </div>
                                                    <!-- <div class="product-m__wishlist">

                                                    <a class="far fa-heart" href="#" data-tooltip="tooltip" data-placement="top" title="Add to Wishlist"></a>
                                                </div> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach

                                    @if(count($products) < $total)
                                    <div class="col-lg-12">
                                        <div class="load-more">
                                            <button class="btn btn--e-brand" type="button" wire:click="loadMore">Load More</button>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--====== End - Section 1 ======-->
            </div>
            <!--====== End - App Content ======-->

        </div>