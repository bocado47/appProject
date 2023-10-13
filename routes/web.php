<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;

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

Auth::routes();

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/products', [ProductController::class, 'index'])->name('products');
Route::get('/products/getPrice', [ProductController::class, 'getPrice'])->name('getPrice');
Route::post('/products/addToCart', [ProductController::class, 'addToCart'])->name('addToCart');
Route::resource('productsF', AdminController::class);

// productManagement
Route::get('/productsA', [AdminController::class, 'productTable'])->name('productTable');
Route::get('/products/Add', [AdminController::class, 'add'])->name('productsAdd');
Route::post('/products/Store', [AdminController::class, 'store'])->name('productsStore');
Route::get('/products/{id}', [AdminController::class, 'edit'])->name('productsEdit');
Route::put('/productsUpdate/{id}', [AdminController::class, 'update'])->name('productsUpdate');
Route::delete('/productsDelete/{id}', [AdminController::class, 'delete'])->name('productsDelete');

// productManagement


//userManagement
Route::get('/usersA', [AdminController::class, 'userTable'])->name('userTable');
Route::get('/usersProducts/{id}', [AdminController::class, 'usersProducts'])->name('usersProducts');
Route::post('/products/activateUser', [AdminController::class, 'activateUser'])->name('activateUser');