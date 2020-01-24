<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

/**
 * GET ROUTES
 */
Route::get('/index', 'IndexController@getAction')
    ->name('index');

Route::get('/fizz-buzz', 'IndexController@fizzbuzzAction')
    ->name('fizz-buzz');

Route::get('/element', 'IndexController@arrayAction')
    ->name('element');

Route::get('/db-connectivity', 'IndexController@databaseGetAction')
    ->name('db-connectivity');

Route::get('/lottery', 'IndexController@lotteryAction')
    ->name('lottery');

Route::get('/a-b-test', 'IndexController@abTestAction')
    ->name('a-b-test');

/**
 * POST ROUTES
 */

