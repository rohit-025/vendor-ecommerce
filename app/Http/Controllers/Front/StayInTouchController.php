<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Jobs\StayTouchJob;
use App\Mail\StayTouch;
use App\Shop\Coupons\Repositories\Interfaces\CouponRepositoryInterface;
use App\Shop\StayInTouch\Repositories\Interfaces\StayInTouchRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class StayInTouchController extends Controller
{
    public $stayInTouch;

    public $coupon;

    public function __construct(StayInTouchRepositoryInterface $stayInTouchRepositoryInterface,CouponRepositoryInterface $coupon)
    {
        $this->stayInTouch = $stayInTouchRepositoryInterface;

        $this->coupon = $coupon;
    }
    
    public function subscribe(Request $request){
        
        $coupon = $this->coupon->subscriberCoupon();

        $data['coupon_code'] = $coupon->code;

        // $birthday = explode(" ",$request->birthday);

        $data['birth_month'] = $request->birth_month;

        // $data['birth_day'] = $request->birth_month;

        $data['email'] = $request->email;

        $data['name'] = $request->name;

        $create = $this->stayInTouch->createSubscriber($data);

        if(!!$create){
            // StayTouchJob::dispatch($coupon,$request->email);
            Mail::to($request->email)->send(new StayTouch($coupon));

            return redirect()->back()->with('message','Subscribed Successfully,Please check you email for details');
        }else
        return redirect()->back()->with('error','Something went wrong');

    }

    public function notify($productId){
        $notify = $this->stayInTouch->notify($productId);

        if(!!$notify)
        return redirect(route('home'))->with('message','You will be notified when the product will get back in stock');
    }
}
