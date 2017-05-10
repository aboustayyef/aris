<?php

use Illuminate\Http\Request;

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

/**************************************************************
DEV STUFF - NOT FOR PUBLIC
**************************************************************/

Route::get('sectionsReference', function()
{
    return view('sections');
});

Route::get('styleguide', function(){
    return view('styleguide');
});

Route::get('test', function(){
    return view('editor');
});

/**************************************************************
NEWS
**************************************************************/
Route::resource('news', 'NewsController');

/**************************************************************
PEOPLE
**************************************************************/
Route::get('/people/{who?}', function($who){
	return $who;
});

/**************************************************************
SEARCH
**************************************************************/
Route::get('search', array(
    'as'    =>  'search',
    'uses'  =>  'SearchController@index'
));


/**************************************************************
AUTHENTICATION
**************************************************************/

// USERS
Auth::routes();
Route::get('logout', function(){
	Auth::logout();
	return redirect('/');
});

// ROLES
Route::resource('rolelogin', 'RoleSessionsController', ['only'=>['store','create']]);
Route::get('rolelogout', 'RoleSessionsController@destroy');


/**************************************************************
PAGES
**************************************************************/

// HOME PAGE
Route::get('/', function(){
	return redirect('/home');
});
Route::get('/home', function(){
    return view('home');
});


// OTHER PAGES
Route::get('/{section}/{subsection?}/{page?}/{subpage?}', array(
    'uses'      =>  'pageNavigationController@resolve'
));