<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\User;
use App\Enums\RoleEnum;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Http\Resources\V1\UserResource;
use App\Http\Requests\V1\StoreUserRequests;
use App\Http\Requests\V1\UpdateUserRequests;





class UserController extends Controller
{
    public function index()
    {
        return UserResource::collection(User::paginate());
        // return new UserCollection(User::all());   both ways are valid (we can use paginate as well)
    }

    public function show(User $user)
    {
        return new UserResource($user);
    }

    public function store(StoreUserRequests $request)
    {

        $user = User::create($request->validated());

        return new UserResource($user);

    }

    public function update(UpdateUserRequests $request, User $user)
    {

        $user->update($request->validated());

        return new UserResource($user);

    }

    public function destroy(User $user)
    {

        $user->delete();

        return response()->noContent();

    }


    public function register(Request $request)
    {

        $validData = $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);

        $newUser = User::create([
            'name' => $validData['name'],
            'surname' => $validData['surname'],
            'email' => $validData['email'],
            'password' => bcrypt($validData['password']),
            'role' => RoleEnum::ADMIN,
        ]);
        return response()->Json($newUser);
    }

    public function login(Request $request)
    {
        $login = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($login)) {

            $user = Auth::user();

            if ($user->role === 'admin') {

                $token = $user->createToken('laragestoken')->plainTextToken;
                return response()->json(["token" => $token]);

            } else {

                return response()->json(["message" => "Access denied: You are not an admin"], 403);

            }
        }

        return response()->json(["message" => "login failed"]);

    }


    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Successfully logged out']);
    }

}
