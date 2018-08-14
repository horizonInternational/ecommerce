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


Route::namespace('Backend')->group(function () {
    Route::any('/login', 'UsersController@login')->name('login');
    Route::any('/logout', 'UsersController@logout')->name('logout');
});

//Route::group(['namespace' => 'Backend','prefix'=>null], function () {
//
//
//
//    Route::any('/logout', 'UsersController@logout')->name('logout');
//
//});


Route::group(['namespace'=>'Backend','prefix'=>'admin'],function (){

    Route::get('/', function () {
        return view('backend.dashboard');
    })->name('admin');



    Route::group(['prefix' => 'banners'], function () {

        Route::any('/', 'BannersController@index')->name('banners');

        Route::any('/create', 'BannersController@create')->name('createBanner');

        Route::any('/store', 'BannersController@store')->name('storeBanner');

        Route::any('/show/{id?}', 'BannersController@show')->name('showBanner');

        Route::any('/edit/{id?}', 'BannersController@edit')->name('editBanner');

        Route::any('/update', 'BannersController@update')->name('updateBanner');

        Route::any('/delete', 'BannersController@destroy')->name('destroyBanner');


    });

    Route::group(['prefix' => 'users'], function () {

        Route::any('/', 'UsersController@index')->name('users');

        Route::any('/create', 'UsersController@create')->name('createUser');

        Route::any('/store', 'UsersController@store')->name('storeUser');

        Route::any('/show/{id?}', 'UsersController@show')->name('showUser');

        Route::any('/edit/{id?}', 'UsersController@edit')->name('editUser');

        Route::any('/update', 'UsersController@update')->name('updateUser');

        Route::any('/delete', 'UsersController@destroy')->name('destroyUser');


    });

    Route::group(['prefix' => 'galleries'], function () {

        Route::any('/', 'GalleriesController@index')->name('galleries');

        Route::any('/create', 'GalleriesController@create')->name('createGallery');

        Route::any('/store', 'GalleriesController@store')->name('storeGallery');

        Route::any('/show/{id?}', 'GalleriesController@show')->name('showGallery');

        Route::any('/edit/{id?}', 'GalleriesController@edit')->name('editGallery');

        Route::any('/update', 'GalleriesController@update')->name('updateGallery');

        Route::any('/delete', 'UsersController@destroy')->name('destroyGallery');


    });

    Route::group(['prefix' => 'blogs'], function () {

        Route::any('/', 'BlogsController@index')->name('blogs');

        Route::any('/create', 'BlogsController@create')->name('createBlog');

        Route::any('/store', 'BlogsController@store')->name('storeBlog');

        Route::any('/show/{id?}', 'BlogsController@show')->name('showBlog');

        Route::any('/edit/{id?}', 'BlogsController@edit')->name('editBlog');

        Route::any('/update', 'BlogsController@update')->name('updateBlog');

        Route::any('/delete', 'BlogsController@destroy')->name('destroyBlog');


    });

    Route::group(['prefix' => 'menus'], function () {

        Route::any('/', 'MenusController@index')->name('menus');

        Route::any('/create', 'MenusController@create')->name('createMenu');

        Route::any('/store', 'MenusController@store')->name('storeMenu');

        Route::any('/show/{id?}', 'MenusController@show')->name('showMenu');

        Route::any('/edit/{id?}', 'MenusController@edit')->name('editMenu');

        Route::any('/update', 'MenusController@update')->name('updateMenu');

        Route::any('/delete', 'MenusController@destroy')->name('destroyMenu');


    });

    Route::group(['prefix' => 'teams'], function () {

        Route::any('/', 'TeamsController@index')->name('teams');

        Route::any('/create', 'TeamsController@create')->name('createTeam');

        Route::any('/store', 'TeamsController@store')->name('storeTeam');

        Route::any('/show/{id?}', 'TeamsController@show')->name('showTeam');

        Route::any('/edit/{id?}', 'TeamsController@edit')->name('editTeam');

        Route::any('/update', 'TeamsController@update')->name('updateTeam');

        Route::any('/delete', 'TeamsController@destroy')->name('destroyTeam');


    });

    Route::group(['prefix' => 'testimonials'], function () {

        Route::any('/', 'TestimonialsController@index')->name('testimonials');

        Route::any('/create', 'TestimonialsController@create')->name('createTestimonial');

        Route::any('/store', 'TestimonialsController@store')->name('storeTestimonial');

        Route::any('/show/{id?}', 'TestimonialsController@show')->name('showTestimonial');

        Route::any('/edit/{id?}', 'TestimonialsController@edit')->name('editTestimonial');

        Route::any('/update', 'TestimonialsController@update')->name('updateTestimonial');

        Route::any('/delete', 'TestimonialsController@destroy')->name('destroyTestimonial');


    });

    Route::group(['prefix' => 'feedbacks'], function () {

        Route::any('/', 'FeedbacksController@index')->name('feedbacks');

//        Route::any('/create', 'FeedbacksController@create')->name('createFeedback');

//        Route::any('/store', 'FeedbacksController@store')->name('storeFeedback');

        Route::any('/show/{id?}', 'FeedbacksController@show')->name('showFeedback');

//        Route::any('/edit/{id?}', 'FeedbacksController@edit')->name('editFeedback');

//        Route::any('/update', 'FeedbacksController@update')->name('updateFeedback');

        Route::any('/delete', 'FeedbacksController@destroy')->name('destroyFeedback');


    });

    Route::group(['prefix' => 'whyus'], function () {

        Route::any('/', 'WhyusController@index')->name('whyus');

        Route::any('/create', 'WhyusController@create')->name('createWhyus');

        Route::any('/store', 'WhyusController@store')->name('storeWhyus');

        Route::any('/show/{id?}', 'WhyusController@show')->name('showWhyus');

        Route::any('/edit/{id?}', 'WhyusController@edit')->name('editWhyus');

        Route::any('/update', 'WhyusController@update')->name('updateWhyus');

        Route::any('/delete', 'WhyusController@destroy')->name('destroyWhyus');


    });

    Route::group(['prefix' => 'bustypes'], function () {

        Route::any('/', 'BustypesController@index')->name('bustypes');

        Route::any('/create', 'BustypesController@create')->name('createBustype');

        Route::any('/store', 'BustypesController@store')->name('storeBustype');

        Route::any('/show/{id?}', 'BustypesController@show')->name('showBustype');

        Route::any('/edit/{id?}', 'BustypesController@edit')->name('editBustype');

        Route::any('/update', 'BustypesController@update')->name('updateBustype');

        Route::any('/delete', 'BustypesController@destroy')->name('destroyBustype');


    });
});



