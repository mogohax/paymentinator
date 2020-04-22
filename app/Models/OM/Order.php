<?php

namespace App\Models\OM;

use Illuminate\Database\Eloquent\Builder;

class Order extends BaseModel
{
    const STATUS_PENDING = 'pending';
    const STATUS_CANCELLED = 'cancelled';
    const STATUS_CONFIRMED = 'confirmed';

    protected $fillable = [
        'status'
    ];

    /*********************************************************************************
     *                                  Relations
     *********************************************************************************/

    /**
     * Order belongs to one product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Order belongs to one subscription
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function subscription()
    {
        return $this->belongsTo(Subscription::class);
    }

    /*********************************************************************************
     *                                  Scopes
     *********************************************************************************/

    /**
     * Pending Orders scope
     *
     * @param Builder $query
     * @return Builder
     */
    public function scopePending(Builder $query)
    {
        return $this->scopeByStatus($query, static::STATUS_PENDING);
    }

    /**
     * Confirmed Orders scope
     *
     * @param Builder $query
     * @return Builder
     */
    public function scopeConfirmed(Builder $query)
    {
        return $this->scopeByStatus($query, static::STATUS_CONFIRMED);
    }

    /**
     * Cancelled Orders scope
     *
     * @param Builder $query
     * @return Builder
     */
    public function scopeCancelled(Builder $query)
    {
        return $this->scopeByStatus($query, static::STATUS_CANCELLED);
    }


    /**
     * By status scope
     *
     * @param Builder $query
     * @param string $status
     * @return Builder
     */
    public function scopeByStatus(Builder $query, string $status)
    {
        return $query->where('status', $status);
    }

    /*********************************************************************************
     *                                  Mutators
     *********************************************************************************/

    /*********************************************************************************
     *                                  Other methods
     *********************************************************************************/

    /**
     * List of available statuses with text labels
     *
     * @return array
     */
    public static function getAvailableStatuses(): array
    {
        return [
            static::STATUS_PENDING => 'Order pending',
            static::STATUS_CONFIRMED => 'Order confirmed',
            static::STATUS_CANCELLED => 'Order cancelled',
        ];
    }

}
