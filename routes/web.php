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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    try{
        return view('auth/login');
         }catch(\Exception $e){
        throw new CustomException;
    }
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/administratorDashboard','AdminDashboardController@index')->name('administratorDashboard');
Route::get('show/list','usercontroller@index')->name('show/list');
Route::get('/create/contact', 'usercontroller@create')->name('create/contact');
Route::post('/store/contact', 'usercontroller@store')->name('/store/contact');
Route::post('/userlistdata', 'usercontroller@show')->name('/userlistdata');
Route::get('/user/edit/{id}/{viewid}','usercontroller@edit')->name('user/edit');
Route::patch('/user/update{id}','usercontroller@update');

Route::post('user/delete','usercontroller@destroy')->name('user/delete');
