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

$advGroupData = [
    'namespace' => 'App\Http\Controllers\Adv',
    'middleware' => ['auth'],
];
Route::group($advGroupData, function () {
    Route::resource('posts', 'PostController')
        ->names('adv.posts')
        ->except(['index', 'show']);
    Route::group(['excluded_middleware' => ['auth']], function () {
        Route::get('posts', 'PostController@index')->name('adv.posts.index');
        Route::get('posts/search/{category}', 'PostController@categorySearch')->name('adv.posts.categorySearch');
        Route::get('posts/search/{search?}', 'PostController@textSearch')->name('adv.posts.textSearch');
        Route::get('posts/{post}', 'PostController@show')->name('adv.posts.show');
    });

    Route::resource('profile', 'ProfileController')
        ->except(['create', 'store'])
        ->names('adv.profile');
});

$adminGroupData = [
    'namespace' => 'App\Http\Controllers\Adv\Admin',
    'prefix' => 'admin/adv',
    'middleware' => ['auth'],
];
Route::group($adminGroupData, function () {
    $methods = ['index', 'edit', 'update', 'create', 'store'];
    Route::resource('categories', 'CategoryController')
        ->only($methods)
        ->names('adv.admin.categories');

    Route::resource('posts', 'PostController')
        ->except(['show'])
        ->names('adv.admin.posts');
});

