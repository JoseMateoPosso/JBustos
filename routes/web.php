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

Route::get('/clear-cache', function () {
	$code = Artisan::call('cache:clear');
	$code = Artisan::call('view:clear');
	//$code = Artisan::call('route:clear');
	$code = Artisan::call('config:cache');
	return 'cache cleared';
});

Route::group(['middleware' => 'auth'], function () {

	Route::get('/', function () {
		return view('welcome');
	});

	Route::get('/sedes', function () {
		return view('sedes');
	})->name('sedes');

	Route::get('/pages', function () {
		return view('pages');
	})->name('pages');

	Route::get('/models', function () {
		return view('models');
	})->name('models');

	Route::get('/nicks', function () {
		return view('nicks');
	})->name('nicks');

	Route::get('/eps', function () {
		return view('eps');
	})->name('eps');

	Route::get('/arl', function () {
		return view('arl');
	})->name('arl');

	Route::get('/afp', function () {
		return view('afp');
	})->name('afp');

	Route::get('/banco', function () {
		return view('banco');
	})->name('banco');

	Route::get('/rules', function () {
		return view('rules');
	})->name('rules');

	Route::get('/request', function () {
		return view('request');
	})->name('request');

	Route::resource('sede', 'SedesController', ['except' => ['show']]);
	Route::resource('category', 'CategoriesController', ['except' => ['show']]);
	Route::resource('page', 'PageController', ['except' => ['show']]);
	Route::resource('model', 'ModelController', ['except' => ['show']]);
	Route::resource('facturationrule', 'FacturationRuleController', ['except' => ['show']]);
	Route::resource('nick', 'NickController', []);
	Route::resource('sales', 'SalesController', []);
	Route::resource('basicinfo', 'BasicInformationController', []);
	Route::get('/home', 'HomeController@index')->name('home');
	Route::post('/uploadsale', 'SalesController@import')->name('uploadsale');
	Route::post('/liquidar', 'SalesController@liquidar')->name('uploadsale');
	Route::post('/categorybytype', 'CategoriesController@categoriesByType');
	Route::post('/basicinformationbyc', 'BasicInformationController@basicinformationbyc');
	Route::get('/ilquidarT', 'SalesConsolidateController@Liquidar')->name('liquidar');

	Route::resource('requestList', 'SolicitController', ['except' => ['show']]);
	Route::post('commentListbyc', 'RequestCommentController@commentListbyc');
});
