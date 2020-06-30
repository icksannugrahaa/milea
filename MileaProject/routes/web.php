<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', 'PageController@index');
Route::get('/about', 'PageController@about');
Route::get('/login', 'PageController@login');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('officer')->group(base_path('routes/officer.php'));

Route::get('/books/{order}', 'PageController@showall')->name('books.show');
Route::get('/books/{order}/paginate', 'PageController@fetch_data')->name('books.paginate');
Route::get('/{judul}', 'PageController@show')->name('book.show');
