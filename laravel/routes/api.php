<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CafeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CafeOrderController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CafeProductController;

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

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::get('schools', [SchoolController::class, 'index']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('profile', function(Request $request) {
        return auth()->user();
    });

    Route::resources([
        'cafes' => CafeController::class,
        'orders' => OrderController::class,
        'products' => ProductController::class,
        'students' => StudentController::class,
        'users' => UserController::class
    ]);

    Route::resource('schools', SchoolController::class)->except([
        'index'
    ]);

    Route::get('cafes/{cafe}/orders', [CafeOrderController::class, 'index']);
    Route::get('cafes/{cafe}/products', [CafeProductController::class, 'index']);

    Route::post('/logout', [AuthController::class, 'logout']);
});


