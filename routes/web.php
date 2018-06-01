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

//    Route::resource('news','NewsController');
//    Route::get('api/user', 'NewsController@getListAction');
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
    Route::group(['prefix'=>'news'], function (){
        Route::get('/', 'NewsController@index')->name('news');
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
    Route::group(['prefix' => 'news'], function(){
        Route::get('/', 'NewController@index')->name('news');
        Route::get('/detail/{id}', 'NewController@detail')->name('news.detail');
        Route::get('/huong-dan/{id}', 'NewController@guide')->name('news.guide');

    });
    Route::group(['prefix' => 'product'], function(){
        Route::get('/', 'ProductController@indexAction')->name('products');
        Route::get('list-item', 'ProductController@SearchAction')->name('products.search');
        Route::get('product-detail/{id}', 'ProductController@detail')->name('products.detail');
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

//    Route::group(['prefix'=>'info-user'], function (){
//        Route::get('/', 'UserController@indexAction')->name('info-user');
//        Route::get('info-user', 'UserController@infoAction')->name('info-user.info-users');
//        Route::get('history-order', 'UserController@historyOrderAction')->name('info-user.history-order');
//
//    });
//    Route::group(['prefix'=>'address'], function (){
//        Route::get('/district', 'AddressController@getDistrict')->name('address.district');
//        Route::get('/ward', 'AddressController@getWard')->name('address.ward');
//    });

    Route::group(['prefix'=>'category'], function (){
        Route::get('/', 'CategoryController@index')->name('category');
        Route::get('category/{id}', 'CategoryController@category')->name('category.category');
        Route::get('category-male', 'CategoryController@getListItemTypeMale')->name('category.male');
        Route::get('category-female', 'CategoryController@getListItemTypeFeMale')->name('category.female');
        Route::get('category-double', 'CategoryController@getListItemTypeDouble')->name('category.double');
        Route::get('search-item', 'CategoryController@searchProduct')->name('category.search');
    });
});
