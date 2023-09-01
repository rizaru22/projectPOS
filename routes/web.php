<?php

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;

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

Route::get('/',function(){
    return view('dashboard',[
        "title"=>"Dashboard"
    ]);
})->middleware('auth');

Route::resource('kategori',CategoryController::class)->except('show','destroy','create')->middleware('auth');
Route::resource('pelanggan',CustomerController::class)->except('destroy')->middleware('auth');
Route::resource('produk',ProductController::class)->middleware('auth');
Route::get('/produk/{id}/code/print', [ProductController::class, 'code'])->name('produk.code');
Route::resource('pengguna',UserController::class)->except('destroy','create','show','update','edit')->middleware('auth');

Route::get('login',[LoginController::class,'loginView'])->name('login');
Route::post('login',[LoginController::class,'authenticate']);
Route::post('logout',[LoginController::class,'logout'])->middleware('auth');

Route::get('penjualan',function(){
    return view('penjualan.index',[
        "title"=>"Penjualan"
    ]);
})->middleware('auth');

Route::get('lw',function(){
    return view('lw');
});

Route::get('order',function(){
return view('penjualan.orders',[
    "title"=>"Order"
]);
})->middleware('auth');
