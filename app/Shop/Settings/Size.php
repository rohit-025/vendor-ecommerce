<?php

namespace App\Shop\Settings;;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;

    public $fillable = ['sizes'];
}
