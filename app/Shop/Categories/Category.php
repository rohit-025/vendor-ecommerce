<?php

namespace App\Shop\Categories;

use App\Shop\Products\Product;
use Kalnoy\Nestedset\NodeTrait;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use NodeTrait;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'description',
        'cover',
        'status',
        'parent_id',
        'featured'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function childCategory(){
        return $this->hasMany('App\Shop\Categories\Category','parent_id');
    }

    public function categoryProd(){
        return $this->hasMany('App\Shop\Categories\CategoryProduct','category_id');
    }
}
