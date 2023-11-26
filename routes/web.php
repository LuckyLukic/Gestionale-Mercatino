<?php

use App\Livewire\Data;
use App\Livewire\Homepage;
use App\Livewire\CreateUser;
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

Route::get("/", Homepage::class)->name("home");
Route::get("/create-user", CreateUser::class)->name("create-user");
Route::get("/data", Data::class)->name("create-user");
