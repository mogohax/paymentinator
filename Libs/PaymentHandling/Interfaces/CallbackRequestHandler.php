<?php


namespace Libs\PaymentHandling\Interfaces;

/**
 * This provides a basic interface for payment provider callback handling
 *
 * Interface CallbackRequestHandler
 * @package Libs\PaymentHandling\Interfaces
 */
interface CallbackRequestHandler
{
    /**
     * Handles an incoming payment callback
     *
     * @param PaymentRequest $request
     * @return void
     */
    public function handle(PaymentRequest $request): void;
}
