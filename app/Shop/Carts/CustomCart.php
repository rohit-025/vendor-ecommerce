<?php

namespace App\Shop\Carts;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomCart extends Model
{
    use HasFactory;

    protected $fillable = ['product_id','customer_id','quantity'];

    public function product(){
        return $this->belongsTo('App\Shop\Products\Product');
    }
}
