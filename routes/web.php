<?php

// use Aris\Blog;
use Aris\News;
use Aris\Slideset;
use Illuminate\Http\Request;

/**************************************************************
RSS Feeds
**************************************************************/
Route::feeds();

/**************************************************************
AUTHENTICATION
**************************************************************/

// USERS
Auth::routes();

// ADMIN
Route::get('admin', function(){
    // last ten news stories
    $news = \Aris\News::getLatest(15);
    $faculty = \Aris\People::Where('type','Faculty')->orderBy('lastname', 'asc')->get();
    $admin = \Aris\People::Where('type','Administration')->orderBy('lastname', 'asc')->get();
    $staff = \Aris\People::Where('type','Staff')->orderBy('lastname', 'asc')->get();
    return view('admin')->with(['news'=>$news , 'faculty'=>$faculty , 'staff'=>$staff , 'admin'=>$admin]);
})->middleware('auth');

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
Node Editor
**************************************************************/
Route::resource('node', 'NodeController', ['except' => [
    'create', 'index' , 'show', 'store'
]]);

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

    // get list of slides
    $slides = Slideset::getLatest(6);

    // get latest news stories
    $news = Cache::Remember('latest_news_3', 5 * 60, function(){
        return News::orderBy('public_date','desc')->take(3)->get();
    });

    // get latest blog posts (disabled)
    // $blog_posts = Blog::getLatest(4);

    return view('home')->with(compact('news'))->with(compact('slides'));
    
});

// Edit Pages (Nodes)

// Read Pages (Nodes)
Route::get('/{section}/{subsection?}/{page?}/{subpage?}', array(
    'uses'      =>  'pageNavigationController@resolve'
));

/**************************************************************
DEV STUFF - NOT FOR PUBLIC
**************************************************************/

// Route::get('sectionsReference', function()
// {
//     return view('sections');
// });

// Route::get('styleguide', function(){
//     return view('styleguide');
// });

// Route::get('test', function(){
//     return \Aris\News::all();
// });

/**************************************************************
RSS
**************************************************************/