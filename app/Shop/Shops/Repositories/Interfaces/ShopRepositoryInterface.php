<?php

namespace App\Shop\Shops\Repositories\Interfaces;

use Jsdecena\Baserepo\BaseRepositoryInterface;

interface ShopRepositoryInterface extends BaseRepositoryInterface{
    public function listProducts($request);

    public function productsByCategorySlug($request);

    public function categories();

}