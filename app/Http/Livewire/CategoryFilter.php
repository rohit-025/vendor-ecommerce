<?php

namespace App\Http\Livewire;

use App\Shop\Categories\Category;
use App\Shop\Categories\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Shop\Products\Product;
use App\Shop\Products\Repositories\Interfaces\ProductRepositoryInterface;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class CategoryFilter extends Component
{
    public $products = [];

    public $categories = [];

    public $catId = null;

    public $name;

    protected $listeners = ['overview' => 'show'];

    public function show($product)
    {
        $this->name = $product['name'];

        $this->emit('toggleQuickLookModal');
    }

    public function products($id){
    
        $query = DB::table('category_product');
        
        $ids = $id != null ? $query->where('category_id','=',$id)->select('product_id')->get():$query->select('product_id')->get();

        $productIds = [];
        
        foreach($ids as $key => $id)
        $productIds[$key] = $id->product_id;

        $this->products = Product::whereIn('id',$productIds)->get();
    }

    public function filter($catId = null){
        $this->catId = $catId;
    }

    public function render()
    {
        $this->products($this->catId);

        $this->categories = Category::where('parent_id',null)->get();
        
        return view('livewire.category-filter');
    }

    // public function setProd($product){
    //     $this->product = $product;
    // }
}
