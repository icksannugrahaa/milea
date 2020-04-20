<?php


Route::get('/home', 'OfficerController@index');
Route::get('/', 'Officer\LoginController@showLoginForm')->name('officer.login');
Route::post('/', 'Officer\LoginController@Login');
