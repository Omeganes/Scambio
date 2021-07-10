<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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
    public function offeredProduct(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'offered_product_id', 'id');
    }

    /**
     * Requested product for exchange
     */
    public function requestedProduct(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'requested_product_id', 'id');
    }

    ####################################### Methods #######################################

    public static function validate(Request $request): array
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
