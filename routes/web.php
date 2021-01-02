<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ResrvationController;
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

Route::get('/', [HomeController::class, 'index']);
Route::get('all/menu', [HomeController::class, 'allMenu'])->name('all.menu');
Route::get('all/blog', [BlogController::class, 'allBlog'])->name('all.blog');
Route::get('all/{slug}/single', [BlogController::class, 'singleBlog'])->name('single.blog');
Route::get('detail/{slug}/menu', [DetailController::class, 'index'])->name('detail.menu');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [AdminController::class, 'index'])->name('home');
    Route::resource('menu', App\Http\Controllers\MenuController::class);
    Route::resource('category', App\Http\Controllers\CategoryController::class);
    Route::resource('gallery', App\Http\Controllers\GalleryController::class);
    Route::resource('time', App\Http\Controllers\TimeController::class);
    Route::resource('story', App\Http\Controllers\StoryController::class);
    Route::resource('table', App\Http\Controllers\TableController::class);
    Route::post('reservation/create', [ResrvationController::class, 'store'])->name('reservation.store');
    Route::get('reservation', [ResrvationController::class, 'index'])->name('reservation');
    Route::get('reservation/{id}/show', [ResrvationController::class, 'show'])->name('reservation.show');
    Route::get('reservation/{id}/delete', [ResrvationController::class, 'delete'])->name('reservation.destroy');
    Route::get('reservation-page', [ResrvationController::class, 'reservationPage'])->name('reservationPage');
});
