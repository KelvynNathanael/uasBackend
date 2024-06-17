<?php

use App\Http\Controllers\loginController;
use App\Http\Controllers\registerController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

route::get('/loginv',[loginController::class,'index'])->name('login');
route::get('/registerv',[registerController::class,'index'])->name('register');
route::post('/registerrou',[registerController::class,'store'])->name('registerroute');

Route::get('/dashboardv', function () {
    return view('dashboard');
});




