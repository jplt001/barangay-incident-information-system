<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\IncidentAlertController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ResidentController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(["auth", "verified"])->group(function() {
    Route::resource("/users", UserController::class);
    // Route::resource("/employees", EmployeeController::class);
    Route::resource("/residents", ResidentController::class);
    // Route::resource("/incidents/alerts")
    Route::prefix("/incidents")->group(function() {
        Route::resource('/alerts', IncidentAlertController::class);
    });

    Route::prefix("/bulletin-board")->group(function(){
        Route::resources([
            "/news"=> NewsController::class,
        ]);
    });
});
require __DIR__.'/auth.php';
