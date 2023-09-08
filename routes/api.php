<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;
use Laravel\Fortify\Http\Controllers\RegisteredUserController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('logout',[AuthenticatedSessionController::class,'destroy']);
Route::middleware('auth:sanctum')->post('register',[RegisteredUserController::class,'store']);
Route::post('register',[RegisteredUserController::class,'store']);
Route::post('login',[AuthenticatedSessionController::class,'store']);

//categories
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/categories/create',[CategoryController::class,'store']);
    Route::get('/categories/{category}', [CategoryController::class, 'show']);
    Route::get('categories', [CategoryController::class, 'index']);
    Route::put('/categories/{category}', [CategoryController::class, 'update']);
    Route::delete('/categories/{category}', [CategoryController::class, 'destroy']);
});
