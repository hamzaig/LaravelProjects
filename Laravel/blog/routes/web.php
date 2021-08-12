<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;
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

// Route::get('/', function () {
//     return view('welcome');
// });



Route::view('/', 'welcome',['name'=>'Imran Qasim','company'=>'Perfect Web Solutions']);
Route::get('welcome', [WelcomeController::class,'welcome']);
Route::get('goodbye/{name?}', [WelcomeController::class,'goodbye']);
// Route::get('', 'WelcomeController@goodbye');

Route::prefix('admin')->group(function(){
    Route::view('/', 'dashboard.admin');
    Route::resource('posts', ResourceController::class);
    Route::resource('users', UserController::class);
    Route::resource('roles', UserController::class);
    Route::resource('pages', UserController::class);
    Route::resource('categories', UserController::class);
});


