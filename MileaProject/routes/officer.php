<?php


Route::get('/home', 'OfficerController@index')->name('officer.home');
Route::get('/', 'Officer\LoginController@showLoginForm')->name('officer.login');
Route::post('/', 'Officer\LoginController@Login');


Route::get('/book', 'BookController@index')->name('books');
Route::get('/book/ubah/{id}', 'BookController@edit')->name('book.ubah');
Route::post('/book/ubah/{id}', 'BookController@update')->name('book.update');
Route::get('/book/hapus/{id}', 'BookController@destroy')->name('book.hapus');
Route::get('/book/tambah', 'BookController@create')->name('book.tambah');
Route::post('/book/tambah', 'BookController@store')->name('book.simpan');
