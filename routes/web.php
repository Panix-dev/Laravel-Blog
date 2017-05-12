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
Route::get('bachelor-party', 'PagesController@getBachelor');
Route::get('ekdiloseis-xoroi', 'PagesController@getEkdiloseisxoroi');
Route::get('etairikes-ekdiloseis', 'PagesController@getEtairikesEkdiloseis');

Route::get('contact', 'PagesController@getContact');
Route::post('contact', 'PagesController@postContact');

Route::get('blog/{slug}', array('uses' => 'BlogController@getSingle', 'as' => 'blog.single'))->where('slug', '[\w\d\-\_]+');
Route::get('blog', array('uses' => 'BlogController@getIndex', 'as' => 'blog.index'));

Route::resource('posts', 'PostController');

Route::resource('artists', 'ArtistController', array('except' => array('show')));
Route::get('artists/{slug}', array('uses' => 'ArtistController@show', 'as' => 'artists.show'))->where('slug', '[\w\d\-\_]+');

Route::resource('items', 'ItemController', array('except' => array('show')));
Route::get('items/{slug}', array('uses' => 'ItemController@show', 'as' => 'items.show'))->where('slug', '[\w\d\-\_]+');

Route::resource('categories', 'CategoryController', array('except' => array('create')));

Route::resource('tags', 'TagController', array('except' => array('create'), 'except' => array('show')));
Route::get('tags/{slug}', array('uses' => 'TagController@show', 'as' => 'tags.show'))->where('slug', '[\w\d\-\_]+');

Route::resource('itags', 'ItagController', array('except' => array('create'), 'except' => array('show')));
Route::get('itags/{slug}', array('uses' => 'ItagController@show', 'as' => 'itags.show'))->where('slug', '[\w\d\-\_]+');

Route::post('comments/{post_id}', array('uses' => 'CommentsController@store', 'as' => 'comments.store'));
Route::get('comments/{id}', array('uses' => 'CommentsController@edit', 'as' => 'comments.edit'));
Route::put('comments/{id}', array('uses' => 'CommentsController@update', 'as' => 'comments.update'));
Route::delete('comments/{id}', array('uses' => 'CommentsController@destroy', 'as' => 'comments.destroy'));
Route::get('comments/{id}/delete', array('uses' => 'CommentsController@delete', 'as' => 'comments.delete'));

Route::post('newsletter', 'NewsletterController@newsletter');

Route::get('pistes/{slug}', array('uses' => 'PistesController@getSingle', 'as' => 'pistes.single'))->where('slug', '[\w\d\-\_]+');
Route::get('pistes', array('uses' => 'PistesController@getIndex', 'as' => 'pistes.index'));

Route::get('clubs/{slug}', array('uses' => 'ClubsController@getSingle', 'as' => 'clubs.single'))->where('slug', '[\w\d\-\_]+');
Route::get('clubs', array('uses' => 'ClubsController@getIndex', 'as' => 'clubs.index'));

Route::get('bars/{slug}', array('uses' => 'BarsController@getSingle', 'as' => 'bars.single'))->where('slug', '[\w\d\-\_]+');
Route::get('bars', array('uses' => 'BarsController@getIndex', 'as' => 'bars.index'));

Auth::routes();
