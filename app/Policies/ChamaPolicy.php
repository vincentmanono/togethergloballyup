<?php

namespace App\Policies;

use App\Chama;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class ChamaPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true ;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function view(User $user, Chama $chama)
    {
        return true ;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->id > 0;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function update(User $user, Chama $chama)
    {
        if ( $user->role =='super'  || $user->role =='admin' && $user->id == $chama->user_id ) {
            return Response::allow();
        } else {
           return Response::deny("You are not allowed to update this chama") ;
        }

    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function delete(User $user, Chama $chama)
    {
        if ( $user->role =='super'  || $user->role =='admin' && $user->id == $chama->user_id ) {
            return Response::allow();
        } else {
            return Response::deny("You are not allowed to delete this chama") ;
        }
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function restore(User $user, Chama $chama)
    {
        if ( $user->role =='super'  || $user->role =='admin' && $user->id === $chama->user_id ) {
            return Response::allow();
        } else {
            return Response::deny("You are not allowed to restore deleted this chama") ;
        }
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function forceDelete(User $user, Chama $chama)
    {
        if ( $user->role =='super'  || $user->role =='admin' && $user->id === $chama->user_id ) {
            return true ;
        } else {
            return Response::deny("You are not allowed to force delete deleted this chama") ;
        }
    }
}
