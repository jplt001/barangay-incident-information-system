<?php

use App\Http\Controllers\Api\Admin\Auth\AuthController as AdminAuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\IncidentAlertController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::prefix("/auth")->group(function(){
    Route::controller(AuthController::class)->group(function(){
        Route::post("login", 'login');
        Route::post("register", 'register');
    });
});
Route::middleware("auth:sanctum")->group(function(){
    Route::prefix("/auth")->group(function(){
        Route::controller(AuthController::class)->group(function () {
            Route::post("logout", "logout");
            Route::post("refresh", "refresh");
            Route::get("me", "me");
        });
    });

    Route::prefix("/incidents")->group(function(){
        Route::resource("/incident-alerts", IncidentAlertController::class);
    });
});

// Route::prefix("/admin")->group(function(){
//     Route::prefix("/auth")->group(function(){
//         Route::controller(AdminAuthController::class)->group(function() {
//             Route::post("login", "login");
//             // Route::post("register", "register");
//         });
//     });
// });
