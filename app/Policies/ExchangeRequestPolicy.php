<?php

namespace App\Policies;

use App\Models\ExchangeRequest;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

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
     * @param ExchangeRequest $exchangeRequest
     * @return bool
     */
    public function view(User $user, ExchangeRequest $exchangeRequest): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param User $user
     * @return bool
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param ExchangeRequest $exchangeRequest
     * @return Response
     */
    public function update(User $user, ExchangeRequest $exchangeRequest): Response
    {
        return $exchangeRequest->offeredUser->is($user)
            ? Response::allow()
            : Response::deny('This request is not to you!');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param ExchangeRequest $exchangeRequest
     * @return bool
     */
    public function delete(User $user, ExchangeRequest $exchangeRequest): bool
    {
        return true;
    }
}
