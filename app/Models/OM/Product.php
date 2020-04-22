<?php

namespace App\Models\OM;

class Product extends BaseModel
{
    /*********************************************************************************
     *                                  Relations
     *********************************************************************************/

    /**
     * Product has many orders
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
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

}
