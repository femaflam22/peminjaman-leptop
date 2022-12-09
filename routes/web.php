<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LaptopLendingController;

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

Route::get('/', [LaptopLendingController::class, 'index']);

Route::prefix('/laptop-lending')->name('laptop_lending.')->group(function() {
    Route::get('/', [LaptopLendingController::class, 'index'])->name('index');
    Route::get('/data', [LaptopLendingController::class, 'data'])->name('data');
    Route::post('/store', [LaptopLendingController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [LaptopLendingController::class, 'edit'])->name('edit');
    Route::patch('/update/{id}', [LaptopLendingController::class, 'update'])->name('update');
    Route::delete('/destroy/{id}', [LaptopLendingController::class, 'destroy'])->name('destroy');
});
