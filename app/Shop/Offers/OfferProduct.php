<?php

namespace App\Shop\Offers;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfferProduct extends Model
{
    use HasFactory;

    public function offer(){
        return $this->belongsTo('App\Shop\Offers\Offer','offer_id');
    }
}
