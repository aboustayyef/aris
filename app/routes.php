<?php

/***************************************************************/
/***  Dev Stuff  ******************************/
Route::get('sectionsReference', function()
{
    return View::make('sections');
});

Route::get('styleguide', function(){
    return View::make('styleguide');
});

/***************************************************************/
/***************************************************************/


Route::get('/', function()
{
    return View::make('home');
});

Route::get('search', array(
    'as'    =>  'search',
    'uses'  =>  'SearchController@index'
));

Route::get('admin', array(
    'as'          =>  'admin.index',
    'before'      =>  'auth',
    'uses'        =>  'AdminController@index'
));

Route::get('rss', array(
    'as'        =>  'rss.index',
    'uses'      =>  'RssController@index'
));

Route::get('feed', function(){
    return \Redirect::action('RssController@index');
});

// session management. Login & logout
Route::get('login', ['as'=>'login', 'uses'=>'sessionsController@create']);
Route::get('logout', ['uses'=>'sessionsController@destroy']);
Route::resource('session', 'sessionsController', ['only'=>['store','create','destroy']]);

// role session management;
Route::resource('rolelogin', 'roleSessionsController', ['only'=>['store','create']]);
Route::get('rolelogout', 'roleSessionsController@destroy');

// pages (admin)
Route::resource('pages', 'PageController');

// news
Route::resource('news', 'NewsController');

// people 
Route::get('people/admin', 'PeopleController@adminIndex');
Route::get('people/faculty', 'PeopleController@facultyIndex');
Route::get('people/staff', 'PeopleController@staffIndex');
Route::resource('people', 'PeopleController');


// pages (browsing)
Route::get('/{section}/{subsection?}/{page?}/{subpage?}', array(
    'uses'      =>  'pageNavigationController@resolve'
));