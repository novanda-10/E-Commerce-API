<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;


class UserController extends Controller
{

    use AuthorizesRequests;




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

       $this->authorize('store', User::class );//userPolicty.php

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

        $this->authorize('update', User::class );//userPolicty.php

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

        $this->authorize('delete', User::class );//userPolicty.php

        $user->delete();

        return response()->json([
            'massage' => 'user deleted'
        ],200);
    }
}
