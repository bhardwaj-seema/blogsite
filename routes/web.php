<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

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



 Auth::routes();

Route::get('/', [App\Http\Controllers\Frontend\FrontendController::class, 'index']);
Route::get('project/{category_slug}',[App\Http\Controllers\Frontend\FrontendController::class, 'viewCategoryPost']);
Route::get('/project/{category_slug}/{post_slug}', [App\Http\Controllers\Frontend\FrontendController::class, 'viewPost']);
Route::get('comment',[App\Controllers\Frontend\CommentController::class, 'store']);

Route::get('about-us',[App\Http\Controllers\Frontend\FrontendController::class, 'about']);
Route::get('contact-us',[App\Http\Controllers\Frontend\FrontendController::class, 'contact']);
Route::get('privacy-policy',[App\Http\Controllers\Frontend\FrontendController::class, 'privacy_policy']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function(){
    Route::get('/dashboard', [App\Http\Controllers\admin\DashboardController::class, 'index']);

    Route::get('category', [App\Http\Controllers\Admin\CategoryController::class, 'index']);

    Route::get('add-category', [App\Http\Controllers\Admin\CategoryController::class, 'create']);

    Route::post('add-category', [App\Http\Controllers\Admin\CategoryController::class, 'store']);

    Route::get('edit-category/{category_id}', [App\Http\Controllers\Admin\CategoryController::class, 'edit']);

    Route::put('update-category/{category_id}', [App\Http\Controllers\Admin\CategoryController::class, 'update']);

    Route::post('delete-category', [App\Http\Controllers\Admin\CategoryController::class, 'destroy']);
    

    Route::get('posts', [App\Http\Controllers\Admin\PostController::class, 'index']);

    Route::get('add-post', [App\Http\Controllers\Admin\PostController::class, 'create']);
    Route::post('add-post', [App\Http\Controllers\Admin\PostController::class, 'store']);
    Route::get('post/{post_id}', [App\Http\Controllers\Admin\PostController::class, 'edit']);
    Route::put('update-post/{post_id}', [App\Http\Controllers\Admin\PostController::class, 'update']);

    Route::get('delete-post/{post_id}', [App\Http\Controllers\Admin\PostController::class, 'destroy']);

    Route::get('users', [App\Http\Controllers\Admin\UserController::class, 'index']);

    Route::get('users/{user_id}', [App\Http\Controllers\Admin\UserController::class, 'edit']);
    Route::put('update-user/{user_id}', [App\Http\Controllers\Admin\UserController::class, 'update']);

    Route::get('settings',[App\Http\Controllers\Admin\SettingController::class, 'index']);
    Route::post('settings',[App\Http\Controllers\Admin\SettingController::class, 'savedata']);

});




