<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

//use App\events

class Voucher extends Model
{
    use HasFactory;

    protected $guarded = [];

    ####################################### Relationships #######################################

    /**
     * relationship with user
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * validate a voucher instance
     *
     * @param Request $request
     * @return array
     */
    public static function validate(Request $request): array
    {
        return $request->validate([
           'value' => 'required|numeric|min:1'
        ]);
    }


    protected static function booted()
    {
        static::creating(function ($voucher) {
            $voucher->code = Str::random(14);
            $sponsors = ['Fathalla', 'Carrefour', 'Ocazion', 'Zahran', 'Metro'];
            $voucher->sponsor = $sponsors[rand(0,4)];
        });
    }

}
