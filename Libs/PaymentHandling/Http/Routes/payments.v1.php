<?php

use Illuminate\Support\Facades\Route;

Route::prefix('/api/payments/v1')->middleware('api')->namespace('Libs\\PaymentHandling\\Http\\Controllers')->group(function () {

    /**
     * Apple route group
     */
    Route::prefix('/apple')->group(function () {
        Route::post('/callback', ['uses' => 'AppleController@callback', 'as' => 'api.v1.payments.apple.callback']);
    });
});
