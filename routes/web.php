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

Route::get('/', [\App\Http\Controllers\Frontend\IndexController::class, 'index'])->name('index');

Route::get('/index',  [\App\Http\Controllers\Frontend\IndexController::class, 'index'])->name('index');
Route::resource('post',  \App\Http\Controllers\Frontend\PostController::class);
Route::resource('galery',  \App\Http\Controllers\Frontend\GaleryController::class);
Route::resource('recruitment', \App\Http\Controllers\Frontend\RecruitmentController::class);
Route::resource('about', \App\Http\Controllers\Frontend\AboutController::class);



Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    //Route Backend
    Route::resource('manage-image', \App\Http\Controllers\Backend\ImageController::class);
    Route::resource('admin-galery', \App\Http\Controllers\Backend\GaleryController::class);
    Route::resource('admin/dashboard', \App\Http\Controllers\Backend\DashboardController::class);
    Route::resource('admin-about', \App\Http\Controllers\Backend\AboutControllers::class);
    Route::get('/publish_image/{id}', [\App\Http\Controllers\Backend\ImageController::class, 'publish_image'])->name('publish_image');
    Route::post('/addCategory', [\App\Http\Controllers\Backend\CategoryController::class, 'addCategory'])->name('addCategory');
    Route::post('/addTags', [\App\Http\Controllers\Backend\PostController::class, 'addTags'])->name('addTags');
    Route::post('/multipleDelete', [\App\Http\Controllers\Backend\GaleryController::class, 'multiple_delete'])->name('multiple-delete');
    Route::resource('admin-post', \App\Http\Controllers\Backend\PostController::class);
    Route::get('/posts/createSlug', [\App\Http\Controllers\Backend\PostController::class, 'Slug'])->name('checkSlug');
    Route::post('/update_post_publish_status',  [\App\Http\Controllers\Backend\PostController::class, 'update_status_publish'])->name('update_publish');
    Route::resource('/member',  \App\Http\Controllers\Backend\MemberController::class);
    Route::resource('general-setting',  \App\Http\Controllers\Backend\GeneralController::class);

    // Frontend
});
