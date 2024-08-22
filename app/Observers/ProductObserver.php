<?php

namespace App\Observers;

use App\Mail\StockUpdated;
use App\Shop\Products\Product;
use App\Shop\StayInTouch\Notify;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ProductObserver
{
    /**
     * Handle the Product "created" event.
     *
     * @param  \App\Product  $product
     * @return void
     */
    public function created(Product $product)
    {
        //
    }

    /**
     * Handle the Product "updated" event.
     *
     * @param  \App\Product  $product
     * @return void
     */
    public function updated(Product $product)
    {
        if($product->getOriginal('quantiy') == 0 && $product->quantity > 0){
           
           $customers = Notify::where('product_id',$product->id)->get();
           
         foreach ($customers as $recipient) {
            Mail::to($recipient->customer->email)->send(new StockUpdated($product));
         }

         Notify::where('product_id',$product->id)->delete();

        }

    }

    /**
     * Handle the Product "deleted" event.
     *
     * @param  \App\Product  $product
     * @return void
     */
    public function deleted(Product $product)
    {
        //
    }

    /**
     * Handle the Product "restored" event.
     *
     * @param  \App\Product  $product
     * @return void
     */
    public function restored(Product $product)
    {
        //
    }

    /**
     * Handle the Product "force deleted" event.
     *
     * @param  \App\Product  $product
     * @return void
     */
    public function forceDeleted(Product $product)
    {
        //
    }
}
