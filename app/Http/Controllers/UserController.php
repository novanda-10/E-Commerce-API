<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{





    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //dd(User::all());

        return UserResource::collection(User::all());
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
       // dd($request->all());

       $userData = $request->input('data.attributes');

       return User::create($userData);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return new UserResource($user);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, string $id)
    {
        $user = User::findOrfail($id);

        $userData = $request->input('data.attributes');

        $user->update($userData);

        return new UserResource($user);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrfail($id);

        $user->delete();

        return response()->json([
            'massage' => 'user deleted'
        ],200);
    }
}
