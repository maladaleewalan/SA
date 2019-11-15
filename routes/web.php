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
Route::resource('/users','UsersController');
Route::resource('/bills','BillsController');

Route::get('/books/create/{id}','BooksController@createbookmarket')->name('books.createbookmarket');
Route::post('/books/store/{id}','BooksController@storebookmarket')->name('books.storebookmarket');

Route::get('/bills/create/{id}','BillsController@createbillforbook')->name('bills.createbillforbook');
Route::post('/bills/store/{id}','BillsController@storebillforbook')->name('bills.storebillforbook');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
