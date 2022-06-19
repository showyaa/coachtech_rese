<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\MyPageController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ThanksController;



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

Route::get('/logout', [LogoutController::class, 'logout']);

require __DIR__.'/auth.php';


Route::get('/', [ShopController::class, 'index']);
Route::get('/search', [ShopController::class, 'search']);

Route::get('/detail/{shop}', [ShopController::class, 'detail']);

Route::get('/mypage', [MyPageController::class, 'mypage']);

Route::post('/like', [LikeController::class, 'create']);
Route::post('/like/delete', [LikeController::class, 'delete']);

Route::post('/reserve', [ReservationController::class, 'create']);
Route::post('/reserve/delete', [ReservationController::class, 'delete']);
Route::post('/done', [ReservationController::class, 'done']);

Route::post('/thanks', [ThanksController::class, 'thanks']);
