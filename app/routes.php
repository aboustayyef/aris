<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('home');
});


Route::get('/admin/createPage', array(
	'before'	=>	'auth',
	'as'		=>	'page.create',
	'uses'		=>	'PageController@create'
));

Route::post('/admin/createPage', array(
	'before'	=>	'auth',
	'as'		=>	'page.store',
	'uses'		=>	'PageController@store'
));


Route::get('/{section}/{subsection}/{page?}', array(
	'uses'		=>	'pageNavigationController@resolve'
));

// session management. Login & logout

Route::get('login', ['uses'=>'sessionsController@create']);
Route::get('logout', ['uses'=>'sessionsController@destroy']);
Route::resource('session', 'sessionsController', ['only'=>['store','create','destroy']]);

/**
 * Produces a reference sheet for sections
 */
Route::get('sectionsReference', function()
{
	return View::make('sections');
});