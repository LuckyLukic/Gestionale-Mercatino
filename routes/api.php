<?php



use App\Http\Controllers\Api\V1\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\ItemController;
use App\Http\Controllers\Api\V1\UserController;
use App\Http\Controllers\Api\V1\AddressController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/




Route::group(['prefix' => 'v1', 'namespace' => 'App\Http\Controllers\Api\V1'], function () {

    Route::middleware('auth:sanctum')->group(function () { //Sanctum provides an authentication system for SPA token-based APIs. The auth:sanctum middleware ensures that the route is accessible only to authenticated users.
        Route::apiResource('/users', UserController::class);
        Route::apiResource('/items', ItemController::class);
        Route::apiResource('/addresses', AddressController::class);
        Route::post('/logout', [UserController::class, 'logout']);
    });

    Route::post('/login', [UserController::class, 'login']);
    Route::post('/register', [UserController::class, 'register']);
    Route::post('/logout', [UserController::class, 'logout']);
});


