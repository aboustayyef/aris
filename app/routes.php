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

Route::get('login', ['uses'=>'sessionsController@create']);
Route::get('logout', ['uses'=>'sessionsController@destroy']);
Route::resource('session', 'sessionsController', ['only'=>['store','create','destroy']]);

Route::get('/secret', array('before'=>'auth', function(){
	return 'This is a secret area';
}));


/**
 * Produces a reference sheet for sections
 */
Route::get('sectionsReference', function()
{
	return View::make('sections');
});

/**
 * Tiny Mce Test
 */
Route::get('tinymce', function()
{
	return View::make('tinymce');
});