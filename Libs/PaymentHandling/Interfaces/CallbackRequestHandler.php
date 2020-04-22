<?php


namespace Libs\PaymentHandling\Interfaces;

use Libs\PaymentHandling\Exceptions\CallbackHandlerException;

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
     * and either produces a PaymentEvent or throws an exception
     *
     * @param PaymentRequest $request
     * @return PaymentEvent
     * @throws CallbackHandlerException
     */
    public function handle(PaymentRequest $request): PaymentEvent;
}
