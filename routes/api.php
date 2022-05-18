<?php

use App\Http\Controllers\BannerController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

Route::get('/banners', [BannerController::class, 'index']);
Route::get('/products', [ProductController::class, 'index']);
Route::get('/product/{id}', [ProductController::class, 'show']);
Route::get('/products/category', [ProductController::class, 'productsByCategory']);
Route::post('/image/upload', [ImageController::class, 'upload']);
Route::post('/products/create', [ProductController::class, 'store']);
Route::post('/product/{id}/update', [ProductController::class, 'update']);

Route::group(['middleware' => ['auth:web']], function () {
    Route::get('baskets', [BasketController::class, 'index']);
    Route::get('favorites ', [FavoriteController::class, 'index']);
});
