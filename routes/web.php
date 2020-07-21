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
Route::resource('products', 'ProductController'); 
Route::resource('category', 'CategoryController'); 

Route::get('/', 'MainController@login');
Route::post('/checklogin', 'MainController@validateLogin');
Route::get('/main', 'MainController@successlogin');
Route::get('/logout', 'MainController@logout');
