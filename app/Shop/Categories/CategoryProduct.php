<?php

namespace App\Shop\Categories;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Shop\Products\Product;

class CategoryProduct extends Model
{
    protected $table = 'category_product';
    
    use HasFactory;

    public function products()
    {
        return $this->belongsTo('App\Shop\Products\Product','product_id');
    }
}
