<?php

use App\Http\Controllers\AccountSettings;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MyBarangayController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResidentController;
use App\Http\Controllers\RolesController;
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
        Route::get("/create", "create")->name("residents.create");
        Route::post("/", "store")->name("residents.postcreate");
        Route::get("/{id}", "show")->name("residents.view");
        Route::get("/{id}/edit", "edit")->name("residents.edit");
        Route::put("/{id}/edit", "update")->name("residents.putupdate");
    });

    Route::prefix("roles")->controller(RolesController::class)->group(function() {
        Route::get("/", "index")->name("roles");
        Route::get("/new-role", "create")->name("roles.create");
        Route::get("/{id}", "show")->name("roles.view");
        Route::get("/{id}/edit", "edit")->name("roles.edit");
    });

    Route::prefix("my-barangay")->controller(MyBarangayController::class)->group(function(){
        Route::get("/", "index")->name("mybarangay.home");
        Route::get("/edit", "index")->name("mybarangay.edit");
        Route::put("/edit", "update")->name("mybarangay.do.update");
    });

    Route::prefix("settings")->controller(AccountSettings::class)->group(function(){
        Route::get("/", "index")->name("settings.home");
    });
    // Route::get("/profile", function () {
    //     return abort(404);
    // })->name("profile");

});
require __DIR__.'/auth.php';
