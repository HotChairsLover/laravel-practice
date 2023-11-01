<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

$apiAdvGroupData = [
    'namespace' => 'App\Http\Controllers\Api\Adv',
];
Route::group($apiAdvGroupData, function () {
    Route::apiResource('posts', 'PostController')
        ->names('api.adv.posts')
        ->except(['index', 'show']);
    Route::group([], function () {
        Route::get('posts', 'PostController@index')->name('api.adv.posts.index');
        Route::get('posts/search/{category}', 'PostController@categorySearch')->name('api.adv.posts.categorySearch');
        Route::get('posts/search/{search?}', 'PostController@textSearch')->name('api.adv.posts.textSearch');
        Route::get('posts/{post}', 'PostController@show')->name('api.adv.posts.show');
    });
});

Route::group($apiAdvGroupData, function () {
    Route::apiResource('categories', 'CategoryController')
        ->names('api.adv.categories')
        ->except(['show', 'destroy']);
});

$apiProfileGroupData = [
    'namespace' => 'App\Http\Controllers\Api\Profile',
];
Route::group($apiProfileGroupData, function () {
    Route::get('profile', 'ProfileController@index')->name('api.profile.index');
    Route::get('profile/posts', 'ProfileController@posts')->name('api.profile.posts');
    Route::patch('profile', 'ProfileController@update')->name('api.profile.update');
    Route::delete('profile', 'ProfileController@forceDelete')->name('api.profile.forceDelete');
});
