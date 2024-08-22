<?php

namespace App\Shop\StayInTouch\Repositories;

use App\Shop\StayInTouch\Notify;
use App\Shop\StayInTouch\Repositories\Interfaces\StayInTouchRepositoryInterface;
use Jsdecena\Baserepo\BaseRepository;
use App\Shop\StayInTouch\StayInTouch;
use Illuminate\Support\Facades\Auth;

class StayInTouchRepository extends BaseRepository implements StayInTouchRepositoryInterface{

    public function __construct(StayInTouch $stay,Notify $notify)
    {
        $this->model = $stay;

        $this->notify = $notify;
    }
    
    public function createSubscriber($data)
    {
       return $this->create($data);
    }

    public function notify($productId)
    {
        return $this->notify->create(['customer_id' => Auth::id(),'product_id' => $productId]);
    }
}