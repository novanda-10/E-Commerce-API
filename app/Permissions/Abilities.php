<?php

namespace App\Permissions;

use App\Models\User;

final class Abilities{
    public const CreateProduct = 'product:create';
    public const UpdateProduct = 'product:update';
    public const DeleteProduct = 'product:delete';


    public const CreateOwnProduct = 'product:Own:create';
    public const UpdateOwnProduct = 'product:Own:update';
    public const DeleteOwnProduct = 'product:Own:delete';

    public const CreateUser = 'user:create';
    public const UpdateUser = 'user:update';
    public const DeleteUser = 'user:delete';



    public static function getAbilities(User $user){



        if ($user->role === "m"){
            return [
                self::CreateProduct,
                self::UpdateProduct,
                self::DeleteProduct,
                
                self::CreateUser,
                self::UpdateUser,
                self::DeleteUser,
                
            ];
        }else if ($user->role === "p"){
            return [
                self::CreateOwnProduct,
                self::UpdateOwnProduct,
                self::DeleteOwnProduct,

            ];
        }else if ($user->role === "c"){
            return [

                // customer does not have permisson yet

            ];
        }
    }

}