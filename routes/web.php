<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CakeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductTypeController;
use App\Http\Middleware\AdminLoginMiddleware;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
Route::resource('cake', CakeController::class);

Route::get('cake/loai_san_pham/{id}', [CakeController::class, 'getLoaisp'])->name('cake.getLoaisp');

Route::get('signup', [CakeController::class, 'Signup'])->name('cake.Signup');
Route::post('signup', [CakeController::class, 'postSignup'])->name('cake.Signup');
Route::get('login', [CakeController::class, 'Login'])->name('cake.Login');
Route::post('login', [CakeController::class, 'PostLogin'])->name('cake.postLogin');

Route::get('logout',[CakeController::class,'getLogout'])->name('cake.getlogout');

Route::get('list_cart/{id}',[CakeController::class,'listCart'])->name('cake.listcart');

Route::get('cake/add_product_heart/{id}', [CakeController::class,'GetAddHeadrt'])->name('cake.addproducthead');

Route::get('list_product_heart/{id}', [CakeController::class,'ListHeadrt'])->name('cake.listproducthead');

Route::post('magiamgia', [CakeController::class, 'PostMagiamgia'])->name('cake.magiamgia');
//gior hang//////////////////////////
//add giỏ hang
Route::get('cake/addcart/{id}', [CakeController::class, 'getAddtoCart'])->name('themgiohang');

//xóa sp giỏ hàng
Route::get('cake/deletecart/{id}', [CakeController::class, 'getDeleteItemCart'])->name('xoagiohang');

//đặt hàng
Route::get('dat_hang', [CakeController::class, 'getCkectOut'])->name('dathang');
Route::post('dat_hang', [CakeController::class, 'postCkectOut'])->name('postdathang');
//-----------------------------////

// Route::get('cake/add-to-cart/{id}', [
//     'as'=>'themgiohang' ,
//     'uses'=>'CakeController@getAddtoCart'
// ]);


//-------------mail---------------
Route::get('/input-email',[CakeController::class,'getInputEmail'])->name('getInputEmail');
Route::post('/input-email',[CakeController::class,'postInputEmail'])->name('postInputEmail');
//--------------------------------


Route::get('/dangnhap/admin',[AdminController::class,'getLogin'])->name('admin.getLogin');
Route::post('/dangnhap/admin',[AdminController::class,'postLogin'])->name('admin.postLogin');

Route::get('/dangxuat/admin',[AdminController::class,'getLogout'])->name('admin.getLogout');



Route::group(['prefix'=>'admin','middleware'=>'adminLogin'],function(){

		Route::group(['prefix'=>'quanlynhansu'],function(){

            Route::resource('khachhang', UserController::class);
            Route::get('nhanvien/edit/{id}',[UserController::class,'editNhanvien'])->name('nhanvien.edit');
            Route::put('nhanvien/{id}',[UserController::class,'updateNhanvien'])->name('nhanvien.update');
            Route::delete('nhanvien/{id}', [UserController::class, 'destroyNhanvien'])->name('nhanvien.destroy');


		});
        Route::group(['prefix'=>'danhmucsanpham'],function(){
            Route::get('danhsach',[ProductTypeController::class,'index'])->name('danhmucsanpham.list');
            Route::delete('xoa/{id}', [ProductTypeController::class, 'destroy'])->name('danhmucsanpham.destroy');
            Route::get('adddanhmuc', [ProductTypeController::class, 'getAdddanhmuc'])->name('danhmucanpham.adddanhmuc');
            Route::post('adddanhmuc', [ProductTypeController::class, 'postAdddanhmuc'])->name('danhmucanpham.adddanhmuc');

            Route::get('edit/{id}',[ProductTypeController::class,'editdanhmuc'])->name('danhmucsanpham.edit');
            Route::put('{id}',[ProductTypeController::class,'updatedanhmuc'])->name('danhmucsanpham.update');



		});
        Route::group(['prefix'=>'sanpham'],function(){
            Route::get('danhsach',[ProductController::class,'index'])->name('sanpham.list');
            Route::get('loaisanpham/{id}',[ProductController::class,'getLoaiSP'])->name('sanpham.showloai');
            Route::delete('xoa/{id}', [ProductController::class, 'destroy'])->name('sanpham.destroy');
            Route::get('addsp', [ProductController::class, 'getAddSP'])->name('sanpham.getaddsp');
            Route::post('addsp', [ProductController::class, 'postAddSP'])->name('sanpham.getaddsp');
            Route::get('edit/{id}',[ProductController::class,'editSP'])->name('sanpham.edit');
            Route::put('update/{id}',[ProductController::class,'updateSP'])->name('sanpham.update');
            // Route::post('signup', [CakeController::class, 'postSignup'])->name('cake.Signup');


		});
        Route::group(['prefix'=>'donhang'],function(){
			// admin/category/danhsach
			 Route::get('danhsach',[OrderController::class,'index'])->name('donhang.list');
             Route::get('loaidon/{id}',[OrderController::class,'getLoaiDOn'])->name('donhang.showloai');

             Route::get('chi_tiet/{id}', [OrderController::class, 'getDetail'])->name('donhang.detail');

             Route::put('update/{id}', [OrderController::class, 'updatestatus'])->name('donhang.updatestatus');

             Route::delete('delete/{id}', [OrderController::class, 'delete'])->name('donhang.delete');

		});


        Route::get('/', [AdminController::class, 'index'])->name('admin.index');




});
