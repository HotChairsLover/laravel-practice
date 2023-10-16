<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/', [App\Http\Controllers\Adv\PostController::class, 'index'])->name('home');

Route::group(['namespace' => 'App\Http\Controllers\Adv'], function () {
    Route::resource('posts', 'PostController')
        ->names('adv.posts');
    Route::resource('profile', 'ProfileController')
        ->except(['create','store'])
        ->names('adv.profile');
});

$groupData = [
    'namespace' => 'App\Http\Controllers\Adv\Admin',
    'prefix' => 'admin/adv',
];
Route::group($groupData, function () {
   $methods = ['index', 'edit', 'update', 'create', 'store'];
   Route::resource('categories', 'CategoryController')
       ->only($methods)
       ->names('adv.admin.categories');

   Route::resource('posts', 'PostController')
        ->except(['show'])
        ->names('adv.admin.posts');
});

