<?php

Route::get('/', function () {
    return view('home');
});
Route::get('/shop', function(){
	return view('shop');
});

Route::get('/shop/a/{id}', function($id){
		return view('a')->with('itemID',$id);
});

Route::get('/b/{id}', function($id){
	return view('b')->with('itemID',$id);
});
Route::resource('/b', 'PostController');

Route::resource('/profile', 'UserController');

Route::get('/profile/{id}/mylist',function($id){
	return view('mylist')->with('id', $id);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

//Route::resource('/sell','PostController');
Route::get('/sell', function(){
	return view('sell');
});
Route::post('/publish', 'PostController@store');

Route::post('/bid/{id}', 'PostController@bid');
Route::get('/bid/{id}/show', function($id){
	return view('bids')->with('id',$id);
});

Route::post('/bids/{id}', 'PostController@bid_change');

Route::post('/search', 'ItemController@search');
