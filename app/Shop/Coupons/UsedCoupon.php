<?php

namespace App\Shop\Coupons;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsedCoupon extends Model
{
    use HasFactory;

    protected $fillable = ['customer_id','coupon_id','coupon','type'];
}
