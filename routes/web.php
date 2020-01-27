<?php
Route::Auth();

Route::get('/', function () {
    return view('welcome');
});

/***********************************************
 * Smart-Shop-FYP (user side)
 ***********************************************/
Route::group(['prefix' => 'user', 'as' => '.'], function () {
});
/***********************************************
 * Smart-Shop-FYP (admin side)
 ***********************************************/
Route::group(['prefix' => 'admin', 'as' => 'admin'], function () {
});