<?php

namespace App\Shop\Products\Repositories;

use App\Shop\Products\Product;
use Jsdecena\Baserepo\BaseRepository;
use App\Shop\Products\Repositories\Interfaces\StockRepositoryInterface;
use App\Shop\Products\Stock;

class StockRepository extends BaseRepository implements StockRepositoryInterface
{
    public function __construct(Stock $stock)
    {
        $this->model = $stock;
    }

    public function createStock($size, $id)
    {
        // $keys = array_keys($size);
        foreach($size as $key => $stock){
            $this->model->create([
                'product_id' => $id,
                'size' => $key,
                'stock' => $stock
            ]);
        }

        return true;
        // return $this->model->create()
    }

    public function updateStock($size, $id)
    {
        // $keys = array_keys($size);
        foreach($size as $key => $stock){
            $this->model->where('product_id',$id)->where('size',$key)->update(['stock' => $stock]);
        }

        return true;
        // return $this->model->create()
    }
}
