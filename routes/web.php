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
//Category
Route::get('admin/category/list', 'Admin\CategoryController@index')->name('admin_category_list');
Route::get('admin/category/create', 'Admin\CategoryController@create')->name('admin_category_create');
Route::post('admin/category/store', 'Admin\CategoryController@store')->name('admin_category_store');
Route::get('admin/category/edit/{id}', 'Admin\CategoryController@edit')->name('admin_category_edit');
Route::post('admin/category/update/{id}', 'Admin\CategoryController@update')->name('admin_category_update');
Route::post('admin/category/delete/{id}', 'Admin\CategoryController@destroy')->name('admin_category_delete');

//Article
Route::get('admin/article/list', 'Admin\ArticleController@index')->name('admin_article_list');
Route::get('admin/article/create', 'Admin\ArticleController@create')->name('admin_article_create');
Route::post('admin/article/store', 'Admin\ArticleController@store')->name('admin_article_store');
Route::get('admin/article/edit/{id}', 'Admin\ArticleController@edit')->name('admin_article_edit');
Route::post('admin/article/update/{id}', 'Admin\ArticleController@update')->name('admin_article_update');
Route::post('admin/article/delete/{id}', 'Admin\ArticleController@destroy')->name('admin_article_delete');

//Comment
Route::get('admin/comment/list', 'Admin\CommentController@index')->name('admin_comment_list');
Route::get('admin/comment/create', 'Admin\CommentController@create')->name('admin_comment_create');
Route::post('admin/comment/store', 'Admin\CommentController@store')->name('admin_comment_store');
Route::get('admin/comment/edit/{id}', 'Admin\CommentController@edit')->name('admin_comment_edit');
Route::post('admin/comment/update/{id}', 'Admin\CommentController@update')->name('admin_comment_update');
Route::post('admin/comment/delete/{id}', 'Admin\CommentController@destroy')->name('admin_comment_delete');




//Author Routing
Route::get('author/index', 'Author\AuthorController@index')->name('author_index');
Route::get('author/list', 'Author\AuthorController@index')->name('author_list');
Route::get('author/create', 'Author\AuthorController@create')->name('author_create');
Route::post('author/store', 'Author\AuthorController@store')->name('author_store');
Route::get('author/edit/{id}', 'Author\AuthorController@edit')->name('author_edit');
Route::post('author/update/{id}', 'Author\AuthorController@update')->name('author_update');
Route::post('author/delete/{id}', 'Author\AuthorController@destroy')->name('author_delete');

//Home Routing
Route::get('home/index', 'Home\MainController@index')->name('home_index');
Route::get('home/main', 'Home\MainController@getData')->name('home_main');
Route::post('home/main/search', 'Home\MainController@searchPost')->name('home_search');

Route::get('home/news', 'Home\MainController@getNews')->name('home-news');
Route::get('home/news/{id}', 'Home\MainController@getNewsDetail')->name('home_newsDetail');
Route::get('home/news_category/{slug}', 'Home\MainController@getNewsByCategory')->name('home-news_category');
Route::get('home/news_tags/{tag}', 'Home\MainController@getNewsByTag')->name('home_news_tag');

Route::get('home/profile/view', 'Home\UserProfileController@index')->name('home_profile_view');
Route::get('home/profile/edit/{id}', 'Home\UserProfileController@edit')->name('home_profile_edit');
Route::post('home/profile/update/{id}', 'Home\UserProfileController@update')->name('home_profile_update');

Route::get('home/changepass/view','Home\ChangePasswordController@index')->name('home_changepassword_view');
Route::post('home/changepass/save','Home\ChangePasswordController@store')->name('home_changepassword_save');

