<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Http\Request;

class ExchangeRequest extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = ['offeredProduct', 'requestedProduct'];

    ####################################### Relationships #######################################

    /**
     * The user who requested the exchange
     */
    public function requestingUser()
    {
        $this->hasOneThrough(User::class, Product::class, 'offered_product_id', 'user_id');
    }

    /**
     * Offered product for exchange
     */
    public function offeredProduct(): HasOne
    {
        return $this->hasOne(Product::class, 'id', 'offered_product_id');
    }

    /**
     * Requested product for exchange
     */
    public function requestedProduct(): HasOne
    {
        return $this->hasOne(Product::class, 'id', 'requested_product_id');
    }

    ####################################### Methods #######################################

    public static function validate(Request $request)
    {
        $validated = $request->validate([
            'offered_product_id' => 'required|exists:products,id',
            'requested_product_id' => 'required|exists:products,id'
        ]);

        if(Product::find($request['offered_product_id'])->user->id !== auth()->user()->id) {
            abort(403);
        }

        return $validated;
    }
}
