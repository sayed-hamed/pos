<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\dashboard;


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
    return view('auth.login');
});
Auth::routes();
Route::get('/home', 'dashboard\DashboardController@index')->name('dashboard.home');

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath','auth']
    ], function(){


    Route::prefix('dashboard')->namespace('dashboard')->name('dashboard.')->group(function (){
        Route::get('/home', 'DashboardController@index')->name('home');
//        Route::resource('users','UserController');
        Route::resource('categories','CategoryController');
        Route::resource('products','ProductController')->except('show');
        Route::resource('clients','ClientController')->except('show');
        Route::resource('clients.orders','client\OrderController')->except(['show']);

        Route::resource('roles','RoleController');

        Route::resource('users','UserController');

    });


});

//Route::group(['middleware' => ['auth']], function() {
//
//    Route::resource('roles','RoleController');
//
//    Route::resource('users','UserController');
//
//});
