<?php

use Illuminate\Http\Request;

/**
 * Show Index
 */
Route::get('/', 'TwitterController@index')->name('index');


/**
 * Fetch user timeline
 */
Route::post('/getTweets', function (Request $request) {
	return redirect('/fetch/');
});
