<?php

use App\Livewire\Data;
use App\Livewire\User;
use App\Livewire\Login;
use App\Livewire\Homepage;
use App\Livewire\Register;
use App\Livewire\CreateUser;
use App\Livewire\UpdateUser;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::middleware('auth')->group(function () {
    Route::get("/", Homepage::class)->name("home");
    Route::get("/create-user", CreateUser::class);
    Route::get("/data", Data::class);
    Route::get("/user/{userId}", User::class)->name('user.profile');
    Route::get("/user/update/{userId}", UpdateUser::class)->name('user.update');
});

Route::get("/login", Login::class)->name('login');
Route::get("/register", Register::class);

