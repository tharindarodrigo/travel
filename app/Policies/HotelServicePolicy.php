<?php

namespace App\Policies;

use App\Models\User;
use App\Models\HotelService;
use Illuminate\Auth\Access\HandlesAuthorization;

class HotelServicePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the hotelService can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the hotelService can view the model.
     */
    public function view(User $user, HotelService $model): bool
    {
        return true;
    }

    /**
     * Determine whether the hotelService can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the hotelService can update the model.
     */
    public function update(User $user, HotelService $model): bool
    {
        return true;
    }

    /**
     * Determine whether the hotelService can delete the model.
     */
    public function delete(User $user, HotelService $model): bool
    {
        return true;
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the hotelService can restore the model.
     */
    public function restore(User $user, HotelService $model): bool
    {
        return false;
    }

    /**
     * Determine whether the hotelService can permanently delete the model.
     */
    public function forceDelete(User $user, HotelService $model): bool
    {
        return false;
    }
}
