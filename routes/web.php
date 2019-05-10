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
});

Route::get('/shop/{siret}', 'ShopInfoController@index');

Route::get('/researchCity/{param}', 'ResearchByCityController@index');
Route::get('/researchName/{param}', 'ResearchByNameController@index');
Route::get('/dish/{param}', 'DishController@index');
//Route::post('create', 'UpdateDBController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
