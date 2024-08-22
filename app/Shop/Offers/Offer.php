<?php

namespace App\Shop\Offers;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    protected $fillable = ['offer_name','discount_percent','start_date','end_date'];
}
