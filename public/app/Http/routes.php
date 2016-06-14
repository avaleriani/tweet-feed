<?php

/**
 * Show Index
 */
Route::get('/', 'TwitterController@index');


/**
 * Fetch user timeline
 */
Route::post('/getTweets', 'TwitterController@getTweets');
Route::post('/getMoreTweets', 'TwitterController@getMoreTweets');
