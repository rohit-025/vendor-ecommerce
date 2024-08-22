<?php

namespace App\Shop\StayInTouch;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notify extends Model
{
    use HasFactory;

    protected $fillable = ['customer_id','product_id'];

    public function customer(){
        return $this->belongsTo('App\Shop\Customers\Customer');
    }

    public function product(){
        return $this->belongsTo('App\Shop\Products\Product');
    }
}
