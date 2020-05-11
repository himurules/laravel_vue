<?php

namespace App\Policies;

use App\Models\Categories;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryPolicy
{
    use HandlesAuthorization;

    /**
     * @param User $user
     * @param $ability
     * @return bool
     */
    public function before(User $user, $ability){
        if ($user->is_admin) {
            return true;
        }
    }

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User $user userObject
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can manage the model.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function manage(User $user)
    {
        return $user->is_admin;
        //return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Categories  $categories
     * @return mixed
     */
    public function update(User $user, Categories $categories)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Categories  $categories
     * @return mixed
     */
    public function delete(User $user)
    {
        return $user->is_admin;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Categories  $categories
     * @return mixed
     */
    public function restore(User $user, Categories $categories)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Categories  $categories
     * @return mixed
     */
    public function forceDelete(User $user, Categories $categories)
    {
        //
    }
}
