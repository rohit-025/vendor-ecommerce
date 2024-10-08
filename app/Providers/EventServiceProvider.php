<?php

namespace App\Providers;

use App\Observers\ProductObserver;
use App\Shop\Products\Product;
use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\OrderCreateEvent' => [
            'App\Listeners\OrderCreateEventListener',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        Product::observe(ProductObserver::class);
    }
}
