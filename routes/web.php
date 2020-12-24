<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\MenuController;
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

Route::get('/home', [AdminController::class, 'index'])->name('admin');
Route::resource('menu', App\Http\Controllers\MenuController::class);
