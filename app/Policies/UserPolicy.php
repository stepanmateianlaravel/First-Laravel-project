<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    public function admin(User $user, ?User $model = null): bool
    {
        return $user->admin;
    }


}
