<?php

namespace App\EventHandlers\Payments;

use App\Interfaces\OrderRepositoryContract;
use App\Models\OM\Order;
use Libs\PaymentHandling\Events\SuccessfulPaymentEvent;

class SuccessfulPaymentHandler
{
    /**
     * @var OrderRepositoryContract
     */
    private $orderRepository;

    /**
     * SuccessfulPaymentHandler constructor.
     * @param OrderRepositoryContract $orderRepository
     */
    public function __construct(OrderRepositoryContract $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    /**
     * Handle the event
     *
     * @param SuccessfulPaymentEvent $event
     */
    public function handle(SuccessfulPaymentEvent $event)
    {
        if ($order = $this->orderRepository->findById($event->getOrderId())) {
            // not sure how to handle this event, to be honest
            // should i check current status first?
            $orderCopy = $order->replicate();
            $orderCopy->status = Order::STATUS_CONFIRMED;
            $this->orderRepository->create($orderCopy->toArray());
        } else {
            // create a new order?
            // throw exception?
            // do nothing?
            // ¯\_(ツ)_/¯
        }
    }
}
