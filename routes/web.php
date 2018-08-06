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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['namespace'=>'Backend','prefix'=>'admin'],function (){

    Route::get('/', function () {
        return view('backend.dashboard');
    });

    Route::group(['prefix' => 'banners'], function () {

        Route::any('/', 'BannerController@index')->name('banners');

        Route::any('/create', 'BannerController@create')->name('createBanner');

        Route::any('/store', 'BannerController@store')->name('storeBanner');

        Route::any('/show/{id?}', 'BannerController@show')->name('showBanner');

        Route::any('/edit/{id?}', 'BannerController@edit')->name('editBanner');

        Route::any('/update', 'BannerController@update')->name('updateBanner');

        Route::any('/delete', 'BannerController@destroy')->name('deleteBanner');


    });
});


Route::group(['prefix' => 'users'], function () {

    Route::any('/', 'UserController@index')->name('users');

    Route::any('/addUser', 'UserController@addUser')->name('addUser');

    Route::any('/deleteUser/{uid?}', 'UserController@deleteUser')->name('deleteUser');

    Route::any('/editUser/{uid?}', 'UserController@editUser')->name('editUser');

    Route::any('/editUserAction', 'UserController@editUserAction')->name('editUserAction');

    Route::any('/changeUserType', 'UserController@userTypeChanger')->name('userTypeChanger');

    Route::any('userSearch', 'UserController@userSearch')->name('userSearch');
});



Route::any('login', 'UserController@login')->name('login');

Route::any('logout', 'UserController@logout')->name('logout');

