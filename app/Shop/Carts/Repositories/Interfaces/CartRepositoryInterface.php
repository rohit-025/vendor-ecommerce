<?php

namespace App\Shop\Carts\Repositories\Interfaces;

use Jsdecena\Baserepo\BaseRepositoryInterface;
use App\Shop\Couriers\Courier;
use App\Shop\Customers\Customer;
use App\Shop\Products\Product;
use Gloudemans\Shoppingcart\CartItem;
use Illuminate\Support\Collection;

interface CartRepositoryInterface extends BaseRepositoryInterface
{
    // public function addToCart(Product $product, int $int, $options = []); //Package Based

    public function addToCart($productId,$quantity);

    public function getCartItems();

    public function removeToCart(string $rowId);

    public function countItems() : int;

    public function getSubTotal();

    public function getTotal();

    public function updateQuantityInCart(string $rowId, int $quantity);

    public function findItem(string $rowId);

    public function getTax(int $decimals = 2);

    public function getShippingFee(Courier $courier);

    public function clearCart();

    public function saveCart(Customer $customer, $instance = 'default');

    public function openCart(Customer $customer, $instance = 'default');

    public function getCartItemsTransformed() : Collection;

    public function checkStocks();

    public function discount();

}
