<?php

namespace App\Shop\Offers\Repositories;

use App\Shop\Categories\CategoryProduct;
use App\Shop\Offers\Offer;
use App\Shop\Offers\OfferProduct;
use Jsdecena\Baserepo\BaseRepository;
use App\Shop\Offers\Repositories\Interfaces\OfferRepositoryInterface;

class OfferRepository extends BaseRepository implements OfferRepositoryInterface
{
    public function __construct(Offer $offer,OfferProduct $offerProduct,CategoryProduct $categoryProduct)
    {
        parent::__construct($offer);
        $this->model = $offer;

        $this->offerProduct = $offerProduct;

        $this->categoryProduct = $categoryProduct;
    }
    public function store($data)
    {
        return $this->create($data);
    }

    public function offerById($id)
    {
        return $this->model->where('id', $id)
            ->select('start_date', 'end_date')
            ->first();
    }

    public function alreadyOffered($startDate, $endDate)
    {
        return $this->model->where([['start_date', '<=', $startDate], ['end_date', '>=', $startDate]])
                    ->orWhere([['start_date', '<=', $endDate], ['end_date', '>=', $endDate]])
                    ->orWhere([['start_date', '>=', $startDate], ['end_date', '>=', $endDate]])
                    ->orWhere([['start_date', '<=', $startDate], ['end_date', '>=', $endDate]])
                    ->select('id')
            ->get();
    }

    public function alreadyOfferedProducts($alreadyOffered){
        return $this->offerProduct->whereIn('offer_id', $alreadyOffered->toArray())
            ->select('product_id')
            ->get();
    }

    public function productByCategory($alreadyOfferedProducts,$id)
    {
        return $this->categoryProduct->where('category_id',$id)->with('products')->whereNotIn('product_id',$alreadyOfferedProducts)->get();
    }

    public function addProduct($request)
    {
        for ($i = 0; $i < count($request->product_id); $i++) {
            $data[$i] = ['offer_id' => $request->offer_id, 'product_id' => $request->product_id[$i]];
        }

        $this->offerProduct->insert($data);

        $this->model->where('id',$request->offer_id)->update(['status' => 'Completed']);

        return true;
    }
}