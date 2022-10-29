<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResidentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::resource("/", WelcomeController::class);

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(["auth", "verified"])->group(function() {
    Route::controller(DashboardController::class)->group(function() {
        Route::get("/dashboard", "index")->name("dashboard");
    });

    Route::prefix("profile")->controller(ProfileController::class)->group(function(){
        Route::get("/", "index")->name("profile");
    });

    Route::prefix("users")->controller(UserController::class)->group(function() {
        Route::get("/", "index")->name("users");
        Route::get("/create", "create")->name("users.create");
        Route::post("/", "store")->name("users.postcreate");
        Route::get("/{id}/edit", "edit")->name("users.edit");
        Route::put("/{id}", "update")->name("users.putupdate");
        Route::get("/{id}", "show")->name("users.view");
    });

    Route::prefix("residents")->controller(ResidentController::class)->group(function() {
        Route::get("/", "index")->name("residents");
        Route::get("/new-user", "create")->name("residents.create");
        Route::get("/{id}", "show")->name("residents.view");
        Route::get("/{id}/edit", "edit")->name("residents.edit");
    });
    // Route::get("/profile", function () {
    //     return abort(404);
    // })->name("profile");

});
require __DIR__.'/auth.php';
