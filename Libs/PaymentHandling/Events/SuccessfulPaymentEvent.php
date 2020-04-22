<?php

namespace Libs\PaymentHandling\Events;

use Libs\PaymentHandling\Interfaces\PaymentEvent;

class SuccessfulPaymentEvent implements PaymentEvent
{
    /**
     * @var string
     */
    private $orderId;

    /**
     * SuccessfulPaymentEvent constructor.
     * @param string $orderId
     */
    public function __construct(string $orderId)
    {
        $this->orderId = $orderId;
    }

    /**
     * @inheritDoc
     */
    public function getOrderId(): string
    {
        return $this->orderId;
    }
}
