<?php

Route::get('/', function () {
    return view('home');
});
Route::get('/shop', function(){
	return view('shop');
});
Route::get('/shop/{id}', array('uses'=>'ItemController@showList'));


Route::get('/shop/a/{id}', function($id){
		return view('a')->with('itemID',$id);
});

Route::get('/sell', function(){
	return view('sell');
});
Route::resource('/profile', 'UserController');
Route::resource('/profile/{id}/edit', 'ProfileController');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');


//Route::resource('/sell','PostController');


Route::get('/create', 'PostController@create');
Route::post('/publish', 'PostController@store');


Route::get('/profile/{userName}/mylist',function($userName){
	return view('mylist')->with('userName',$userName);
});