<?php

namespace App\Policies;

use App\Models\Rooms;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RoomsPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the rooms can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the rooms can view the model.
     */
    public function view(User $user, Rooms $model): bool
    {
        return true;
    }

    /**
     * Determine whether the rooms can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the rooms can update the model.
     */
    public function update(User $user, Rooms $model): bool
    {
        return true;
    }

    /**
     * Determine whether the rooms can delete the model.
     */
    public function delete(User $user, Rooms $model): bool
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
     * Determine whether the rooms can restore the model.
     */
    public function restore(User $user, Rooms $model): bool
    {
        return false;
    }

    /**
     * Determine whether the rooms can permanently delete the model.
     */
    public function forceDelete(User $user, Rooms $model): bool
    {
        return false;
    }
}
