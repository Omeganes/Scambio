<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ExchangeRequest extends Model
{
    use HasFactory;

    protected $guarded = [];

    ####################################### Relationships #######################################

    /**
     * The user who requested the exchange
     * TODO: Review this
     */
    public function requestingUser()
    {
        $this->hasOneThrough(User::class, Product::class, 'offered_product_id', 'user_id');
    }

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
