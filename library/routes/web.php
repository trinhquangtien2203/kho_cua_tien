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

Route::get('/', 'FrontendController@getHome');

Route::get('detail/{id}/{slug}.html','FrontendController@getDetail');
Route::post('detail/{id}/{slug}.html','FrontendController@postComment');

Route::get('category/{id}/{slug}.html', 'FrontendController@getCategory');

Route::get('search', 'FrontendController@getSearch');

Route::group(['prefix'=>'cart'],function(){
    Route::get('add/{id}', 'CartController@getAddCart');
    Route::get('show', 'CartController@getShowCart');
    Route::get('del/{id}', 'CartController@getDeleteCart');
    Route::get('update', 'CartController@getUpdateCart');
    Route::post('show', 'CartController@postComplete');
});
Route::get('complete', 'CartController@getComplete');

Route::group(['prefix'=>'laptop'],function(){
    Route::get('/','LaptopController@getLap');
    Route::get('detail/{id}/{slug}.html','LaptopController@getDetail');
    Route::post('detail/{id}/{slug}.html','LaptopController@postComment');
});
Route::group(['prefix'=>'news'],function(){
    Route::get('/','NewsController@getNews');
    Route::get('content/{id}','NewsController@getContentNews');
});





Route::group(['namespace'=>'admin'],function(){
    Route::group(['prefix'=>'login','middleware'=>'CheckLogedIn'],function(){
        Route::get('/','LoginController@getLogin');
        Route::post('/','LoginController@postLogin');       
    });
    Route::get('logout','HomeController@getLogout');
    Route::group(['prefix'=>'admin','middleware'=>'CheckLogedOut'],function(){
        Route::get('home','HomeController@getHome');

        Route::group(['prefix'=>'category'],function(){
            Route::get('/','CategoryController@getCate');
            Route::post('/','CategoryController@postCate');

            Route::get('edit/{id}','CategoryController@getEditCate');
            Route::post('edit/{id}','CategoryController@postEditCate');

            Route::get('del/{id}','CategoryController@getDeleteCate');
        });

        Route::group(['prefix'=>'product'],function(){
            Route::get('/','ProductController@getProduct');
            
            Route::get('add','ProductController@getAddProduct');
            Route::post('add','ProductController@postAddProduct');

            Route::get('edit/{id}','ProductController@getEditProduct');
            Route::post('edit/{id}','ProductController@postEditProduct');

            Route::get('del/{id}','ProductController@getDeleteProduct');
        });
        Route::group(['prefix'=>'dmlaptop'],function(){
            Route::get('/','dmLaptopController@getLap');
            Route::post('/','dmLaptopController@postLap');

            Route::get('edit/{id}','dmLaptopController@getEditLap');
            Route::post('edit/{id}','dmLaptopController@postEditLap');

            Route::get('del/{id}','dmLaptopController@getDeleteLap');
        });
        Route::group(['prefix'=>'splaptop'],function(){
            Route::get('/','spLaptopController@getSpLap');

            Route::get('add','spLaptopController@getAddSpLap');
            Route::post('add','spLaptopController@postAddSpLap');

            Route::get('edit/{id}','spLaptopController@getEditSpLap');
            Route::post('edit/{id}','spLaptopController@postEditSpLap');

            Route::get('del/{id}','spLaptopController@getDeleteSpLap');
        });
        Route::group(['prefix'=>'user'],function(){
            Route::get('/','UsersController@getUsers');

            Route::get('add','UsersController@getAddUsers');
            Route::post('add','UsersController@postAddUsers');

            Route::get('edit/{id}','UsersController@getEditUsers');
            Route::post('edit/{id}','UsersController@postEditUsers');

            Route::get('del/{id}','UsersController@getDelUsers');
        });
        Route::group(['prefix'=>'news'],function(){
            Route::get('/','NewsController@getNews');

            Route::get('add','NewsController@getAddNews');
            Route::post('add','NewsController@postAddNews');

            Route::get('edit/{id}','NewsController@getEditNews');
            Route::post('edit/{id}','NewsController@postEditNews');

            Route::get('del/{id}','NewsController@getDelNews');
        });
    });

});