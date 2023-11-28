<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

use App\Http\Requests\UserRequests;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResorurce;

class UserController extends Controller
{
    public function index()
    {
        return UserResorurce::collection(User::all());

    }

    public function show(User $user)
    {
        return UserResorurce::make($user);
    }

    public function store(UserRequests $request)
    {

        $user = User::create($request->validated());

        return UserResorurce::make($user);

    }

    public function update(UpdateUserRequest $request, User $user)
    {

        $user->update($request->validated());

        return UserResorurce::make($user);

    }

    public function destroy(User $user)
    {

        $user->delete();

        return response()->noContent();

    }

}
