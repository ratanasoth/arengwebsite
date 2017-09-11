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

Route::get('/',"HomeController@index");

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// user route
Route::get('/user', "UserController@index");
Route::get('/user/profile', "UserController@load_profile");
Route::get('/user/reset-password', "UserController@reset_password");
Route::post('/user/change-password', "UserController@change_password");
Route::get('/user/finish', "UserController@finish_page");
Route::post('/user/update-profile', "UserController@update_profile");
Route::get('/user/delete/{id}', "UserController@delete");
Route::get('/user/create', "UserController@create");
Route::post('/user/save', "UserController@save");
Route::get('/user/edit/{id}', "UserController@edit");
Route::post('/user/update', "UserController@update");
Route::get('/user/update-password/{id}', "UserController@load_password");
Route::post('/user/save-password', "UserController@update_password");
Route::get('/user/branch/{id}', "UserController@branch");
Route::post('/user/branch/save', "UserController@add_branch");
Route::get('/user/branch/delete/{id}', "UserController@delete_branch");
// role
Route::get('/role', "RoleController@index");
Route::get('/role/create', "RoleController@create");
Route::post('/role/save', "RoleController@save");
Route::get('/role/delete/{id}', "RoleController@delete");
Route::get('/role/edit/{id}', "RoleController@edit");
Route::post('/role/update', "RoleController@update");
Route::get('/role/permission/{id}', "PermissionController@index");
Route::post('/rolepermission/save', "PermissionController@save");
// branch
Route::get('/branch', "BranchController@index");
Route::get('/branch/create', "BranchController@create");
Route::post('/branch/save', "BranchController@save");
Route::get('/branch/delete/{id}', "BranchController@delete");
Route::get('/branch/edit/{id}', "BranchController@edit");
Route::post('/branch/update', "BranchController@update");
// Social
Route::get('/social', "SocialController@index");
Route::get('/social/create', "SocialController@create");
Route::post('/social/save', "SocialController@save");
Route::get('/social/delete/{id}', "SocialController@delete");
Route::get('/social/edit/{id}', "SocialController@edit");
Route::post('/social/update', "SocialController@update");
// Logo
Route::get('/logo', "LogoController@index");
Route::get('/logo/create', "LogoController@create");
Route::post('/logo/save', "LogoController@save");
Route::get('/logo/edit/{id}', "LogoController@edit");
Route::post('/logo/update', "LogoController@update");
// Page
Route::get('/page', "PageController@index");
Route::get('/page/create', "PageController@create");
Route::post('/page/save', "PageController@save");
Route::get('/page/delete/{id}', "PageController@delete");
Route::get('/page/edit/{id}', "PageController@edit");
Route::post('/page/update', "PageController@update");
Route::get('/page/view/{id}', "PageController@view");
// catogory
Route::get('/category', "CategoryController@index");
Route::get('/category/create', "CategoryController@create");
Route::get('/category/edit/{id}', "CategoryController@edit");
Route::get('/category/delete/{id}', "CategoryController@delete");
Route::post('/category/save', "CategoryController@save");
Route::post('/category/update', "CategoryController@update");
// slider
Route::get('/slider', "SliderController@index");
Route::get('/slider/create', "SliderController@create");
Route::get('/slider/edit/{id}', "SliderController@edit");
Route::get('/slider/delete/{id}', "SliderController@delete");
Route::post('/slider/save', "SliderController@save");
Route::post('/slider/update', "SliderController@update");
// hot news
Route::get('/hotnews', "HotNewsController@index");
Route::get('/hotnews/create', "HotNewsController@create");
Route::get('/hotnews/edit/{id}', "HotNewsController@edit");
Route::get('/hotnews/delete/{id}', "HotNewsController@delete");
Route::post('/hotnews/save', "HotNewsController@save");
Route::post('/hotnews/update', "HotNewsController@update");
// test
Route::get('/test', "TestController@index");