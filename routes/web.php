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

use Illuminate\Http\Request;

Route::get('/', function () {
    return view('main');
});

// route to process the form
//Route::post('login', array('uses' => 'HomeController@doLogin'));

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/view/{userId}', 'HomeController@view')->name('view');

Route::get('/add', 'HomeController@add')->name('add');

Route::get('/edit/{id?}', 'HomeController@edit')->name('edit');

Route::get('/addAddress/{userId}', 'AddressController@add')->name('addAddress');

Route::get('/editAddress/{userId}/{addressId}', 'AddressController@edit')->name('editAddress');

Route::post('/store', 'HomeController@store')->name('store');

Route::post('/storeAddress/{userId}', 'AddressController@store')->name('storeAddress');

Route::post('/update', 'HomeController@update')->name('update');

Route::post('/updateAddress/{userId}/{addressId}', 'AddressController@update')->name('updateAddress');


Route::get('/logout', function () {
    return redirect('home/');
});