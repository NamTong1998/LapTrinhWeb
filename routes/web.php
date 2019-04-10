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
Auth::routes();

Route::get('/', function() {
	return view('hello');
});

//Admin Routing
Route::get('admin/index', function() {
    return view('layouts.admin.layout');
});
Route::get('admin/users/list', 'Admin\UserManagement@index')->name('admin_users_list');

//Home Routing
Route::get('home/index', 'Home\MainController@index')->name('home_page');
Route::get('home/main', 'Home\MainController@getData')->name('home_main');
Route::post('home/main/search', 'Home\MainController@searchPost')->name('home_search');
Route::get('home/news', 'Home\MainController@getNews')->name('home-news');
Route::get('home/news/{slug}', 'Home\MainController@getNewsDetail')->name('home_newsDetail');
Route::get('home/news_category/{slug}', 'Home\MainController@getNewsByCategory')->name('home-news_category');
Route::get('home/news_tags/{tag}', 'Home\MainController@getNewsByTag')->name('home_news_tag');

Route::get('home/profile/view', 'Home\UserProfileController@index')->name('home_profile_view');
Route::get('home/profile/edit/{id}', 'Home\UserProfileController@edit')->name('home_profile_edit');
Route::post('home/profile/update/{id}', 'Home\UserProfileController@update')->name('home_profile_update');

Route::get('home/changepass/view','Home\ChangePasswordController@index')->name('home_changepassword_view');
Route::post('home/changepass/save','Home\ChangePasswordController@store')->name('home_changepassword_save');

/*
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function() {
	Route::get('/index', function() {
		return view('layouts.admin.layout');
	});

	Route::get(['prefix' => 'users'], function() {
		Route::get('/list', 'Admin\UserManagement@index')->name('admin_users_list');
	});
});

Auth::routes();

Route::group(['prefix' => 'home'], function() {
    Route::get('/index', 'Home\MainController@index')->name('home_page');

    Route::get('/main', 'Home\MainController@getData')->name('home_main');

    Route::post('/main/search', 'Home\MainController@searchPost')->name('home_earch');

    Route::get('/news', 'Home\MainController@getNews')->name('home-news');
    Route::get('/news/{slug}', 'Home\MainController@getNewsDetail')->name('home_newsDetail');

    Route::get('/news_category/{slug}', 'Home\MainController@getNewsByCategory')->name('home-news_category');

    Route::get('/news_tags/{tag}', 'Home\MainController@getNewsByTag')->name('home_news_tag');

    //user profile
    Route::group(['prefix' => 'profile'], function() { 
        Route::get('/view', 'Home\UserProfileController@index')->name('home_profile_view');

        Route::get('/edit/{id}', 'Home\UserProfileController@edit')->name('home_profile_edit');
        Route::post('/update/{id}', 'Home\UserProfileController@update')->name('home_profile_update');
    });
});
*/