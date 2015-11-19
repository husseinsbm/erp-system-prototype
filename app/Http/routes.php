<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
  return view('auth/login');
});
$router->group([
  'middleware' => 'auth',

  ], function () {
   Route::get('/erp_system',function(){
    return view('erp_system/index');
  });
   resource('erp_system/item', 'ItemController', ['except' => 'show']);
   Route::post('item', 
    ['as' => 'item_store', 'uses' => 'ItemController@store']);
   Route::post('erp_system/item/update', 
    ['as' => 'item_update', 'uses' => 'ItemController@update']);
   Route::post('erp_system/item/delete', 
    ['as' => 'item_delete', 'uses' => 'ItemController@delete']);
   Route::get('erp_system/item/getitem', 
    ['as' => 'getitem', 'uses' => 'ItemController@getItem']);

   resource('erp_system/customer', 'CustomerController', ['except' => 'show']);
   Route::post('erp_system/customer', 
    ['as' => 'customer_store', 'uses' => 'CustomerController@store']);
   Route::post('erp_system/customer/update', 
    ['as' => 'customer_update', 'uses' => 'CustomerController@update']);
   Route::post('erp_system/customer/delete', 
    ['as' => 'customer_delete', 'uses' => 'CustomerController@delete']);
   Route::get('erp_system/customer/getcustomer', 
    ['as' => 'getcustomer', 'uses' => 'CustomerController@getCustomer']);


   resource('erp_system/rfq', 'RfqController', ['except' => 'show']);
   Route::post('erp_system/rfq/cancel', 
    ['as' => 'rfq_delete', 'uses' => 'RfqController@cancel']);
   Route::get('erp_system/rfq/{id}/view', 
    ['as' => 'rfq_view', 'uses' => 'RfqController@view']);
   Route::get('erp_system/rfq/{id}/getpdf', 
    ['as' => 'getrfqpdf', 'uses' => 'RfqController@getpdf']);
   Route::get('erp_system/rfq/getitemrfq', 
    ['as' => 'getitemrfq', 'uses' => 'RfqController@getItemrfq']);

   resource('erp_system/qtn', 'QtnController', ['except' => 'show']);
   Route::post('erp_system/qtn/accept', 
    ['as' => 'receivings_accept', 'uses' => 'QtnController@accept']);
   Route::post('erp_system/qtn/reject', 
    ['as' => 'receivings_delete', 'uses' => 'QtnController@cancel']);
   Route::get('erp_system/qtn/{id}/getpdf', 
    ['as' => 'getqtnpdf', 'uses' => 'QtnController@getpdf']);
   Route::get('erp_system/qtn/{id}/view', 
    ['as' => 'receivings_view', 'uses' => 'QtnController@view']);


 });

get('/auth/login', 'Auth\AuthController@getLogin');
post('/auth/login', 'Auth\AuthController@postLogin');
get('/auth/logout', 'Auth\AuthController@getLogout');