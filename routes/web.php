<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\BajuController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\authController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\registerController;
use App\Http\Controllers\checkoutController;

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


//admin route
Route::get('/admin/manage-items', [ItemController::class, 'manageItems'])->name('manage.items');
Route::get('/admin/checkout', [ItemController::class, 'checkout'])->name('checkoutview');

//dashboard route
Route::get('/', [DashboardController::class, 'index'])->name('index');


//baju route
Route::get('/baju/create', [BajuController::class, 'create'])->name('baju.create');
Route::post('/baju', [BajuController::class, 'store'])->name('baju.store');

Route::get('/baju/{id}/edit', [BajuController::class, 'edit'])->name('baju.edit');
Route::put('/baju/{id}', [BajuController::class, 'update'])->name('baju.update');

Route::delete('/baju/{id}', [BajuController::class, 'destroy'])->name('baju.destroy');

//cart route
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.addToCart');
Route::delete('/cart/remove/{id}', [CartController::class, 'removeFromCart'])->name('cart.removeFromCart');
Route::patch('/cart/add/{id}', [CartController::class, 'addQuantity'])->name('cart.addQuantity');
Route::patch('/cart/deduct/{id}', [CartController::class, 'deductQuantity'])->name('cart.deductQuantity');

//auth route
route::get('/login',[loginController::class,'index'])->name('login')->middleware('guest');
route::post('/loginrou',[loginController::class,'authenticate'])->name('loginroute');

Route::get('/register', [registerController::class, 'index'])->name('register');
Route::post('/registerrou', [registerController::class, 'store'])->name('registerrou');

route::post('/logout',[dashboardController::class,'logout'])->name('logoutroute');

//checkout route
Route::post('/checkout', [checkoutController::class, 'processCheckout'])->name('checkout');