<?php

namespace App\Shop\Shops\Repositories;

use App\Shop\Categories\Category;
use App\Shop\Shops\Repositories\Interfaces\ShopRepositoryInterface;
use Jsdecena\Baserepo\BaseRepository;
use App\Shop\Products\Product;

class ShopRepository extends BaseRepository implements ShopRepositoryInterface{
    
    public function __construct(Product $product,Category $category)
    {
       $this->model = $product; 

       $this->category = $category;
    }
    
    public function listProducts($request)
    {
        $products = $this->model->where('status',1);
        if (!!$request->min) {
            $products->where('price', '>=', $request->min);
        }

        if (!!$request->max) {
            $products->where('price','<=',$request->max);
        }

        if(!!$request->sort){
            if($request->sort == 'latest')
            $products->latest();

            if($request->sort == 'lowest')
            $products->orderBy('price','asc');
        

            if($request->sort == 'highest')
            $products->orderBy('price','desc');
        }

         return $products->paginate($request->count);
        //return $products->get();
        //  dd($products->toSql());
    }

    public function productsByCategorySlug($request)
    {
        $catId = $this->category->where('slug',$request->slug)->with('categoryProd')->first();

        $productId = [];

        foreach($catId->categoryProd as $prod){
            array_push($productId,$prod->product_id);
        }


        $products = $this->model->whereIn('id',$productId);
        
        if (!!$request->min) {
            $products->where('price', '>=', $request->min)->orWhere('sale_price', '>=', $request->min);
        }

        if (!!$request->max) {
            $products->where('price','<=',$request->max)->orWhere('sale_price', '<=', $request->min);
        }

        if(!!$request->sort){
            if($request->sort == 'latest')
            $products->latest();

            if($request->sort == 'lowest')
            $products->orderBy('price','asc');
        

            if($request->sort == 'highest')
            $products->orderBy('price','desc');
        }

        return $products->paginate(2,['*'], 'page', $request->pageNumber);
    }

    public function categories()
    {
        return $this->category->where('parent_id',null)->get();
    }
}