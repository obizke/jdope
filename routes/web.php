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

Route::get('/','Juben\PagesController@index');
Route::get('/shop','Juben\PagesController@shop');
Route::get('/shop/{slug}','Juben\PagesController@single');
Route::get('/contact','Juben\PagesController@contact');

Route::resource('contacts', 'Juben\ContactsController');
//cart
Route::get('/shopping-cart', [
    'uses' => 'CartController@getcart',
    'as'=>'product.shoppingcart'
    ]);
Route::get('/shoppingcheckout', [
  'uses' => 'CartController@checkout',
  'as'=>'product.checkout'
]);


Route::post('/add', 'CartController@add')->name('cart.store');
Route::post('/update', 'CartController@update')->name('cart.update');
Route::post('/remove', 'CartController@remove')->name('cart.remove');
Route::post('/clear', 'CartController@clear')->name('cart.clear');
Route::post('/cart_order', 'CartController@store')->name('cart.order');
Route::get('/mpesaonline', 'MpesaController@mpesaCheckout')->name('mpesa.payment');
Auth::routes(['verify' => true]);
Route::group(['middleware'=>['auth','admin','verified']],function(){
  Route::get('/home', 'HomeController@index');
  Route::resource('abouts', 'AboutController');
  Route::resource('products', 'ProductController');
  Route::resource('sliders', 'SliderController');
  Route::resource('trends', 'TrendsController');
  Route::resource('orders', 'OrderController');
  Route::get('orders/{order}/printpdf','OrderController@export_pdf')->name('pdf.export');

  

});
Route::group(['middleware'=>['auth','verified']],function(){
      Route::get('/client', 'OrderController@usersOrders')->name('client.index');
});
