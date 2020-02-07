<?php

use Illuminate\Support\Facades\Input;

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
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/home/category', 'Backend\CategoryController@index')->name('category');
Route::get('/home/category/create', 'Backend\CategoryController@create');
Route::post('/home/category/store', 'Backend\CategoryController@store')->name('store');
Route::get('/home/category/{id}', 'Backend\CategoryController@viewcat')->name('category-viewcat');
Route::get('/home/category/{id}/show', 'Backend\CategoryController@show')->name('category-show');
Route::get('/home/category/{id}/edit', 'Backend\CategoryController@edit')->name('category-edit');
Route::post('/home/category/{id}/update', 'Backend\CategoryController@update')->name('category-update');
Route::get('/home/category/{id}/delete', 'Backend\CategoryController@destroy')->name('category-delete');

Route::get('/home/item', 'Backend\ItemController@index')->name('item');
Route::get('/home/item/create', 'Backend\ItemController@create');
Route::post('/home/item/store', 'Backend\ItemController@store')->name('item-store');
Route::get('/home/item/{id}/show', 'Backend\ItemController@show')->name('item-show');
Route::get('/home/item/{id}/edit', 'Backend\ItemController@edit')->name('item-edit');
Route::post('/home/item/{id}/update', 'Backend\ItemController@update')->name('item-update');
Route::get('/home/item/{id}/delete', 'Backend\ItemController@destroy')->name('item-delete');

Route::get('/home/customer', 'Backend\CustomerController@index')->name('customer');
Route::get('/home/customer/create', 'Backend\CustomerController@create');
Route::post('/home/customer/store', 'Backend\CustomerController@store')->name('customer-store');
Route::get('/home/customer/{id}/show', 'Backend\CustomerController@show')->name('customer-show');
Route::get('/home/customer/{id}/edit', 'Backend\CustomerController@edit')->name('customer-edit');
Route::post('/home/customer/{id}/update', 'Backend\CustomerController@update')->name('customer-update');
Route::get('/home/customer/{id}/delete', 'Backend\CustomerController@destroy')->name('customer-delete');
Route::get('/home/customer/{id}', 'Backend\CustomerController@viewcat')->name('customer-viewcat');


Route::get('/home/sale', 'Backend\SaleController@index')->name('sale');
Route::post('/home/sale/getItemPrice', 'Backend\SaleController@getItemPrice')->name('getItemPrice');

Route::get('/home/sale/create', 'Backend\SaleController@create');
Route::post('/home/sale/store', 'Backend\SaleController@store')->name('sale-store');
Route::get('/home/sale/{id}/show', 'Backend\SaleController@show')->name('sale-show');
Route::get('/home/sale/{id}/edit', 'Backend\SaleController@edit')->name('sale-edit');
Route::post('/home/sale/{id}/update', 'Backend\SaleController@update')->name('sale-update');
Route::get('/home/sale/{id}/delete', 'Backend\SaleController@destroy')->name('sale-delete');


Route::post('/home/item/search','Backend\ItemController@search');
Route::get('/api','Backend\ItemController@api');

Route::get('/live_search', 'LiveSearch@index');
Route::get('/live_search/action', 'LiveSearch@action')->name('live_search.action');
Route::get('/laxmi','Backend\ItemController@create');

