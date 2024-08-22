<?php

namespace App\Shop\Carts\Repositories;

use App\Shop\Carts\CustomCart;
use Jsdecena\Baserepo\BaseRepository;
use App\Shop\Carts\Repositories\Interfaces\CartRepositoryInterface;
use App\Shop\Products\Product;
use App\Shop\Couriers\Courier;
use App\Shop\Customers\Customer;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use App\Shop\Products\Repositories\ProductRepository;
use App\Shop\Products\Stock;
use App\Shop\Settings\Repositories\SettingsRepository;
use App\Shop\Settings\ShippingCost;
use App\Shop\Settings\Tax;

class CustomCartRepository extends BaseRepository implements CartRepositoryInterface
{
    public function __construct(CustomCart $cart)
    {
        $this->model = $cart;
    }

    public function addToCart($productId,$quantity)
    {
        return $this->create([
            'product_id' => $productId,
            'customer_id' => Auth::id(),
            'quantity' => $quantity
        ]);
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function getCartItems()
    {
        $items = $this->model->where('customer_id',Auth::id())->with('product')->get();

        $product = [];
        
        foreach($items as $item){
            array_push($product,[
                'id' => $item->product->id,
                'name' => $item->product->name,
                'price' => isset($item->product->sale_price) ? $item->product->sale_price : $item->product->price,
                'quantity' => $item->quantity,
                'image' => $item->product->cover,
                'size' => $item->size
            ]);
        }

        return $product;


    }

    public function checkStocks(){
        $check = true;
        $items = $this->model->where('customer_id',Auth::id())->with('product')->get();
        
        foreach($items as $cartItem){
            if(!!$cartItem->size){
            $stock = Stock::where('product_id',$cartItem->product_id)->where('size',$cartItem->size)->select('stock')->first();
              if($cartItem->quantity > $stock->stock) 
                $check = false;
            }else{
                $check = false;
            }
        }

        return $check;
    }

    /**
     * @param string $rowId
     *
     * @throws ProductInCartNotFoundException
     */
    public function removeToCart(string $rowId)
    {
        
    }

    /**
     * Count the items in the cart
     *
     * @return int
     */
    public function countItems():int
    {
      return $this->model->where('customer_id',Auth::id())->count();  
    }

    /**
     * Get the sub total of all the items in the cart
     *
     * @param int $decimals
     * @return float
     */
    public function getSubTotal()
    {
        $cart = $this->getCartItems();

        $subTotal = 0;
        
        foreach($cart as $cartItem)
        $subTotal = $subTotal + ($cartItem['price'] * $cartItem['quantity']);

        return $subTotal;
        
    }

    /**
     * Get the final total of all the items in the cart minus tax
     *
     * @param int $decimals
     * @param float $shipping
     * @return float
     */

    public function actualTotal(){
        $tax = Tax::first();
        
        $shipping = ShippingCost::first();

        $total = 0;

        $items = $this->getCartItems();
        
        foreach($items as $item){
            $total += ($item['quantity'] * $item['price']);
        }

        $actualTotal = $total + $shipping->shipping_cost + (($tax->tax_percent/100)*$total);

        return $actualTotal;
    }

    public function getTotal()
    {
        $total = $this->actualTotal();

        $grandTotal = $total - $this->discount();

        return $grandTotal;
    }

    /**
     * @param string $rowId
     * @param int $quantity
     * @return CartItem
     */
    public function updateQuantityInCart(string $rowId, int $quantity)
    {
        
    }

    /**
     * Return the specific item in the cart
     *
     * @param string $rowId
     * @return \Gloudemans\Shoppingcart\CartItem
     */
    public function findItem(string $rowId)
    {
        return $this->model->get($rowId);
    }

    /**
     * Returns the tax
     *
     * @param int $decimals
     * @return float
     */
    public function getTax(int $decimals = 2)
    {
        
    }

    /**
     * @param Courier $courier
     * @return mixed
     */
    public function getShippingFee(Courier $courier):int
    {
        return number_format($courier->cost, 2);
    }

    /**
     * Clear the cart content
     */
    public function clearCart()
    {
        return $this->model->where('customer_id',Auth::id())->delete();
    }

    /**
     * @param Customer $customer
     * @param string $instance
     */
    public function saveCart(Customer $customer, $instance = 'default')
    {
       
    }

    /**
     * @param Customer $customer
     * @param string $instance
     * @return Cart
     */
    public function openCart(Customer $customer, $instance = 'default')
    {
        
    }

    /**
     * @return Collection
     */
    public function getCartItemsTransformed() : Collection
    {
        return $this->getCartItems()->map(function ($item) {
            $productRepo = new ProductRepository(new Product());
            $product = $productRepo->findProductById($item->id);
            $item->product = $product;
            $item->cover = $product->cover;
            $item->description = $product->description;
            return $item;
        });
    }

    public function discount(){
        $coupon = session('coupon');

        return (!!$coupon) ? ($coupon->discount/100)* $this->actualTotal() : 0;
    }
    
}



