<?php

namespace App\Http\Livewire;

use App\Shop\Shops\Repositories\Interfaces\ShopRepositoryInterface;
use Illuminate\Http\Request;
use Livewire\Component;

class Shop extends Component
{
    private $shopRepo;
    

    public $products = [];

    public $categories = [];

    public $sort;

    public $slug;

    public $min;

    public $max;

    public $currentPage;

    public $total;

    // public function mount(ShopRepositoryInterface $shopRepo)
    // {
    //     $this->shopRepo = $shopRepo;
    // }

    public function render(ShopRepositoryInterface $shopRepo,Request $request)
    {
        $this->shopRepo = $shopRepo;

        if($request->has('slug'))
        $this->slug = $request->slug;
        else
        $this->slug = session('slug');

        $request['min'] = $this->min;

        $request['max'] = $this->max;

        $request['sort'] = $this->sort;

        $request['slug'] = $this->slug;

        // $request['pageNumber'] = $this->currentPage;

        $request['count'] = !!$this->currentPage ? $this->currentPage * 30:30;

        // $request['sortBy'] = $this->sort;

        switch($this->slug){
            case "all":
                $prods = $this->shopRepo->listProducts($request);
                
                $this->products = $prods->items();

                $this->total = $prods->total();
            
                // $this->currentPage = $prods->currentPage();
                break;
            default:
                $prods = $this->shopRepo->productsByCategorySlug($request);
                
                $this->products = $prods->items();

                $this->total = $prods->total();
            
                // $this->currentPage = $prods->currentPage();
                break;
        }

        $this->categories = $this->shopRepo->categories();

        return view('livewire.shop');
    }

    public function sort($sort){
        $this->sort = $sort;
    }

    public function loadMore(){
        $this->currentPage = $this->currentPage + 1;
    }

    public function price(){
        //
    }
}
