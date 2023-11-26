<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\UserResorurce;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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


}
