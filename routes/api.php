<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RelatedPostController;
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
Route::middleware('auth:sanctum')->prefix('categories')->group(function () {
    Route::post('/create',[CategoryController::class,'store']);
    Route::get('/{category}', [CategoryController::class, 'show']);
    Route::get('/', [CategoryController::class, 'index']);
    Route::put('/{category}', [CategoryController::class, 'update']);
    Route::delete('/{category}', [CategoryController::class, 'destroy']);
});

//posts
Route::middleware('auth:sanctum')->prefix('posts')->group(function () {

Route::middleware('auth:sanctum')->post('/', [PostController::class, 'store']);
Route::middleware('auth:sanctum')->put('/{post:slug}', [PostController::class, 'update']);
Route::middleware('auth:sanctum')->delete('/{post:slug}', [PostController::class, 'destroy']);

});

Route::get('home-posts', [HomeController::class, 'index']);
Route::get('posts/{post:slug}', [PostController::class, 'show']);
Route::get('posts', [PostController::class, 'index']);
Route::get('related-posts/{post:slug}', [RelatedPostController::class, 'index']);
Route::get('dashboard-posts', [DashboardPostController::class, 'index']);
