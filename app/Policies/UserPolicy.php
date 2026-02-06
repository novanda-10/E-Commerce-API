<?php

namespace App\Policies;

use App\Models\User;
use App\Permissions\Abilities;

class UserPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }


    public function store(User $user) {
    
        return $user->tokenCan(Abilities::CreateUser);
    }


    public function update(User $user) {
        
        return $user->tokenCan(Abilities::UpdateUser);
    }


    public function delete(User $user) {
        
        return $user->tokenCan(Abilities::DeleteUser);
    }
}
