<?php

use App\Livewire\Data;
use App\Livewire\Login;
use App\Livewire\Customer;
use App\Livewire\Homepage;
use App\Livewire\Register;
use App\Livewire\CreateItem;
use App\Livewire\CreateUser;
use App\Livewire\UpdateItem;
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
    Route::get("/user/{userId}", Customer::class)->name('user.profile');
    Route::get("/user/{userId}/update/", UpdateUser::class)->name('user.update');
    Route::get("/user/{userId}/create-item/", CreateItem::class)->name('user.createItem');
    Route::get("/user/{userId}/update-item/{itemId}", UpdateItem::class)->name('user.updateItem');
    Route::get("/register", Register::class)->middleware('can:create-admin');
});

Route::get("/login", Login::class)->name('login'); //login to be specified because Laravel assumes that login page is named login to automatically redirect users by RedirectIfAuthenticated



