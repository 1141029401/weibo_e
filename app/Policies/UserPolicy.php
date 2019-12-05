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

    /**
     * [update description]
     * @param  User   $currentUser [当前登录用户实例]
     * @param  User   $user        [即将进行授权用户的实例]
     * @return [type]              [description]
     */
    public function update(User $currentUser, User $user)
    {
        return $currentUser->id === $user->id;
    }


    public function destroy(User $currentUser, User $user)
    {
        return $currentUser->is_admin && $currentUser->id !== $user->id;
    }

    //自己不能关注自己
    public function follow(User $currentUser, User $user)
    {
        return $currentUser->id !== $user->id;
    }
}
