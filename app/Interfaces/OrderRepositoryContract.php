<?php

namespace App\Interfaces;

use App\Models\OM\Order;

interface OrderRepositoryContract
{
    /**
     * Find order by id
     *
     * @param string $id
     * @return Order|null
     */
    public function findById(string $id): ?Order;

    /**
     * Create order with given attributes
     *
     * @param array $attributes
     * @return Order
     */
    public function create(array $attributes = []): Order;
}
