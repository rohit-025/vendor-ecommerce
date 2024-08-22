<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Shop\Products\Product;


class FeaturedProducts extends Component
{
    public $products = [];

    public $product = null;

    public function products(){
        $this->products = Product::where('featured',1)->limit(20)->get();
    }

    public function quick($product){
        $this->emit('overview',$product);
    }

    public function render()
    {
        $this->products();
        return view('livewire.featured-products');
    }
}
