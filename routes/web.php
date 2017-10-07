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

use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::get('/', 'FrontController@index')->name('home');
Route::get('/shirts', 'FrontController@shirts')->name('shirts');
Route::get('/shirt', 'FrontController@shirt')->name('shirt');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/logout', 'auth\LoginController@logout')->name('home');

Route::group(['prefix'=>'admin','middleware'=>['auth','admin']], function()
{
    Route::get('/',function ()
    {
        return view('admin.index');
    })->name('admin.index');
    Route::resource('product','ProductsController');
    Route::resource('category','CategoriesController');
    Route::get('orders/{type?}','OrderController@Orders');

    Route::post('toggledeliver/{orderId}','OrderController@toggledeliver')->name('toggle.deliver');
    Route::post('toggledeliver/undo/{orderId}','OrderController@toggleUnoDeliver')->name('toggle.undoDeliver');

});
Route::resource('/cart','CartController');
//Route::resource('/address','AddressController');
Route::post('/address/store','AddressController@store');


Route::get('/admin/product/create','ProductsController@create');
Route::post('/admin/product/store','ProductsController@store');
Route::get('/admin/product/index','ProductsController@index')->name('product.index');

Route::get('/admin/category','CategoriesController@index');
Route::post('/admin/category/store','CategoriesController@store');

Route::get('/admin/category/{category}' , 'CategoriesController@showIndividualProduct');



Route::get('/cart/add-items/{id}','CartController@addItem')->name('cart.addItem');

//Route::get('/checkout','CheckoutController@step1');

Route::group(['middleware'=>'auth'], function()
{
    Route::get('/shipping-info','CheckoutController@shipping');
});



Route::get('/payment','CheckoutController@payment')->name('checkout.payment');

Route::post('/payment','CheckoutController@paymentTest')->name('lastStage.payment');
Route::get('/charge','CheckoutController@chargeAgain')->name('chargeAgain.payment');//TODO: the route is actually 'api/charge'

//Route::get('/charge','CheckoutController@chargeAgain'); //disabled currently

//Route::get('/test', 'FrontController@test');
