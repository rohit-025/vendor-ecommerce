<?php

namespace App\Shop\StayInTouch\Repositories\Interfaces;

use Jsdecena\Baserepo\BaseRepositoryInterface;

interface StayInTouchRepositoryInterface extends BaseRepositoryInterface{
    
    public function createSubscriber($data);

    public function notify($productId);
}