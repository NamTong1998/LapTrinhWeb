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
	return redirect()->route('home_index');
});

//Admin Routing
Route::get('admin/index', function() {
    return view('layouts.admin.layout');
})->name('admin_index');
Route::get('admin/users/list', 'Admin\UserManagement@index')->name('admin_users_list');
Route::get('admin/users/create', 'Admin\UserManagement@create')->name('admin_users_create');
Route::post('admin/users/store', 'Admin\UserManagement@store')->name('admin_users_store');
Route::get('admin/users/edit/{id}', 'Admin\UserManagement@edit')->name('admin_users_edit');
Route::post('admin/users/update/{id}', 'Admin\UserManagement@update')->name('admin_users_update');
Route::post('admin/users/delete/{id}', 'Admin\UserManagement@destroy')->name('admin_users_delete');
Route::get('admin/users/role', 'Admin\UserManagement@role')->name('admin_users_role');
Route::post('admin/users/setAdmin/{id}', 'Admin\UserManagement@setAdmin')->name('admin_users_setAdmin');

Route::get('admin/role/list', 'Admin\RoleController@index')->name('admin_role_list');
Route::get('admin/role/create', 'Admin\RoleController@create')->name('admin_role_create');
Route::post('admin/role/store', 'Admin\RoleController@store')->name('admin_role_store');
Route::get('admin/role/edit/{id}', 'Admin\RoleController@edit')->name('admin_role_edit');
Route::post('admin/role/update/{id}', 'Admin\RoleController@update')->name('admin_role_update');
Route::post('admin/role/delete/{id}', 'Admin\RoleController@destroy')->name('admin_role_delete');

Route::get('admin/category/list', 'Admin\ArticleCategoryController@index')->name('admin_category_list');
Route::get('admin/category/create', 'Admin\ArticleCategoryController@create')->name('admin_category_create');
Route::post('admin/category/store', 'Admin\ArticleCategoryController@store')->name('admin_category_store');
Route::get('admin/category/edit/{id}', 'Admin\ArticleCategoryController@edit')->name('admin_category_edit');
Route::post('admin/category/update/{id}', 'Admin\ArticleCategoryController@update')->name('admin_category_update');
Route::post('admin/category/delete/{id}', 'Admin\ArticleCategoryController@destroy')->name('admin_category_delete');

//Home Routing
Route::get('home/index', 'Home\MainController@index')->name('home_index');
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