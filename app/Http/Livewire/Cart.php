<?php

namespace App\Http\Livewire;

use App\Shop\Carts\CustomCart;
use App\Shop\Products\Stock;
use App\Shop\Settings\ShippingCost;
use App\Shop\Settings\Size;
use App\Shop\Settings\Tax;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Database\Eloquent\Builder;

class Cart extends Component
{
    public $cart;

    public $shipping;

    public $tax;

    public $sizes;

    public $cartErrors = [];

    public $sizeErrors = [];


    public function updateQuantity($id, $quantity, $action)
    {
        switch ($action) {
            case "+":
                $quantity += 1;
                break;
            case "-":
            case "-":
                if ($quantity > 1)
                    $quantity -= 1;
                break;
            default:
                return;
                break;
        }

        CustomCart::where('id', $id)->update(['quantity' => $quantity]);

        // $this->render();
    }

    public function deleteCart($id)
    {
        CustomCart::where('id', $id)->delete();

        $this->emit('itemAdded');

        $this->render();
    }

    public function delete()
    {
        CustomCart::where('customer_id', Auth::id())->delete();

        $this->emit('itemAdded');
        $this->render();


    }

    public function updateSize($value, $id)
    {
        CustomCart::where('id', $id)->update(['size' => $value]);

        // $cart = CustomCart::where('id',$id)->first();

        // $stock = Stock::where('product_id',$cart->product_id)->where('size',$value)->first();

        // if($stock->stock < $cart->quantity){
        //    array_push($this->cartErrors,$id); 
        // }else{
        //     foreach (array_keys($this->cartErrors,$id) as $key) {
        //         unset($this->cartErrors[$key]);
        //     }

        // }
    }

    public function render()
    {
        $this->cart = CustomCart::where('customer_id', Auth::id())->with('product')->get();

        $this->shipping = ShippingCost::first();

        $this->tax = Tax::first();

        $this->sizes = explode(",", (Size::first())->sizes);

        foreach ($this->cart as $cartItem) {
            if (!!$cartItem->size) {
                foreach (array_keys($this->sizeErrors, $cartItem->id) as $key) {
                    unset($this->sizeErrors[$key]);
                }

                $stock = Stock::where('product_id', $cartItem->product_id)->where('size', $cartItem->size)->select('stock')->first();
                if(!!$stock){
                if ($cartItem->quantity > $stock->stock)
                    array_push($this->cartErrors, $cartItem->id);
                else {
                    foreach (array_keys($this->cartErrors, $cartItem->id) as $key) {
                        unset($this->cartErrors[$key]);
                    }
                }
              }else{
                array_push($this->cartErrors, $cartItem->id);
              }
            } else {
                array_push($this->sizeErrors, $cartItem->id);
            }
        }

        return view('livewire.cart');
    }
}
