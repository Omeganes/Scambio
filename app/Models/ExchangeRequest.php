<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExchangeRequest extends Model
{
    use HasFactory;

    protected array $guarded = [];

    ####################################### Relationships #######################################

    /**
     * Offered product for exchange
     */
    public function offeredProduct()
    {
        $this->hasOne(Product::class, 'offered_product_id');
    }

    /**
     * Requested product for exchange
     */
    public function requestedProduct()
    {
        $this->hasOne(Product::class, 'requested_product_id');
    }



}
