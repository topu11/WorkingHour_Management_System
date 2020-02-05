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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['prefix'=>'admin','middleware'=>['admin','auth'],'namespace'=>'admin'],function() {

    Route::get('dashboard', 'DashboardController@index')->name('admin.dashboard');
});

Route::group(['prefix'=>'user','middleware'=>['user','auth'],'namespace'=>'user'],function(){

    Route::get('dashboard', 'UserDashboardController@index')->name('user.dashboard');

});
Route::group(['prefix'=>'user','middleware'=>['user','auth'],'namespace'=>'user'],function(){

    Route::get('user.inTime', 'UserDashboardController@inTime')->name('user.inTime');

});
// // Route::get('user.inTime', 'UserDashboardController@inTime')->name('user.inTime');
Route::group(['prefix'=>'user','middleware'=>['user','auth'],'namespace'=>'user'],function(){

    Route::get('user.outTime', 'UserDashboardController@outTime')->name('user.outTime');

});
 Route::post('/store', 'AttendanceController@store')->name('store');
 Route::post('/edit/{email}', 'AttendanceController@edit')->name('edit');
 Route::get('/monthTime/{date}','AttendanceController@monthTime')->name('monthTime');
 Route::group(['prefix'=>'admin','middleware'=>['admin','auth'],'namespace'=>'admin'],function() {

    Route::get('confirm/{id}', 'DashboardController@confirm')->name('admin.confirm');
});
Route::group(['prefix'=>'admin','middleware'=>['admin','auth'],'namespace'=>'admin'],function() {

    Route::get('delete/{id}', 'DashboardController@delete')->name('admin.delete');
});
Route::get('/pdf','AttendanceController@makePDF')->name('pdf');
