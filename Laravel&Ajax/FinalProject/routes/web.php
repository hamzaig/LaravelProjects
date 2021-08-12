<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;


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
    return view('index');
});
Route::get('/dashboard', function () {
    return "Hello";
});

Route::get('usernameverify', [UserController::class, 'usernameVerify']);
Route::get('emailverify', [UserController::class, 'emailVerify']);
Route::post('register', [UserController::class, 'register']);
Route::post('login', [UserController::class, 'login']);


// Resource Route for product.
Route::resource('products', ProductController::class);
// Route for get products for yajra post request.
Route::get('get-products', [ProductController::class, 'getProducts'])->name('get-products');

