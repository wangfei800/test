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

Route::get('/add', 'HomeController@add')->name('add');

Route::get('/edit', 'HomeController@edit')->name('edit');

Route::post('/store', 'HomeController@store')->name('store');

Route::post('/update', 'HomeController@update')->name('update');


Route::get('/logout', function () {
    return redirect('home/');
});