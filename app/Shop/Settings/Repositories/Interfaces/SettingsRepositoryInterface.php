<?php

namespace App\Shop\Settings\Repositories\Interfaces;

use Jsdecena\Baserepo\BaseRepositoryInterface;

interface SettingsRepositoryInterface extends BaseRepositoryInterface{
   
    public function tax();

    public function shippingCost();

    public function sizes();

    public function updateTax($request);

    public function updateShipping($request);

    public function updateSizes($request);
}