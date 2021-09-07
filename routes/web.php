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


Route::get("/logout", "Admin\Auth\AuthController@logout");
Route::group(['prefix' => '/login', 'namespace' => 'Admin\Auth',"middleware"=>"checklogin"], function () {
    Route::get('/', 'AuthController@Login');
    Route::post('/', 'AuthController@postLogin');
});

// Sản phẩm
Route::group(['prefix' => 'admin', 'namespace' => 'Admin',"middleware"=>"checkauth"], function () {
    Route::get("/", "AdminController@index");
    Route::group(['prefix' => 'product', 'namespace' => 'Products'], function () {
        Route::get('/', 'ProductController@index');
        Route::get('/create', 'ProductController@create');
        Route::post('/store', 'ProductController@store');
        Route::get('/edit/{id}', 'ProductController@edit');
        Route::post('/update/{id}', 'ProductController@update');
        Route::get('/delete/{id}', 'ProductController@delete');
    });
});


//  Categories
Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::get('/categorylist', 'Categories\CategoryController@index');
    Route::group(['prefix' => 'category', 'namespace' => 'Categories'], function () {
        Route::get('/create', 'CategoryController@create');
        Route::get('/update/{id}', 'CategoryController@update');
        Route::get('/edit/{id}', 'CategoryController@edit');
        Route::post('/store', 'CategoryController@store');
        Route::get('/delete/{id}', 'CategoryController@delete');
    });
});

// Tài Khoản
Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::get('/userlist', 'Users\UserController@index');
    Route::group(['prefix' => 'user', 'namespace' => 'Users'], function () {
        Route::get('/create', 'UserController@create');
        Route::get('/update/{id}', 'UserController@update');
        Route::get('/edit/{id}', 'UserController@edit');
        Route::post('/store', 'UserController@store');
        Route::get('/delete/{id}', 'UserController@delete');
    });
    });

    // Order
Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::get('/order', 'Order\OrderController@index');
    Route::group(['prefix' => 'order', 'namespace' => 'Order'], function () {
        Route::get('/processed', 'OrderController@processed');
        Route::get('/detail/{order_id}', 'OrderController@detail');
      
    });
});

/////////// FRONT-END  //////////////////////////
    // Trang Chủ
Route::group(["prefix" => "/", "namespace" => 'Site'], function () {
    Route::get('/trang-chu', 'SiteController@index');
    Route::get('/gioi-thieu', 'SiteController@about')->name('about');
    Route::get('/lien-he', 'SiteController@contact')->name('contact');

    // Sản phẩm
    Route::group(["prefix" => "/san-pham", "namespace" => 'Products'], function () {
        Route::get('/', 'ProductController@shop')->name('shop');
        Route::get('/{slug}.html', 'ProductController@detail')->name('detail');
        Route::get('/tim-kiem', 'ProductController@filter')->name('search');
        Route::get('/demo', 'ProductController@demo')->name('demo');
    });
    Route::group(['prefix' => "/", "namespace" => "Categories"], function () {
        Route::get('/danh-muc/{slug}', "CategoryController@cat")->name('cat');
    });

    //Giỏ hàng
    Route::group(['prefix' => '/', 'namespace' => 'Carts'], function () {
        Route::get('/gio-hang', 'CartController@index')->name('cart');
        Route::get('/addtocart/{id}', 'CartController@add');
        Route::get('/removefromcart/{id}', 'CartController@delete');
        Route::get('/gio-hang/update/{rowId}/{qty}', 'CartController@update');
    });
    Route::get('/thanh-toan','SiteController@checkout');
    Route::post('/thanh-toan','SiteController@postCheckout');
    Route::get('/hoan-tat','SiteController@Complete');
    Route::get('/autocomplete', 'LiveSearchController@autocomplete')->name('autocomplete');
    Route::get('/test','TestFaker@test');
});

