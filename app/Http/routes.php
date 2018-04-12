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
//----------------------------Frontend---------------------------------
Route::get('/',[
    'as' => 'home',
    'uses' => 'Frontend\HomeController@index'
]);
Route::group(['prefix' => 'account'], function () {
    Route::get('/register-account',[
        'as' => 'register',
        'uses' => 'Frontend\AccountController@index'
    ]);
    Route::post('/register-account',[
        'as' => 'register',
        'uses' => 'Frontend\AccountController@createAccount'
    ]);
    Route::get('/login-customer',[
        'as' => 'login-account',
        'uses' => 'Frontend\AccountController@showFormLogin'
    ]);
    Route::post('/login-customer',[
        'as' => 'login-account',
         'uses' => 'Frontend\AccountController@processLoginCustomer'
    ]);
    Route::get('/logout-customer',[
        'as' => 'logout-account',
        'uses' => 'Frontend\AccountController@logoutCustomer'
    ]);
});


//----------------------------Process login----------------------------
Route::get('/login',[
   'as' => 'admin.login',
   'uses' => 'Backend\ProcessAuthController@login'
]);
Route::post('/sign-in',[
    'as' => 'admin.sign-in',
    'uses' => 'Backend\ProcessAuthController@processLogin'
]);
//----------------------------backend---------------------------------
Route::group(['middleware' => ['middlewareAuth']], function(){
    Route::group(['prefix' => 'admin'], function () {
        Route::get('/logout',[
            'as' => 'admin.logout',
            'uses' => 'Backend\ProcessAuthController@processLogout'
        ]);
        Route::get('/',[
            'as' => 'admin.dashboard',
            'uses' => 'Backend\DashboardController@index'
        ]);
        //--------------------------Category-------------------------
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
            Route::get('edit/{id}',[
                'as' => 'category.edit',
                'uses' => 'Backend\CategoryController@edit'
            ]);
            Route::post('edit/{id}',[
                'as' => 'category.edit',
                'uses' => 'Backend\CategoryController@processEdit'
            ]);
            Route::group(['middleware' => ['middlewareCheckRoleDelte']], function() {
                Route::get('delete/{id}', [
                    'as' => 'category.delete',
                    'uses' => 'Backend\CategoryController@delete'
                ]);
            });
        });
        //----------------------product-----------------------
        Route::group(['prefix' => '/product'], function () {
            Route::get('', [
                'as' => 'product.index',
                'uses' => 'Backend\ProductController@index'
            ]);
            Route::get('/create', [
                'as' => 'product.create',
                'uses' => 'Backend\ProductController@create'
            ]);
            Route::get('/edit/{id}', [
                'as' => 'product.edit',
                'uses' => 'Backend\ProductController@edit'
            ]);
            Route::post('/edit/{id}', [
                'as' => 'product.edit',
                'uses' => 'Backend\ProductController@processEdit'
            ]);
            Route::post('/create', [
                'as' => 'product.create',
                'uses' => 'Backend\ProductController@processCreate'
            ]);
            Route::group(['middleware' => ['middlewareCheckRoleDelte']], function() {
                Route::get('/delete/{id}', [
                    'as' => 'product.delete',
                    'uses' => 'Backend\ProductController@delete'
                ]);
            });
        });
        //-------------------User---------------------------------
        Route::group(['prefix' => '/user'], function () {
            Route::group(['middleware' => ['middlewareCheckAdmin']], function() {
                Route::get('', [
                    'as' => 'user.index',
                    'uses' => 'Backend\UserController@index'
                ]);
                Route::get('/lock/{id}/{active}', [
                    'as' => 'user.lock',
                    'uses' => 'Backend\UserController@changeLockAndUnlock'
                ]);
                Route::get('/create', [
                    'as' => 'user.create',
                    'uses' => 'Backend\UserController@create'
                ]);
                Route::post('/create', [
                    'as' => 'user.create',
                    'uses' => 'Backend\UserController@processCreate'
                ]);
                Route::get('/delete/{id}', [
                    'as' => 'user.delete',
                    'uses' => 'Backend\UserController@delete'
                ]);
            });

            Route::get('/edit/{id}', [
                'as' => 'user.edit',
                'uses' => 'Backend\UserController@edit'
            ]);
            Route::post('/edit/{id}', [
                'as' => 'user.edit',
                'uses' => 'Backend\UserController@processEdit'
            ]);

        });
        //-------------------news---------------------------------
        Route::group(['prefix' => '/news'], function () {
            Route::get('', [
                'as' => 'news.index',
                'uses' => 'Backend\NewsController@index'
            ]);
            Route::get('/create', [
                'as' => 'news.create',
                'uses' => 'Backend\NewsController@create'
            ]);
            Route::post('/create', [
                'as' => 'news.create',
                'uses' => 'Backend\NewsController@processCreate'
            ]);
            Route::get('/delete/{id}', [
                'as' => 'news.delete',
                'uses' => 'Backend\NewsController@delete'
            ]);
            Route::get('/edit/{id}', [
                'as' => 'news.edit',
                'uses' => 'Backend\NewsController@edit'
            ]);
            Route::post('/edit/{id}', [
                'as' => 'news.edit',
                'uses' => 'Backend\NewsController@processEdit'
            ]);
        });
        //-------------------news---------------------------------
        Route::group(['prefix' => '/order'], function () {
            Route::get('', [
                'as' => 'order.index',
                'uses' => 'Backend\OrderController@index'
            ]);
            Route::get('/show-detail/{id}', [
                'as' => 'order.show',
                'uses' => 'Backend\OrderController@showDetail'
            ]);
            Route::get('/change-status/{id}/{status}', [
                'as' => 'order.change-status',
                'uses' => 'Backend\OrderController@changeStatusOrder'
            ]);
        });
        //-------------------banner---------------------------------
        Route::group(['prefix' => '/banner'], function () {
            Route::get('', [
                'as' => 'banner.index',
                'uses' => 'Backend\BannerController@index'
            ]);
            Route::get('/create', [
                'as' => 'banner.create',
                'uses' => 'Backend\BannerController@create'
            ]);

            Route::post('/create', [
                'as' => 'banner.create',
                'uses' => 'Backend\BannerController@processCreate'
            ]);
            Route::get('/edit/{id}', [
                'as' => 'banner.edit',
                'uses' => 'Backend\BannerController@edit'
            ]);
            Route::post('/edit/{id}', [
                'as' => 'banner.edit',
                'uses' => 'Backend\BannerController@processEdit'
            ]);
            Route::get('/delete/{id}', [
                'as' => 'banner.delete',
                'uses' => 'Backend\BannerController@delete'
            ]);
        });

    });
});
