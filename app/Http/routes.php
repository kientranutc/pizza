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
    return view('welcome');
});
//----------------------------frontend--------------------------------
Route::get('/login',[
   'as' => 'admin.login',
   'uses' => 'Backend\AuthController@login'
]);
//----------------------------backend---------------------------------
Route::group(['prefix' => 'admin'], function () {
    Route::get('/',[
            'as' => 'admin.dashboard',
            'uses' => 'Backend\DashboardController@index'
    ]);
    Route::group(['prefix' => '/category'], function () {
        Route::get('',[
                'as' => 'category.index',
                'uses' => 'Backend\CategoryController@index'
        ]);
        Route::get('create',[
                'as' => 'category.create',
                'uses' => 'Backend\CategoryController@create'
        ]);
        Route::post('create',[
                'as' => 'category.create',
                'uses' => 'Backend\CategoryController@processCreate'
        ]);
    });
});