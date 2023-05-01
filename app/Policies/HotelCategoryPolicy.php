<?php

namespace App\Policies;

use App\Models\HotelCategory;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class HotelCategoryPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the hotelCategory can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the hotelCategory can view the model.
     */
    public function view(User $user, HotelCategory $model): bool
    {
        return true;
    }

    /**
     * Determine whether the hotelCategory can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the hotelCategory can update the model.
     */
    public function update(User $user, HotelCategory $model): bool
    {
        return true;
    }

    /**
     * Determine whether the hotelCategory can delete the model.
     */
    public function delete(User $user, HotelCategory $model): bool
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
     * Determine whether the hotelCategory can restore the model.
     */
    public function restore(User $user, HotelCategory $model): bool
    {
        return false;
    }

    /**
     * Determine whether the hotelCategory can permanently delete the model.
     */
    public function forceDelete(User $user, HotelCategory $model): bool
    {
        return false;
    }
}
