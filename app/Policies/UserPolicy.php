<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    public function admin(User $user, ?User $model = null): bool
    {
        return $user->admin;
    }

    public function delete_admin(User $user, User $model): bool
    {
        if($user->id == $model->id){
            return false;
        }else{
            return true;
        }
    }
}
