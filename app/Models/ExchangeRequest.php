<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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
    public function offeringUser(): HasOneThrough
    {
        return $this->hasOneThrough(
            User::class,
            Product::class,
            'id', 'id',
            'offered_product_id',
            'user_id'
        );
    }

    /**
     * The user who is offered the exchange
     */
    public function offeredUser(): HasOneThrough
    {
        return $this->hasOneThrough(
            User::class,
            Product::class,
            'id', 'id',
            'requested_product_id',
            'user_id'
        );
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

    /**
     * Accepts the exchange deal
     */
    public function acceptDeal()
    {
        $difference = $this->differenceInPrice();

        $paidUser = $difference > 0 ? auth()->user() : $this->offeringUser;
        $payingUser = $difference < 0 ? auth()->user() : $this->offeringUser;

        if($difference != 0 ) {
            if(abs($difference) > $payingUser->credit) {
                Session::flash('warning',"$payingUser->name doesn't have enough money");
                return;
            }

            $payingUser->credit -= abs($difference);

            if(abs($difference) > 100) {
                $paidUser->credit += abs($difference);
            }
            else {
                $voucher = new Voucher([
                    'value' => abs($difference)
                ]);
                $paidUser->vouchers()->save($voucher);
            }
        }

        $payingUser->exchanges_count +=1;
        $paidUser->exchanges_count +=1;

        $payingUser->save();
        $paidUser->save();

        $this->offeredProduct->delete();
        $this->requestedProduct->delete();
        $this->delete();

        Session::flash('success',"Exchange done successfully!");
    }


    public function rejectDeal()
    {
        $this->delete();

        Session::flash('info',"Exchange rejected successfully!");
    }
    /**
     * calculate the difference between the two items
     *
     * @return mixed
     */
    private function differenceInPrice(): mixed
    {
        return $this->requestedProduct->price - $this->offeredProduct->price;
    }
}
