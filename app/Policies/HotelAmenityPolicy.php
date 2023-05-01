<?php

namespace App\Policies;

use App\Models\HotelAmenity;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class HotelAmenityPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the hotelAmenity can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the hotelAmenity can view the model.
     */
    public function view(User $user, HotelAmenity $model): bool
    {
        return true;
    }

    /**
     * Determine whether the hotelAmenity can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the hotelAmenity can update the model.
     */
    public function update(User $user, HotelAmenity $model): bool
    {
        return true;
    }

    /**
     * Determine whether the hotelAmenity can delete the model.
     */
    public function delete(User $user, HotelAmenity $model): bool
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
     * Determine whether the hotelAmenity can restore the model.
     */
    public function restore(User $user, HotelAmenity $model): bool
    {
        return false;
    }

    /**
     * Determine whether the hotelAmenity can permanently delete the model.
     */
    public function forceDelete(User $user, HotelAmenity $model): bool
    {
        return false;
    }
}
