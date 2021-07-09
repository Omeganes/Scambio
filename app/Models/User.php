<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Validation\Rule;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'exchanges_count',
        'account_number'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected array $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected array $casts = [
        'email_verified_at' => 'datetime',
    ];

    ####################################### Relationships #######################################

    /**
     * Relation with product
     *
     * @return HasMany
     */
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }


    public static function validate($request): array
    {
        return $request->validate([
            'name' => 'required|string|min:3|max:255',
            'email' => [
                'required','string', 'email', 'max:255',
                Rule::unique('users')->ignore(auth()->user()->id),
            ],
//            'password' => ['nullable', 'confirmed', Rules\Password::defaults()],
            'phone' => 'nullable|digits:11',
            'account_number' => 'nullable|digits:16'
        ]);
    }



}
