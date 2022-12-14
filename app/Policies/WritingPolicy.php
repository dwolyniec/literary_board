<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Writing;
use Illuminate\Auth\Access\HandlesAuthorization;

class WritingPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Writing  $writing
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Writing $writing)
    {   
        //return false;
        return (
            $writing->user_id == $user->id
            ||
            !$writing->private
            || 
            in_array($user->id, $writing->readers()->pluck('users.id')->all())  
        );
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Writing  $writing
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Writing $writing)
    {
        return $user->id == $writing->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Writing  $writing
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Writing $writing)
    {
        return $user->id == $writing->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Writing  $writing
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Writing $writing)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Writing  $writing
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Writing $writing)
    {
        //
    }
}
