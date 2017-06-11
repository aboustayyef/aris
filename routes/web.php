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
    return \Aris\News::all();
});

/**************************************************************
AUTHENTICATION
**************************************************************/

// USERS
Auth::routes();


Route::get('logout', function(){
	Auth::logout();
	return redirect('/');
});

/**************************************************************
NEWS
**************************************************************/
Route::resource('news', 'NewsController');

/**************************************************************
PEOPLE
**************************************************************/
Route::get('people/{id}/edit', ['uses'=>'PeopleController@edit', 'as' => 'people.edit']);
Route::get('people/{category}/{slug}', ['uses'=>'PeopleController@person', 'as' => 'people.person']);
Route::resource('people', 'PeopleController');

/**************************************************************
SEARCH
**************************************************************/
Route::get('search', array(
    'as'    =>  'search',
    'uses'  =>  'SearchController@index'
));



// ROLES
Route::resource('rolelogin', 'RoleSessionsController', ['only'=>['store','create']]);
Route::get('rolelogout', 'RoleSessionsController@destroy');


/**************************************************************
PAGES
**************************************************************/

// HOME PAGE
Route::get('/', function(){
    return view('home');
});

// Edit Pages (Nodes)

// Read Pages (Nodes)
Route::get('/{section}/{subsection?}/{page?}/{subpage?}', array(
    'uses'      =>  'pageNavigationController@resolve'
));