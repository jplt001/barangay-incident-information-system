<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ReportIncidentController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(AuthController::class)->prefix("auth")->group(function(){
    Route::post("/login", "login");
    Route::post("/register", "register");
    Route::post("/barangay-verification", "BarangayVerification");
});

Route::middleware("auth:sanctum")->group(function() {
    Route::controller(AuthController::class)->prefix("/auth")->group(function() {
        Route::get("/me", "me");
        Route::post("logout", "logout");
    });
});

// Route::get("/test", [ReportIncidentController::class, "test"]);