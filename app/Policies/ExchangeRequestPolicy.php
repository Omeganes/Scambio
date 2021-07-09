<?php

namespace App\Policies;

use App\Models\ExchangeRequest;
use App\Models\Product;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Http\Request;

class ExchangeRequestPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param User $user
     * @return bool
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param User $user
     * @param  \App\Models\ExchangeRequest  $exchangeRequest
     * @return mixed
     */
    public function view(User $user, ExchangeRequest $exchangeRequest)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param  \App\Models\ExchangeRequest  $exchangeRequest
     * @return mixed
     */
    public function update(User $user, ExchangeRequest $exchangeRequest)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param  \App\Models\ExchangeRequest  $exchangeRequest
     * @return mixed
     */
    public function delete(User $user, ExchangeRequest $exchangeRequest)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param User $user
     * @param  \App\Models\ExchangeRequest  $exchangeRequest
     * @return mixed
     */
    public function restore(User $user, ExchangeRequest $exchangeRequest)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param User $user
     * @param  \App\Models\ExchangeRequest  $exchangeRequest
     * @return mixed
     */
    public function forceDelete(User $user, ExchangeRequest $exchangeRequest)
    {
        //
    }
}
