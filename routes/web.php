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

Route::post('/admin_login','generalController@admin_login');

Route::get('/head','adminController@head');
Route::get('/add_user','adminController@add_user');
Route::get('/all_users','adminController@all_users');
Route::get('/all_pusers','adminController@all_pusers');
Route::post('/insert_user','adminController@insert_user');        

Route::get('/unactive_drivers','adminController@unactive_drivers');
// Route::post('/insert_driver/{id}','adminController@insert_driver');


Route::get('/shared_rides','adminController@shared_rides');
Route::get('/update_ride','adminController@update_ride');
Route::get('/update_ride_status/{id}','adminController@update_ride_status');


Route::get('/delete_user/{id}','adminController@delete_user');
Route::get('/edit_user/{id}','adminController@edit_user');
Route::get('/edit_puser/{id}','adminController@edit_puser');

Route::post('/update_user','adminController@update_user');
Route::get('count_all_users','adminController@count_all_users');
Route::get('count_active_users','adminController@count_active_users');
Route::get('count_unactive_users','adminController@count_unactive_users');

Route::get('sign_out','adminController@sign_out');