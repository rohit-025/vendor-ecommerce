<?php

namespace App\Shop\Offers\Repositories\Interfaces;

use Jsdecena\Baserepo\BaseRepositoryInterface;

interface OfferRepositoryInterface extends BaseRepositoryInterface
{
    public function offerById($id);

    public function store($data);

    public function alreadyOffered($startDate,$endDate);

    public function alreadyOfferedProducts($alreadyOffered);

    public function productByCategory($alreadyOfferedProducts,$id);

    public function addProduct($request);
}
