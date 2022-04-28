<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){

    Route::prefix('dashboard')->group(function (){
        Route::get('/check','DashboardController@index')->name('dashboard.index');
    }); //end of dashboard route

});



//Route::prefix('dashboard')->group(function (){
//    Route::get('/check','DashboardController@index')->name('dashboard.index');
//}); //end of dashboard route
//
//
