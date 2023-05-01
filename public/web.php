<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CakeController;

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
    return view('source.list');
});
Route::resource('cake', CakeController::class);

Route::get('cake/loai_san_pham/{id}', [CakeController::class, 'getLoaisp'])->name('cake.getLoaisp');
//Route::get('cake/gioi_thieu', [CakeController::class, 'getGioi'])->name('cake.getLoaisp');
