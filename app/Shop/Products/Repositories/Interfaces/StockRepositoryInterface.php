<?php

namespace App\Shop\Products\Repositories\Interfaces;

use Jsdecena\Baserepo\BaseRepositoryInterface;

interface StockRepositoryInterface extends BaseRepositoryInterface
{
  public function createStock($size,$id);

  public function updateStock($size,$id);
}