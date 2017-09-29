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


Route::get('/', 'FrontController@index')->name('home');
Route::get('/shirts', 'FrontController@shirts')->name('shirts');
Route::get('/shirt', 'FrontController@shirt')->name('shirt');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/logout', 'auth\LoginController@logout')->name('home');

Route::group(['prefix'=>'admin','middleware'=>'auth'], function()
{
    Route::get('/',function ()
    {
        return view('admin.index');
    })->name('admin.index');
});


//panditi a bit
Route::get('/admin/product/create','ProductsController@create');
Route::post('/admin/product/store','ProductsController@store');
Route::get('/admin/product/index','ProductsController@index');

