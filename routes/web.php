<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\MyPageController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ThanksController;
use App\Models\Review;

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

Route::get('/mypage', [MyPageController::class, 'mypage'])->middleware('auth');

Route::post('/like', [LikeController::class, 'create'])->middleware('auth');
Route::post('/like/delete', [LikeController::class, 'delete'])->middleware('auth');

Route::post('/reserve', [ReservationController::class, 'create'])->middleware('auth');
Route::post('/reserve/update', [ReservationController::class, 'update'])->middleware('auth');
Route::post('/reserve/delete', [ReservationController::class, 'delete'])->middleware('auth');
Route::post('/done', [ReservationController::class, 'done']);

Route::post('/thanks', [ThanksController::class, 'thanks']);

Route::get('/review', [ReviewController::class, 'review'])->middleware('auth');
Route::post('/review/create', [ReviewController::class, 'create'])->middleware('auth');
Route::post('/review/done', [ReviewController::class, 'done'])->middleware('auth');