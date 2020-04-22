<?php

namespace Libs\PaymentHandling\Events;

use Libs\PaymentHandling\Interfaces\PaymentEvent;

class CancelledPaymentEvent implements PaymentEvent
{
    /**
     * @var string
     */
    private $orderId;

    /**
     * CancelledPaymentEvent constructor.
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
