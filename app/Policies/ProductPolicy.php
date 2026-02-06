<?php

namespace App\Policies;

use App\Models\Product;
use App\Models\User;
use App\Permissions\Abilities;

class ProductPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function store(User $user) {
    
        return $user->tokenCan(Abilities::CreateProduct)||$user->tokenCan(Abilities::CreateOwnProduct);
    }


    public function update(User $user, Product $product){

    return $user->tokenCan(Abilities::UpdateProduct)
        || (
            $user->tokenCan(Abilities::UpdateOwnProduct)
            && $user->id === $product->user_id
        );
    }


    public function delete(User $user, Product $product){
    return $user->tokenCan(Abilities::DeleteProduct)
        || (
            $user->tokenCan(Abilities::DeleteOwnProduct)
            && $user->id === $product->user_id
        );
}


}
