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

get('product/admin', 'ProductController@admin');

get('/', 'ProductController@index');

get('/search={q}', 'ProductController@filterIndex');

get('home', function(){
	return redirect('/');
});

get('product', function(){
	return redirect('/');
});

get('product/create', 'ProductController@create');

get('product/{slug}', 'ProductController@show');

get('login', 'LoginController@index');



// Admin Routes 

get('admin', 'AdminController@index');

get('product/admin/search',['uses' => 'ProductController@searchAdmin','as' => 'search']);

get('admin/create', 'AdminController@create');

get('admin/{slug}/edit', 'AdminController@edit');

get('admin/{slug}/showUser', 'AdminController@showUser');

patch('admin/{slug}', 'AdminController@update');

get('admin/show', 'AdminController@show');

delete('admin/{slug}', 'AdminController@destroy');

post('admin/verify', 'AdminController@verify');


// product Routes

get('product/create', 'ProductController@create');

post('product', 'ProductController@store');

post('home', 'AdminController@store');

get('/search',['uses' => 'ProductController@search','as' => 'search']);

//get('search={slug}', 'ProductController@search');

get('product/{slug}/edit', 'ProductController@edit');

patch('product/{slug}', 'ProductController@update');

delete('product/{slug}', 'ProductController@destroy');

post('product/verify', 'ProductController@verify');


// category Routes

get('category', 'CategoryController@index');

get('category/{slug}/edit', 'CategoryController@edit');

patch('category/{slug}', 'CategoryController@update');

delete('category/{slug}', 'CategoryController@destroy');

post('category', 'CategoryController@store');

post('category/verify', 'CategoryController@verify');


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
