<div>
    <div class="filter-category-container">
        <div class="filter__category-wrapper">

            <button class="btn filter__btn filter__btn--style-1 js-checked" type="button" wire:click="filter({{null}})">ALL</button>
        </div>
        @foreach($categories as $category)
        <div class="filter__category-wrapper">

            <button class="btn filter__btn filter__btn--style-1" type="button" wire:click="filter({{$category->id}})">{{$category->name}}</button>
        </div>
        @endforeach

    </div>
    <div class="filter__grid-wrapper u-s-m-t-30">
        <div class="row">
            @php $i=0; @endphp
            @foreach($products as $product)
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 u-s-m-b-30 filter__item headphone">
                <div class="product-o product-o--hover-on product-o--radius">
                    <div class="product-o__wrap">

                        <a class="aspect aspect--bg-grey aspect--square u-d-block" href="{{url('/product/'.$product->slug)}}">

                            <img class="aspect__img" src="{{asset(isset($product->cover) ? $product->cover : 'front/images/product/electronic/product10.jpg')}}" alt=""></a>
                        <div class="product-o__action-wrap">
                            <ul class="product-o__action-list">
                                <li>
                                    <a data-tooltip="tooltip" data-placement="top" title="Quick View" class="overview" data-item="{{$product->id}}"><i class="fas fa-search-plus"></i></a>
                                    <!-- <a data-modal="modal" data-modal-id="#quick-look" data-tooltip="tooltip" data-placement="top" title="Quick View" wire:click="setProd('$product')"><i class="fas fa-search-plus"></i></a> -->
                                </li>
                                <li>

                                    <a href="#" data-tooltip="tooltip" data-placement="top" title="Add to Cart" class="cart" data-item="{{$product->id}}"><i class="fas fa-plus-circle"></i></a>
                                </li>
                                <!-- <li>

                                    <a href="signin.html" data-tooltip="tooltip" data-placement="top" title="Add to Wishlist"><i class="fas fa-heart"></i></a>
                                </li> -->

                            </ul>
                        </div>
                    </div>

                    <span class="product-o__category">
                        @foreach($product->categories as $category)
                        <a href="#">{{$category->name}},</a></span>
                    @endforeach

                    <span class="product-o__name">

                        <a href="{{url('/product/'.$product->slug)}}">{{$product->name}}</a></span>
                    <span class="product-o__price">{{env("CURRENCY_SYMBOL")." ".((!!$product->sale_price) ? $product->sale_price : $product->price)}}

                        <span class="product-o__discount">{{((!!$product->sale_price) ? env("CURRENCY_SYMBOL")." ".$product->price : '')}}</span></span>
                </div>
            </div>
            @php
            $i++;
            if($i > 11)
            break;
            @endphp

            @endforeach

        </div>
    </div>
    @if(count($products) > 12)
    <!-- <div class="col-lg-12">
        <div class="load-more">
            <button class="btn btn--e-brand" type="button">Load More</button>
        </div>
    </div> -->
    @endif
</div>