<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/',['uses' => 'PagesController@home' , 'as' => 'home' ]);
Route::get('user/profile','UserController@getProfile');

Route::group(['prefix' => 'question'],function(){

	Route::get('post',[ 'uses' => 'ForumController@getPost','as' => 'get_post']);
	Route::get('post/{slug}',['uses' => 'ForumController@viewPost','as'=>'view_post']);

	Route::post('post',[ 'uses' => 'ForumController@postQuestion','as' => 'post_question']);
	Route::post('reply',['uses' => 'ForumController@saveReply','as' => 'save_reply' ]);
	Route::get('delete-post/{id}','ForumController@deletePost');
	Route::post('delete-post/{id}','ForumController@deletePost');
	Route::get('edit-post/{id}','ForumController@editPost');
	Route::post('edit-post/{id}',['uses' => 'ForumController@updatePost', 'as' => 'post.update']);
	Route::get('edit-reply/{id}','ForumController@editReply');
	Route::post('edit-reply/{id}','ForumController@updateReply');
	Route::get('delete-reply/{id}','ForumController@deleteReply');
	Route::post('delete-reply/{id}','ForumController@deleteReply');


});


Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::auth();

Route::get('/home', 'HomeController@index');

Route::group(['middleware' => 'admin'],function(){
	Route::get('delete-post/{id}','ForumController@deletePost');
	Route::post('delete-post/{id}','ForumController@deletePost');
	Route::get('edit-post/{id}','ForumController@editPost');
	Route::post('edit-post/{id}',['uses' => 'ForumController@updatePost', 'as' => 'post.update']);
	Route::get('edit-reply/{id}','ForumController@editReply');
	Route::post('edit-reply/{id}','ForumController@updateReply');
	Route::get('delete-reply/{id}','ForumController@deleteReply');
	Route::post('delete-reply/{id}','ForumController@deleteReply');
});
