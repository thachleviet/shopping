<?php

Auth::routes();
Route::group(['prefix' => 'admin',  'middleware' => ['web','guest'],'namespace' => 'Auth'], function(){
    Route::get('/login', 'AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'AdminLoginController@login')->name('admin.login.submit');
    Route::get('/logout', 'AdminLoginController@logout')->name('admin.logout');
    Route::post('/password/email', 'AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('/password/reset', 'AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/reset', 'AdminResetPasswordController@reset');
    Route::get('/password/reset/{token}', 'AdminResetPasswordController@showResetForm')->name('admin.password.reset');

});
Route::group(['middleware' => ['web','auth:admin'], 'prefix' => 'admin', 'namespace' => 'Backend'], function()
{

    Route::get('/', 'HomeController@indexAction')->name('admin');
    Route::group(['prefix'=>'admin'], function (){
        Route::get('/', 'AdminController@index')->name('admin');
        Route::get('/add', 'AdminController@create')->name('admin.create');
        Route::post('/add', 'AdminController@store')->name('admin.store');
        Route::get('/edit/{id}', 'AdminController@edit')->name('admin.edit');
        Route::post('/update/{id}', 'AdminController@update')->name('admin.update');
        Route::get('/show/{id}', 'AdminController@show')->name('admin.show');
        Route::get('/destroy/{id}', 'AdminController@destroy')->name('admin.destroy');
    });

    Route::group(['prefix' => 'menu'], function(){
        Route::get('/', 'MenuController@index')->name('menu');
        Route::get('/add', 'MenuController@create')->name('menu.create');
        Route::post('/add', 'MenuController@store')->name('menu.store');
        Route::get('/edit/{id}', 'MenuController@edit')->name('menu.edit');
        Route::get('/destroy/{id}', 'MenuController@destroy')->name('menu.destroy');
        Route::post('/update/{id}', 'MenuController@update')->name('menu.update');
        Route::post('/change-status', 'MenuController@changeStatus')->name('menu.change-status');
    });
    Route::group(['prefix' => 'product'], function(){
        Route::get('/', 'ProductController@index')->name('product');
        Route::get('/add', 'ProductController@create')->name('product.create');
        Route::post('/add', 'ProductController@store')->name('product.store');
        Route::get('/edit/{id}', 'ProductController@edit')->name('product.edit');
        Route::get('/destroy/{id}', 'ProductController@destroy')->name('product.destroy');
        Route::post('/update/{id}', 'ProductController@update')->name('product.update');
        Route::post('/change-status', 'ProductController@changeStatus')->name('product.change-status');

    });
    Route::group(['prefix' => 'new'], function(){
        Route::get('/', 'NewController@index')->name('new');
        Route::get('/add', 'NewController@create')->name('new.create');
        Route::post('/add', 'NewController@store')->name('new.store');
        Route::get('/edit/{id}', 'NewController@edit')->name('new.edit');
        Route::get('/destroy/{id}', 'NewController@destroy')->name('new.destroy');
        Route::post('/update/{id}', 'NewController@update')->name('new.update');
        Route::post('/change-status', 'NewController@changeStatus')->name('new.change-status');

    });
    Route::group(['prefix' => 'image-product'], function(){
        Route::get('/destroy/{id}', 'ProductController@destroy')->name('image-product-destroy');
    });

    Route::group(['prefix' => 'config'], function(){
        Route::get('/', 'ConfigController@index')->name('config');
        Route::get('/edit/{id}', 'ConfigController@edit')->name('config.edit');
        Route::post('/edit/{id}', 'ConfigController@update')->name('config.update');
    });
    Route::group(['prefix' => 'slide'], function(){
        Route::get('/', 'SlideController@index')->name('slide');
        Route::get('/add', 'SlideController@create')->name('slide.create');
        Route::post('/add', 'SlideController@store')->name('slide.store');
        Route::get('/edit/{id}', 'SlideController@edit')->name('slide.edit');
        Route::get('/destroy/{id}', 'SlideController@destroy')->name('slide.destroy');
        Route::post('/update/{id}', 'SlideController@update')->name('slide.update');
        Route::post('/change-status', 'SlideController@changeStatus')->name('slide.change-status');
    });


    Route::group(['prefix' => 'transaction'], function(){
        Route::get('', 'TransactionController@indexAction')->name('transaction');
        Route::get('change-status', 'TransactionController@confirmOrderAction2')->name('transaction.confirm-order');
        Route::get('generate-order-fill/{id}', 'TransactionController@generatePDFAction')->name('transaction.generate-order');
        Route::post('generate-order-fill', 'TransactionController@generatePDFAction')->name('transaction.generate-order-fill');//        Route::get('list-transaction', 'TransactionController@getListUserTransactionNoAccount')->name('transaction-user.list-transaction');
        Route::get('detail-guest/{id}', 'TransactionController@getDetailUserTransactionNoAccount')->name('transaction.detail-guest');

    });
    Route::group(['prefix' => 'inventory'], function(){
        Route::get('', 'InventoryController@indexAction')->name('inventory');
    });
    Route::group(['prefix' => 'user-admin'], function(){
        Route::get('', 'UserController@indexAction')->name('user-admin');
        Route::get('user-admin-detail/{id}', 'UserController@detailAction')->name('user-admin.detail');
        Route::post('user-admin-change-status', 'UserController@changeStatusAction')->name('user-admin.change-status');
    });
    Route::group(['prefix' => 'revenue'], function(){
        Route::get('', 'RevenueController@indexAction')->name('revenue');
    });

});

Route::group(['namespace' => 'Auth','prefix' => ''], function(){
    Route::get('/login/facebook', 'LoginController@redirectToProvider')->name('login.facebook');
    Route::get('/login/facebook/callback', 'LoginController@handleProviderCallback');
    Route::get('/logout', 'LoginController@logout')->name('logout');
    Route::get('/notification', 'RegisterController@notification')->name('notification');
    Route::get('/register/verify/{token}', 'RegisterController@confirm')->name('confirm_account');//
    Route::match(['get', 'post'],'update-user', 'UpdateUserController@updateAction')->name('update-user');
});
Route::group(['middleware' => ['web'], 'prefix' => '', 'namespace' => 'Frontend'], function(){
    Route::get('/', 'HomeController@index')->name('home');
    Route::group(['prefix' => 'cart'], function(){
        Route::get('', 'CartController@index')->name('cart');
        Route::post('add-cart', 'CartController@add')->name('cart.add');
        Route::post('update-cart', 'CartController@update')->name('cart.update');
        Route::get('destroy/{id}/route/{route}/product/{product_id}', 'CartController@destroy')->name('cart.destroy');

    });
    Route::group(['prefix' => 'tin-tuc'], function(){
        Route::get('/', 'NewController@index')->name('tin-tuc');
        Route::get('/chi-tiet-bai-viet/{id}.html', 'NewController@detail')->name('tin-tuc.detail');
        Route::get('/gioi-thieu/{id}', 'NewController@guide')->name('tin-tuc.guide');
    });
    Route::group(['prefix' => 'san-pham'], function(){
        Route::get('/', 'ProductController@indexAction')->name('san-pham');
        Route::get('list-item', 'ProductController@SearchAction')->name('san-pham.detail');
        Route::get('/chi-tiet-san-pham/{id}_{slug}.html', 'ProductController@detail')->name('san-pham.detail');
    });
    Route::group(['prefix' => 'order'], function(){
        Route::get('/', 'OrderController@index')->name('order');
        Route::post('order-cart', 'OrderController@orderCartAction')->name('order.order-cart');
        Route::get('order-success', 'OrderController@orderSuccess')->name('order.order-success');

    });
    Route::group(['prefix' => 'province'], function(){
        Route::post('/', 'ProvinceController@indexAction')->name('province');
    });
    Route::group(['prefix' => 'district'], function(){
        Route::post('/', 'DistrictController@indexAction')->name('district');
    });

    Route::group(['prefix'=>'the-loai'], function (){
        Route::get('/', 'CategoryController@index')->name('the-loai');
        Route::get('the-loai/{id}_{slug}.html', 'CategoryController@category')->name('the-loai.the-loai');
        Route::get('dong-ho-nam.html', 'CategoryController@getListItemTypeMale')->name('the-loai.male');
        Route::get('dong-ho-nu.html', 'CategoryController@getListItemTypeFeMale')->name('the-loai.female');
        Route::get('dong-ho-doi.html', 'CategoryController@getListItemTypeDouble')->name('the-loai.double');
        Route::get('search-item.html', 'CategoryController@searchProduct')->name('the-loai.search');
    });
});
