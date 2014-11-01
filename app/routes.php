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

Route::get('styleguide', function(){
    return View::make('styleguide');
});

Route::group(array('prefix' => 'admin', 'before'=>'auth'), function()
{

    Route::get('createPage', array(
    	'as'		=>	'page.create',
		'uses'		=>	'PageController@create'
    ));

    Route::post('createPage', array(
    	'as'		=>	'page.store',
		'uses'		=>	'PageController@store'
    ));

});

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

Route::get('/{section}/{subsection?}/{page?}', array(
    'uses'      =>  'pageNavigationController@resolve'
));