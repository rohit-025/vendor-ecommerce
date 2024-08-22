<?php

namespace App\Shop\StayInTouch;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StayInTouch extends Model
{
    use HasFactory;

    protected $fillable = ['coupon_code','email','name','birth_month','expiry'];
}
