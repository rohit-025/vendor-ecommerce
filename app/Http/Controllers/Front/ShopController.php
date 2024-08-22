<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Shop\Shops\Repositories\Interfaces\ShopRepositoryInterface;
use App\Shop\Shops\Repositories\ShopRepository;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function __construct(ShopRepositoryInterface $shopRepo)
    {
        $this->shopRepo = $shopRepo;
    }

    public function shop($slug){
        // switch($slug){
        //     case "all":
        //         $products = $this->shopRepo->listProducts();
        //         break;
        //     default:
        //         $products = $this->shopRepo->productsByCategorySlug($slug);    
        // }

        // $categories = $this->shopRepo->categories();
        session(['slug' => $slug]);
        return view('front.shops.shop');
    }
}
