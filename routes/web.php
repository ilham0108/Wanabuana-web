<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/index', function () {
    return view('index');
})->name('index');


Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    //Route Backend
    Route::resource('manage-image', \App\Http\Controllers\Backend\ImageController::class);
    Route::resource('galery', \App\Http\Controllers\Backend\GaleryController::class);
    Route::resource('admin/dashboard', \App\Http\Controllers\Backend\DashboardController::class);
    Route::resource('manage-about', \App\Http\Controllers\Backend\AboutControllers::class);
    Route::get('/publish_image/{id}', [\App\Http\Controllers\Backend\ImageController::class, 'publish_image'])->name('publish_image');
    Route::post('/addCategory', [\App\Http\Controllers\Backend\CategoryController::class, 'addCategory'])->name('addCategory');
    Route::post('/multipleDelete', [\App\Http\Controllers\Backend\GaleryController::class, 'multiple_delete'])->name('multiple-delete');
    Route::resource('post', \App\Http\Controllers\Backend\PostController::class);
    Route::get('/posts/createSlug', [\App\Http\Controllers\Backend\PostController::class, 'Slug'])->name('checkSlug');


    Route::get('/about', function () {
        return view('Frontend.About');
    })->name('about');
    Route::get('/create-post', function () {
        return view('Backend.Create-post');
    })->name('about');
    Route::get('/add/image', function () {
        return view('Backend.Add-Image');
    })->name('about');
});