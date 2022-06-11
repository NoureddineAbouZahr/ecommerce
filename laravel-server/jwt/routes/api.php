<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JWTController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\redirectController;
use App\Http\Controllers\FavoriteController;
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
Route::group(['middleware' => 'api'], function($router) {
    Route::post('/register', [JWTController::class, 'register']);
    Route::post('/login', [JWTController::class, 'login']);
    Route::post('/logout', [JWTController::class, 'logout']);
    Route::post('/refresh', [JWTController::class, 'refresh']);
    Route::post('/profile', [JWTController::class, 'profile']);
});

Route::get('/getAllItems_WithCatName', [ItemController::class, 'getAllItems_WithCatName']);


Route::group(['prefix' => 'admin'], function(){
    Route::group(['middleware' => 'role.admin'], function(){
        Route::post('/add_items', [ItemController::class, 'addItem']);
        Route::post('/add_category', [CategoryController::class, 'addCategory']);
    });
});
Route::get('/not_found', [redirectController::class, 'notFound'])->name("not-found");

Route::get('/items/{id?}', [ItemController::class, 'getAllItems'])->name("items");
Route::get('/item_By_Name/{name}', [ItemController::class, 'getItemByName'])->name("itemByName");
Route::get('/item_By_Category/{id}', [ItemController::class, 'getItemByCategoryId'])->name("itemByCategory");
Route::get('/Categories', [CategoryController::class, 'getAllCategories'])->name("Categories");

Route::group(['prefix' => 'fav'], function(){
    Route::group(['middleware' => 'favo'], function(){
        Route::post('/favorite', [FavoriteController::class, 'addFav']);
    });
});
Route::get('/not_logged_in', [redirectController::class, 'notloggedin'])->name("not-logged-in");
