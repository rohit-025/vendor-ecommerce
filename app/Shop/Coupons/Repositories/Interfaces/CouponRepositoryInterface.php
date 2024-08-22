<?php

namespace App\Shop\Coupons\Repositories\Interfaces;

use Jsdecena\Baserepo\BaseRepositoryInterface;

interface CouponRepositoryInterface extends BaseRepositoryInterface
{
  public function listCoupons($sort,$order);

  public function createCoupon($coupon);

  public function findById($id);

  public function subscriberCoupon();

  public function checkCoupon($coupon,$total);

  public function updateUsedCoupon();

}