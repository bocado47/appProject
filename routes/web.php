<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\PricePerPositionController;

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
// Route::get('/products', [ProductController::class, 'index'])->name('products');
// Route::get('/products/getPrice', [ProductController::class, 'getPrice'])->name('getPrice');
// Route::post('/products/addToCart', [ProductController::class, 'addToCart'])->name('addToCart');
// Route::resource('productsF', AdminController::class);

// productManagement
Route::get('/products', [ProductsController::class, 'index'])->name('productTable');
Route::get('/products/Add', [ProductsController::class, 'create'])->name('productsAdd');
Route::post('/products/Store', [ProductsController::class, 'store'])->name('productsStore');
Route::get('/products/edit/{id}', [ProductsController::class, 'edit'])->name('productsEdit');
Route::put('/products/update/{id}', [ProductsController::class, 'update'])->name('productsUpdate');
Route::delete('/products/destroy/{id}', [ProductsController::class, 'destroy'])->name('productsDelete');

// productManagement


//userManagement
Route::get('/usersA', [AdminController::class, 'userTable'])->name('userTable');
Route::get('/usersProducts/{id}', [AdminController::class, 'usersProducts'])->name('usersProducts');
Route::post('/products/activateUser', [AdminController::class, 'activateUser'])->name('activateUser');
Route::post('/products/editPrice', [AdminController::class, 'editPrice'])->name('editPrice');



// productManagement
Route::get('/position', [PositionController::class, 'index'])->name('position');
Route::get('/position/Create', [PositionController::class, 'create'])->name('positionAdd');
Route::post('/position/Store', [PositionController::class, 'store'])->name('positionStore');
Route::get('/position/edit/{id}', [PositionController::class, 'edit'])->name('positionEdit');
Route::put('/position/update/{id}', [PositionController::class, 'update'])->name('positionUpdate');
Route::delete('/position/destroy/{id}', [PositionController::class, 'destroy'])->name('positionDelete');


// pricePerPosition
Route::get('/pricePerPosition', [PricePerPositionController::class, 'index'])->name('pricePerPosition');
Route::get('/pricePerPosition/Create', [PricePerPositionController::class, 'create'])->name('pricePerPositionAdd');
Route::post('/pricePerPosition/Store', [PricePerPositionController::class, 'store'])->name('pricePerPositionStore');
Route::get('/pricePerPosition/edit/{id}', [PricePerPositionController::class, 'edit'])->name('pricePerPositionEdit');
Route::put('/pricePerPosition/update/{id}', [PricePerPositionController::class, 'update'])->name('pricePerPositionUpdate');
Route::delete('/pricePerPosition/destroy/{id}', [PricePerPositionController::class, 'destroy'])->name('pricePerPositionelete');