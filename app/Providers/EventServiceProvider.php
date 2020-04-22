<?php

namespace App\Providers;

use App\EventHandlers\Payments\SuccessfulPaymentHandler;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Libs\PaymentHandling\Events\SuccessfulPaymentEvent;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        SuccessfulPaymentEvent::class => [
            SuccessfulPaymentHandler::class
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
