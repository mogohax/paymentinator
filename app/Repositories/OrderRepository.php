<?php

namespace App\Repositories;

use App\Interfaces\OrderRepositoryContract;
use App\Models\OM\Order;

class OrderRepository implements OrderRepositoryContract
{
    /**
     * @inheritDoc
     */
    public function findById(string $id): ?Order
    {
        return Order::find($id);
    }

    /**
     * @inheritDoc
     */
    public function create(array $attributes = []): Order
    {
        return Order::create($attributes);
    }
}
