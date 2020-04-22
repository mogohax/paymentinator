<?php

namespace Tests\Unit\EventHandlers;

use App\EventHandlers\Payments\SuccessfulPaymentHandler;
use App\Interfaces\OrderRepositoryContract;
use App\Models\OM\Order;
use Libs\PaymentHandling\Events\SuccessfulPaymentEvent;
use PHPUnit\Framework\TestCase;

class SuccessfulPaymentHandlerTest extends TestCase
{
    /**
     * @test
     */
    public function creates_a_new_order()
    {
        $dummyOrder = new Order([
            'status' => Order::STATUS_CONFIRMED,
        ]);

        $orderRepo = \Mockery::mock(OrderRepositoryContract::class);
        $orderRepo->shouldReceive()->findById(123)->andReturns($dummyOrder);
        $orderRepo->shouldReceive()->create([
            'status' => Order::STATUS_CONFIRMED
        ])->andReturns(new Order());

        $handler = new SuccessfulPaymentHandler($orderRepo);

        $handler->handle(new SuccessfulPaymentEvent(123));
    }
}
