<?php

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

Route::get('/', function () {
    return view('welcome');
})->name('home');;


Route::get('/master', function() {
    return view('layouts.master');
});

Route::resource('/markets','MarketsController');
Route::resource('/books','BooksController');

Route::get('/books/create/{id}','BooksController@createbookmarket')->name('books.createbookmarket');
Route::post('/books/store/{id}','BooksController@storebookmarket')->name('books.storebookmarket');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
