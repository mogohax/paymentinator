<?php

namespace App\Models\OM;

class Subscription extends BaseModel
{
    const STATUS_ACTIVE = 'active';
    const STATUS_CANCELLED = 'cancelled';
    const STATUS_REFUNDED = 'refunded';

    /*********************************************************************************
     *                                  Relations
     *********************************************************************************/

    /**
     * Subscription has many Orders
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    /**
     * Subscription belongs to a Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /*********************************************************************************
     *                                  Scopes
     *********************************************************************************/

    /*********************************************************************************
     *                                  Mutators
     *********************************************************************************/

    /*********************************************************************************
     *                                  Other methods
     *********************************************************************************/

    /**
     * Get available statuses with text labels
     *
     * @return array
     */
    public static function getAvailableStatuses(): array
    {
        return [
            static::STATUS_ACTIVE => 'Subscription active',
            static::STATUS_CANCELLED => 'Subscription cancelled',
            static::STATUS_REFUNDED => 'Subscription refunded'
        ];
    }

}
