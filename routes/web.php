<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
Auth::routes();

Route::get('/', function(){
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [AdminController::class, 'index'])->name('admin');
    Route::resource('menu', App\Http\Controllers\MenuController::class);
    Route::resource('category', App\Http\Controllers\CategoryController::class);
    Route::resource('gallery', App\Http\Controllers\GalleryController::class);
});
