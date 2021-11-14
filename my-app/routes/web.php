<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\StockController;
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

Auth::routes();

Route::get('/home', [
    App\Http\Controllers\HomeController::class,
    'index',
])->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/users', [UserController::class, 'index']);
    Route::post('/stocks/store', [StockController::class, 'store']);
    Route::get('/stocks', [StockController::class, 'index'])->name(
        'stocks.index'
    );
    Route::get('/stocks/edit/{id}', [StockController::class, 'edit']);
    Route::post('/stocks/update/{id}', [StockController::class, 'update']);
});
