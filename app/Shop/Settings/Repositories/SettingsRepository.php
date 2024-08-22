<?php

namespace App\Shop\Settings\Repositories;

use App\Shop\Settings\Repositories\Interfaces\SettingsRepositoryInterface;
use App\Shop\Settings\ShippingCost;
use App\Shop\Settings\Size;
use App\Shop\Settings\Tax;
use Jsdecena\Baserepo\BaseRepository;

class SettingsRepository extends BaseRepository implements SettingsRepositoryInterface{
    
    public function __construct(ShippingCost $shippingCost,Tax $tax,Size $size)
    {
       $this->taxModel = $tax;
       
       $this->shippingModel = $shippingCost;

       $this->size = $size;
    }
    
    public function tax(){
        return $this->taxModel->first();
    }

    public function shippingCost(){
        return $this->shippingModel->first();
    }

    public function sizes(){
        return $this->size->first();
    }

    public function updateTax($request){
        return $this->taxModel->updateOrCreate(
            ['id' => 1],
            ['tax_percent' => $request->tax]
        );
    }

    public function updateShipping($request){
        return $this->shippingModel->updateOrCreate(
            ['id' => 1],
            ['shipping_cost' => $request->shipping]
        );
    }

    public function updateSizes($request)
    {
        return $this->size->updateOrCreate(
            ['id' => 1],
            ['sizes' => $request->sizes]
        ); 
    }
} 