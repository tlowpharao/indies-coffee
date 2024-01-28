<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UsersController; // 追記
use App\Http\Controllers\ProductsController; //追記
use App\Http\Controllers\FavoritesController; //追記

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [ProductsController::class, 'index']);

Route::get('/dashboard', [ProductsController::class, 'index'])->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::group(['middleware' => ['auth']], function () {
    
    Route::group(['prefix' => 'users/{id}'], function () {
        
        // お気に入りに追加した投稿を取得
        Route::get('favorites', [UsersController::class, 'favorites'])->name('users.favorites');
    }); 
    
    Route::resource('users', UsersController::class, ['only' => ['show']]);
    Route::resource('products', ProductsController::class, ['only' => ['create','store', 'destroy','edit','update','show']]);
    
    Route::group(['prefix' => 'products/{id}'], function () {
        Route::post('favorites', [FavoritesController::class, 'store'])->name('favorites.favorite');
        Route::delete('unfavorite', [FavoritesController::class, 'destroy'])->name('favorites.unfavorite');
    });
    
    
});