<?php


Route::get('/home', 'OfficerController@index')->name('officer.home');
Route::get('/', 'Officer\LoginController@showLoginForm')->name('officer.login');
Route::post('/', 'Officer\LoginController@Login');
