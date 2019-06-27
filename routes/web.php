<?php

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

//Route::get('/', function () {
//    return view('welcome');
//});



Route::group(['prefix'=>'admin','middleware'=>'admin'],function (){
    Route::get('/', 'HomeController@dashboard')->name('admin');
    Route::resources([
        'categories' => 'CategoryController',
        'posts' => 'PostController',
//        'users' => 'UserController',
    ]);
});
Route::group(['middleware'=>'site'],function (){
    Auth::routes();
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('category/{category}','CategoryController@userShow')->name('user.categories');
    Route::get('post/{id}','PostController@userShow')->name('user.posts');
});


