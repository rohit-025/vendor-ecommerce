<?php

namespace App\Shop\Coupons\Repositories;

use App\Shop\Coupons\Coupon;
use Illuminate\Support\Collection;
use Jsdecena\Baserepo\BaseRepository;
use App\Shop\Coupons\Repositories\Interfaces\CouponRepositoryInterface;
use App\Shop\Coupons\UsedCoupon;
use DateTime;
use Illuminate\Support\Facades\Auth;

class CouponRepository extends BaseRepository implements CouponRepositoryInterface
{
    public function __construct(Coupon $coupon,UsedCoupon $usedCoupon)
    {
        parent::__construct($coupon);
        $this->model = $coupon;
        $this->usedCoupon = $usedCoupon;
    }

    public function listCoupons($sort, $order)
    {
        return $this->all(['*'], $sort, $order);
    }

    public function createCoupon($coupon)
    {
        return $this->create($coupon);
    }

    public function findById($id)
    {
        return $this->find($id);
    }

    public function subscriberCoupon()
    {
        return $this->model->where('type', 'subscribers')->latest()->first();
    }

    public function checkCoupon($coupon, $total)
    {
        $couponError = null;
        $checkCoupon = Coupon::where('code', $coupon)->first();
        if (!!$checkCoupon) {
            if (!!$checkCoupon->expiry) {
                $today = new DateTime(date("Y-m-d H:i:s"));
                if ($today > new DateTime($checkCoupon->expiry)){
                    $couponError = "Coupon Expired";
                    return $couponError;
                }
            }

            if (!!$checkCoupon->min_amount && $total < $checkCoupon->min_amount) {
                $couponError = "Amount is less than the amount needed for applying this coupon";
                return $couponError;
            }

            switch ($checkCoupon->type) {
                case "subscribers":
                    $checkUsage = $this->usedCoupon->where('customer_id', Auth::id())->where('type', 'subscribers')->where('status','ordered')->exists();
                    if ($checkUsage) {
                        $couponError = "Coupon already used";
                        return $couponError;
                    } else {
                        $this->usedCoupon->create(['customer_id'=> Auth::id(),'coupon_id' => $checkCoupon->id,'coupon' => $checkCoupon->code,'type' => 'subscribers','status' => 'tried']);

                        session(['coupon' => $checkCoupon]);
                    }
                    break;
                case "general":
                    $this->usedCoupon->create(['customer_id'=> Auth::id(),'coupon_id' => $checkCoupon->id,'coupon' => $checkCoupon->code,'type' => 'general','status' => 'tried']);

                    session(['coupon' => $checkCoupon]);    
                    break;
            }
        }

        return $couponError;
    }

    public function updateUsedCoupon()
    {
        $coupon = session('coupon');


        return (!!$coupon) ? $this->usedCoupon->where('coupon',$coupon->code)->where('customer_id',Auth::id())->update(['status' => 'ordered']): null;
    }
}
