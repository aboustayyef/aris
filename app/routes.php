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
    'uses'        =>  'adminController@index'
));

// session management. Login & logout
Route::get('login', ['uses'=>'sessionsController@create']);
Route::get('logout', ['uses'=>'sessionsController@destroy']);
Route::resource('session', 'sessionsController', ['only'=>['store','create','destroy']]);


// pages (admin)
Route::resource('pages', 'PageController');

// news
Route::resource('news', 'NewsController');

// Ajax
Route::get('ajaxEditSections/{id}', function($id){
	if (Auth::check()) {
		if (Section::find($id)) {
			return Aris\Ajax::renderTableViewOfPagesInSection($id);
		}
	}
	return null;
});


// pages (browsing)
Route::get('/{section}/{subsection?}/{page?}', array(
    'uses'      =>  'pageNavigationController@resolve'
));