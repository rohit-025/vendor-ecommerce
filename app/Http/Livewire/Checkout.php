<?php

namespace App\Http\Livewire;

use App\Shop\Addresses\Repositories\Interfaces\AddressRepositoryInterface;
use App\Shop\Carts\CustomCart;
use App\Shop\Carts\Repositories\Interfaces\CartRepositoryInterface;
use App\Shop\Coupons\Coupon;
use App\Shop\Coupons\Repositories\Interfaces\CouponRepositoryInterface;
use App\Shop\Coupons\UsedCoupon;
use App\Shop\Settings\Repositories\Interfaces\SettingsRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Checkout extends Component
{
    private $cartRepo;
    
    private $addressRepo;

    private $chargesRepo;

    public $products;

    public $defaultAddress;

    public $taxPercent;

    public $subTotal;

    public $shippingCost;

    public $calculatedTax;

    public $total;

    public $coupon;

    public $discount;

    public $couponError;

    public function render(CartRepositoryInterface $cartRepo,AddressRepositoryInterface $address,SettingsRepositoryInterface $settings)
    {
        $this->cartRepo = $cartRepo;

        $this->addressRepo = $address;

        $this->chargesRepo = $settings;

        $this->products = $this->cartRepo->getCartItems();

        $this->defaultAddress = $this->addressRepo->defaultAddress();
        
        // $customer = $request->user();
        
        $this->taxPercent = $this->chargesRepo->tax();

        $this->subTotal = $this->cartRepo->getSubTotal();

        $this->shippingCost = $this->chargesRepo->shippingCost();

        $this->calculatedTax = ((($this->taxPercent->tax_percent)/100)*$this->subTotal);

        $this->total = $this->cartRepo->getTotal();

        return view('livewire.checkout');
    }

    public function submit(CouponRepositoryInterface $coupon){
        $check = $coupon->checkCoupon($this->coupon,$this->total);

        if(!!$check)
        $this->couponError = $check;

    }
}
