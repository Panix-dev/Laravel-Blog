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

Route::get('/', 'PagesController@getIndex');

Route::get('about', 'PagesController@getAbout');

Route::get('contact', 'PagesController@getContact');
Route::post('contact', 'PagesController@postContact');

Route::get('blog/{slug}', array('uses' => 'BlogController@getSingle', 'as' => 'blog.single'))->where('slug', '[\w\d\-\_]+');
Route::get('blog', array('uses' => 'BlogController@getIndex', 'as' => 'blog.index'));

Route::resource('posts', 'PostController');

Route::resource('categories', 'CategoryController', array('except' => array('create')));

Route::resource('tags', 'TagController', array('except' => array('create')));

Route::post('comments/{post_id}', array('uses' => 'CommentsController@store', 'as' => 'comments.store'));
Route::get('comments/{id}', array('uses' => 'CommentsController@edit', 'as' => 'comments.edit'));
Route::put('comments/{id}', array('uses' => 'CommentsController@update', 'as' => 'comments.update'));
Route::delete('comments/{id}', array('uses' => 'CommentsController@destroy', 'as' => 'comments.destroy'));
Route::get('comments/{id}/delete', array('uses' => 'CommentsController@delete', 'as' => 'comments.delete'));

Auth::routes();
