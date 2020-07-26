<?php

namespace App\Policies;

use App\Testimony;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class TestimonyPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any testimonies.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true ;
    }

    /**
     * Determine whether the user can view the testimony.
     *
     * @param  \App\User  $user
     * @param  \App\Testimony  $testimony
     * @return mixed
     */
    public function view(User $user, Testimony $testimony)
    {
        return true ;
    }

    /**
     * Determine whether the user can create testimonies.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true ;
    }

    /**
     * Determine whether the user can update the testimony.
     *
     * @param  \App\User  $user
     * @param  \App\Testimony  $testimony
     * @return mixed
     */
    public function update(User $user, Testimony $testimony)
    {
        if ( $user->role =='super'  ||  $user->id == $testimony->user_id ) {
            return Response::allow();
        } else {
           return Response::deny("You are not allowed to update  other member testimony") ;
        }

    }

    /**
     * Determine whether the user can delete the testimony.
     *
     * @param  \App\User  $user
     * @param  \App\Testimony  $testimony
     * @return mixed
     */
    public function delete(User $user, Testimony $testimony)
    {
        if ( $user->role =='super'  ||  $user->id == $testimony->user_id ) {
            return Response::allow();
        } else {
           return Response::deny("You are not allowed to delete  other member testimony") ;
        }
    }

    /**
     * Determine whether the user can restore the testimony.
     *
     * @param  \App\User  $user
     * @param  \App\Testimony  $testimony
     * @return mixed
     */
    public function restore(User $user, Testimony $testimony)
    {
        if ( $user->role =='super'  ) {
            return Response::allow();
        } else {
           return Response::deny("You do not have previlagies to restore testimony") ;
        }
    }

    /**
     * Determine whether the user can permanently delete the testimony.
     *
     * @param  \App\User  $user
     * @param  \App\Testimony  $testimony
     * @return mixed
     */
    public function forceDelete(User $user, Testimony $testimony)
    {
        if ( $user->role =='super'  ) {
            return Response::allow();
        } else {
           return Response::deny("You do not have previlagies to force delete testimony") ;
        }

    }
}
