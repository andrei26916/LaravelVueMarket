<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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

Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/categories/list', [CategoryController::class, 'categoriesList']);
Route::get('/category/{id}', [CategoryController::class, 'show']);
Route::get('/search/{q}', [ProductController::class, 'search']);

Route::get('/banners', [BannerController::class, 'index']);
Route::get('/product/{id}', [ProductController::class, 'show']);
Route::get('/products/category', [ProductController::class, 'productsByCategory']);

Route::group(['middleware' => ['auth:web']], function () {
    Route::get('baskets', [BasketController::class, 'index']);
    Route::get('favorites ', [FavoriteController::class, 'index']);

    Route::post('/order/create', [OrderController::class, 'store']);

    Route::post('/avatar/upload', [UserController::class, 'uploadAvatar']);
    Route::post('/profile/update', [UserController::class, 'update']);

    Route::post('/upload', function (Request $request){
        $imageService = new \App\Services\ImageService();
        $path = $imageService->upload($request->file('image'));
        $path = '/storage/' . $path;
        return \App\Image::create([
            'name' => $request->file('image')->getClientOriginalName(),
            'src' => $path
        ]);
    });

    Route::get('/products', [ProductController::class, 'index']);
    Route::post('/products/create', [ProductController::class, 'store']);
    Route::post('/product/{id}/update', [ProductController::class, 'update']);
    Route::delete('/product/{id}', [ProductController::class, 'remove']);

    Route::post('/users', [UserController::class, 'index']);
    Route::post('/user/create', [UserController::class, 'create']);
    Route::delete('/user/{id}', [UserController::class, 'remove']);

});

Route::post('/auth', [LoginController::class, 'auth']);
Route::post('/registration', [RegisterController::class, 'create']);

