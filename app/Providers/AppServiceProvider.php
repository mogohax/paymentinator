<?php

namespace App\Providers;

use App\Interfaces\OrderRepositoryContract;
use App\Repositories\OrderRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Contract bindings
     *
     * @var array
     */
    public $bindings = [
        OrderRepositoryContract::class => OrderRepository::class,
    ];

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
