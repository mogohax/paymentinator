<?php


namespace Libs\PaymentHandling\Interfaces;

/**
 * Interface PaymentEvent
 * @package Libs\PaymentHandling\Interfaces
 */
interface PaymentEvent
{
    /**
     * Returns the id of the order that this event belongs to
     *
     * @return string
     */
    public function getOrderId(): string;
}
