<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public function view(User $user)
    {
        // return $user->roles->name === 'Admin';
        // foreach ($user->roles as $role ) {
        //     if('Admin' == $role->name){
        //         return true;
        //     }
        //     return false;
        // }
        // return $user->name ===  $post->user->name;
    }
}
