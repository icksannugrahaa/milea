<?php

Route::get('/home', 'OfficerController@index')->name('officer.home');
Route::get('/', 'Officer\LoginController@showLoginForm')->name('officer.login');
Route::post('/', 'Officer\LoginController@Login');


Route::get('/book', 'BookController@index')->name('books');
Route::get('/book/ubah/{id}', 'BookController@edit')->name('book.edit');
Route::post('/book/ubah/{id}', 'BookController@update')->name('book.update');
Route::get('/book/hapus/{id}', 'BookController@destroy')->name('book.destroy');
Route::get('/book/tambah', 'BookController@create')->name('book.create');
Route::post('/book/tambah', 'BookController@store')->name('book.store');
Route::get('/book/paginate', 'BookController@fetch_data')->name('book.paginate');

Route::get('/manajemen-user/user', 'UserController@index')->name('user.management');
Route::post('/manajemen-user/user/resetpass/{id}', 'UserController@resetPassword')->name('user.reset');
Route::get('/manajemen-user/user/hapus/{id}', 'UserController@destroy')->name('user.destroy');
Route::get('/manajemen-user/user/paginate', 'UserController@fetch_data')->name('user.paginate');
