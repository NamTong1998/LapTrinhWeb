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

Route::group(['prefix'=>'admin', 'middleware'=>['auth', 'admin']],function()
{
	Route::get('index', function() {
	    return view('layouts.admin.layout');
	})->name('admin_index');

	Route::group(['prefix'=>'users'],function()
	{
		Route::get('list', 'Admin\UserManagement@index')->name('admin_users_list');
		Route::get('create', 'Admin\UserManagement@create')->name('admin_users_create');
		Route::post('store', 'Admin\UserManagement@store')->name('admin_users_store');
		Route::get('edit/{id}', 'Admin\UserManagement@edit')->name('admin_users_edit');
		Route::post('update/{id}', 'Admin\UserManagement@update')->name('admin_users_update');
		Route::post('delete/{id}', 'Admin\UserManagement@destroy')->name('admin_users_delete');
		Route::get('role', 'Admin\UserManagement@role')->name('admin_users_role');
		Route::post('setAdmin/{id}', 'Admin\UserManagement@setAdmin')->name('admin_users_setAdmin');
		Route::post('setRole/{id}', 'Admin\UserManagement@setRole')->name('admin_users_setRole');
	});
	//role
	Route::group(['prefix'=>'role'],function()
	{
		Route::get('list', 'Admin\RoleController@index')->name('admin_role_list');
		Route::get('create', 'Admin\RoleController@create')->name('admin_role_create');
		Route::post('store', 'Admin\RoleController@store')->name('admin_role_store');
		Route::get('edit/{id}', 'Admin\RoleController@edit')->name('admin_role_edit');
		Route::post('update/{id}', 'Admin\RoleController@update')->name('admin_role_update');
		Route::post('delete/{id}', 'Admin\RoleController@destroy')->name('admin_role_delete');
	});
	//Category
	Route::group(['prefix'=>'category'],function()
	{
		Route::get('list', 'Admin\CategoryController@index')->name('admin_category_list');
		Route::get('create', 'Admin\CategoryController@create')->name('admin_category_create');
		Route::post('store', 'Admin\CategoryController@store')->name('admin_category_store');
		Route::get('edit/{id}', 'Admin\CategoryController@edit')->name('admin_category_edit');
		Route::post('update/{id}', 'Admin\CategoryController@update')->name('admin_category_update');
		Route::post('delete/{id}', 'Admin\CategoryController@destroy')->name('admin_category_delete');
	});


	//Article
	Route::group(['prefix'=>'article'],function()
	{
		Route::get('list', 'Admin\ArticleController@index')->name('admin_article_list');
		Route::get('create', 'Admin\ArticleController@create')->name('admin_article_create');
		Route::post('store', 'Admin\ArticleController@store')->name('admin_article_store');
		Route::get('edit/{id}', 'Admin\ArticleController@edit')->name('admin_article_edit');
		Route::post('update/{id}', 'Admin\ArticleController@update')->name('admin_article_update');
		Route::post('delete/{id}', 'Admin\ArticleController@destroy')->name('admin_article_delete');
		Route::get('change/{id}', 'Admin\ArticleController@changeQualification')->name('admin_article_change');
	});

	//Comment
	Route::group(['prefix'=>'comment'],function()
	{
		Route::get('list', 'Admin\CommentController@index')->name('admin_comment_list');
		Route::get('create', 'Admin\CommentController@create')->name('admin_comment_create');
		Route::post('store', 'Admin\CommentController@store')->name('admin_comment_store');
		Route::get('edit/{id}', 'Admin\CommentController@edit')->name('admin_comment_edit');
		Route::post('update/{id}', 'Admin\CommentController@update')->name('admin_comment_update');
		Route::post('delete/{id}', 'Admin\CommentController@destroy')->name('admin_comment_delete');
	});

	//Notification
	Route::group(['prefix'=>'noti'],function()
	{
		Route::get('list', 'Admin\NotificationController@index')->name('admin_noti_list');
		Route::get('allread', 'Admin\NotificationController@setAllAsRead')->name('admin_noti_allread');
		Route::get('read/{id}', 'Admin\NotificationController@setAsRead')->name('admin_noti_read');
		Route::get('delete/{id}', 'Admin\NotificationController@destroy')->name('admin_noti_delete');
	});

	//Videos
	Route::get('video/list', 'Admin\VideoController@index')->name('admin_video_list');
	Route::get('video/create', 'Admin\VideoController@create')->name('admin_video_create');
	Route::post('video/store', 'Admin\VideoController@store')->name('admin_video_store');
	Route::get('video/edit/{id}', 'Admin\VideoController@edit')->name('admin_video_edit');
	Route::post('video/update/{id}', 'Admin\VideoController@update')->name('admin_video_update');
	Route::post('video/delete/{id}', 'Admin\VideoController@destroy')->name('admin_video_delete');
});

//Author Routing
Route::group(['prefix'=>'author', 'middleware'=>['auth']],function()
{
	Route::get('index', function() {
		return view('layouts.author.layout');
	})->name('author_index');
	Route::get('list', 'Author\AuthorController@index')->name('author_list');
	Route::get('create', 'Author\AuthorController@create')->name('author_create');
	Route::post('store', 'Author\AuthorController@store')->name('author_store');
	Route::get('edit/{id}', 'Author\AuthorController@edit')->name('author_edit');
	Route::post('update/{id}', 'Author\AuthorController@update')->name('author_update');
	Route::post('delete/{id}', 'Author\AuthorController@destroy')->name('author_delete');
});

//Home Routing
Route::group(['prefix'=>'home'],function()
	{
	Route::get('index', 'Home\MainController@index')->name('home_index');
	Route::get('main', 'Home\MainController@getData')->name('home_main');
	Route::post('main/search', 'Home\MainController@search')->name('home_search');

	Route::get('news/category/{id}', 'Home\MainController@getNewsByCategory')->name('home_news_byCategory');
	Route::get('news/{id}', 'Home\MainController@getNewsDetail')->name('home_newsDetail');
	Route::get('news/comment_delete/{id}', 'Admin\CommentController@deleteByUser')->name('home_newsDetail_comment_delete');

	Route::get('profile/view', 'Home\UserProfileController@index')->name('home_profile_view');
	Route::get('profile/edit/{id}', 'Home\UserProfileController@edit')->name('home_profile_edit');
	Route::post('profile/update/{id}', 'Home\UserProfileController@update')->name('home_profile_update');

	Route::get('changepass/view','Home\ChangePasswordController@index')->name('home_changepassword_view');
	Route::post('changepass/save','Home\ChangePasswordController@store')->name('home_changepassword_save');

	Route::get('videolist', 'Home\MainController@videoList')->name('home_video_list');
	Route::get('video/{id}', 'Home\MainController@showVideo')->name('home_video_show');
});

//Reviewer Routing
Route::group(['prefix'=>'reviewer', 'middleware'=>['auth']],function() {
	Route::get('index', function() {
		return view('layouts.reviewer.layout');
	})->name('reviewer_index');
	Route::get('list', 'Reviewer\ReviewerController@index')->name('reviewer_list');
	Route::post('delete/{id}', 'Reviewer\ReviewerController@destroy')->name('reviewer_delete');
	Route::get('change/{id}', 'Reviewer\ReviewerController@changeQualification')->name('reviewer_change');
});
