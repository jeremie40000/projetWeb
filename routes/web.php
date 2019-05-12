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
Route::get('/myAccount', 'MyAccountController@index');
Route::post('/uploadprofilepicture', 'UploadProfilePictureController@index');
Route::post('/newShop', 'NewShopController@index');
Route::post('/addimageshop/{param}', 'AddImageController@index');
Route::post('/updateAccount', 'UpdateAccountController@index');
Route::post('/addmenu/{param}', 'AddMenuController@index');
Route::get('/modifyPersInfo', 'ModifyPersInfoController@index');
Route::get('/addShop', 'AddShopController@index');
Route::get('/setMenu/{param}', 'SetMenuController@index');
Route::get('/deleteMenu/{param}', 'DeleteMenuController@index');
Route::get('/deleteDish/{param}', 'DeleteDishController@index');
Route::post('/recordDish/{param}', 'RecordDishController@index');
//Route::post('create', 'UpdateDBController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
