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
    return View::make('home')->with('title', 'Al-Rayan International School - Ghana');
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

// session management. Login & logout
Route::get('login', ['uses'=>'sessionsController@create']);
Route::get('logout', ['uses'=>'sessionsController@destroy']);
Route::resource('session', 'sessionsController', ['only'=>['store','create','destroy']]);


// pages (admin)
Route::resource('pages', 'PageController');

// news
Route::get('news', function(){
    return Redirect::away('http://news.aris.edu.gh');
});

// pages (browsing)
Route::get('/{section}/{subsection?}/{page?}', array(
    'uses'      =>  'pageNavigationController@resolve'
));