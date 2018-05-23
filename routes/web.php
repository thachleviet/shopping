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
        Route::get('/', 'AdminController@index')->name('admin-admin');
        Route::get('/add', 'AdminController@create')->name('admin-admin.create');
        Route::post('/add', 'AdminController@store')->name('admin-admin.store');
        Route::get('/edit/{id}', 'AdminController@edit')->name('admin-admin.edit');
        Route::post('/update/{id}', 'AdminController@update')->name('admin-admin.update');
        Route::get('/show/{id}', 'AdminController@show')->name('admin-admin.show');
        Route::get('/destroy/{id}', 'AdminController@destroy')->name('admin-admin.destroy');
    });
    Route::group(['prefix'=>'news'], function (){
        Route::get('/', 'NewsController@index')->name('news');
    });
    Route::group(['prefix'=>'roles'], function (){
        Route::get('/', 'RoleController@index')->name('roles');//
        Route::get('/add', 'RoleController@create')->name('roles.create');
        Route::post('/add', 'RoleController@store')->name('roles.store');
        Route::get('/edit/{id}', 'RoleController@edit')->name('roles.edit');
        Route::post('/update/{id}', 'RoleController@update')->name('roles.update');
        Route::get('destroy/{id}', 'RoleController@destroy')->name('role.destroy-roles');
    });
    Route::group(['prefix'=>'permissions'], function (){
        Route::get('/', 'PermissionController@index')->name('permissions');//
        Route::get('/add', 'PermissionController@create')->name('permissions.create');
        Route::post('/add', 'PermissionController@store')->name('permissions.store');
        Route::get('/edit/{id}', 'PermissionController@edit')->name('permissions.edit');
        Route::post('/update/{id}', 'PermissionController@update')->name('permissions.update');
        Route::get('destroy/{id}', 'PermissionController@destroy')->name('permissions.destroy-roles');
    });
    Route::group(['prefix' => 'category'], function(){
        Route::get('/', 'CategoriesController@indexAction')->name('category');
        Route::get('add', 'CategoriesController@addAction')->name('category.add');
        Route::post('add', 'CategoriesController@submitAddAction')->name('category.submit');
        Route::get('edit/{id}', 'CategoriesController@editAction')->name('category.edit');
        Route::post('edit', 'CategoriesController@submitEditAction')->name('category.submit-edit');
        Route::get('delete/{id}', 'CategoriesController@removeAction')->name('category.delete');
        Route::post('delete-multi-row','CategoriesController@removeMultiAction')->name('category.delete-multi-row');
        Route::post('ordering', 'CategoriesController@orderingAction')->name('category.ordering');
        Route::post('filter-category', 'CategoriesController@filterCategoryAction')->name('category.filter-category');
    });

    Route::group(['prefix' => 'product'], function(){
        Route::get('', 'ProductController@indexAction')->name('product');
        Route::get('add', 'ProductController@addAction')->name('product.add');
        Route::post('add', 'ProductController@submitAddAction')->name('product.submit');
        Route::get('edit/{id}', 'ProductController@editAction')->name('product.edit');
        Route::post('edit', 'ProductController@submitEditAction')->name('product.submit-edit');
        Route::get('delete/{id}', 'ProductController@removeAction')->name('product.delete');
        Route::post('delete-multi-row', 'ProductController@removeMultiAction')->name('product.delete-multi-row');
        Route::post('ordering', 'ProductController@orderingAction')->name('product.ordering');
        Route::post('change-status', 'ProductController@changeStatusAction')->name('product.change-status');
        Route::post('filter-product', 'ProductController@filterProductAction')->name('product.filter-product');

    });

    Route::group(['prefix' => 'slider'], function(){
        Route::get('', 'SliderController@indexAction')->name('slider');
        Route::get('add', 'SliderController@addAction')->name('slider.add');
        Route::post('add', 'SliderController@submitAddAction')->name('slider.submit');
        Route::get('edit/{id}', 'SliderController@editAction')->name('slider.edit');
        Route::post('edit', 'SliderController@submitEditAction')->name('slider.submit-edit');
        Route::get('delete/{id}', 'SliderController@removeAction')->name('slider.delete');
        Route::post('delete-multi-row', 'SliderController@removeMultiAction')->name('slider.delete-multi-row');
        Route::post('change-status', 'SliderController@changeStatusAction')->name('slider.change-status');
        Route::post('filter-product', 'SliderController@filterProductAction')->name('slider.filter-product');

    });

    Route::group(['prefix' => 'transaction-user'], function(){
        Route::get('', 'TransactionController@indexAction')->name('transaction-user');
        Route::post('change-status', 'TransactionController@changeStatusAction')->name('transaction-user.change-status');
        Route::post('detail-transaction-user', 'SliderController@detailAction')->name('transaction-user.detail-transaction-user');
        Route::get('confirm-order/{id}', 'TransactionController@confirmOrderAction')->name('transaction-user.confirm-order');
        Route::get('confirm-order-2/{id}', 'TransactionController@confirmOrderAction2')->name('transaction-user.confirm-order-2');
        Route::get('detail-order-user/{id}', 'TransactionController@detailTransactionUserAction')->name('transaction-user.detail-order-user');
        //Route::get('generate-order-fill/{id}', 'TransactionController@generatePDFAction')->name('transaction-user.generate-order');
        Route::post('generate-order-fill', 'TransactionController@generatePDFAction')->name('transaction-user.generate-order-fill');
        Route::get('list-transaction', 'TransactionController@getListUserTransactionNoAccount')->name('transaction-user.list-transaction');
        Route::get('detail-guest/{id}', 'TransactionController@getDetailUserTransactionNoAccount')->name('transaction-user.detail-guest');
//
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
        Route::post('add-cart', 'CartController@addCartAction')->name('cart.add');
        Route::get('show', 'CartController@showAction')->name('cart.show');
        Route::post('update-cart', 'CartController@updateCartAction')->name('cart.update');
        Route::post('delete-cart', 'CartController@deleteCartAction')->name('cart.delete');
    });
    Route::group(['prefix' => 'products'], function(){
        Route::get('/', 'ProductController@indexAction')->name('products');
        Route::get('list-item', 'ProductController@SearchAction')->name('products.search');
        Route::get('product-detail/{id}', 'ProductController@detailProductAction')->name('products.detail');
    });
    Route::group(['prefix' => 'order'], function(){
        Route::get('/', 'OrderController@indexAction')->name('order');
        Route::post('order-cart', 'OrderController@orderCartAction')->name('order.order-cart');

    });
    Route::group(['prefix' => 'province'], function(){
        Route::post('/', 'ProvinceController@indexAction')->name('province');
    });
    Route::group(['prefix' => 'district'], function(){
        Route::post('/', 'DistrictController@indexAction')->name('district');
    });

    Route::group(['prefix'=>'info-user'], function (){
        Route::get('/', 'UserController@indexAction')->name('info-user');
        Route::get('info-user', 'UserController@infoAction')->name('info-user.info-users');
        Route::get('history-order', 'UserController@historyOrderAction')->name('info-user.history-order');

    });
    Route::group(['prefix'=>'address'], function (){
        Route::get('/district', 'AddressController@getDistrict')->name('address.district');
        Route::get('/ward', 'AddressController@getWard')->name('address.ward');
    });

    Route::group(['prefix'=>'categorys'], function (){
        Route::get('/', 'CategoryController@indexAction')->name('categorys');
        Route::get('/list-category/{id}', 'CategoryController@listCategoryOfIdAction')->name('categorys.list-category');
        Route::get('/list-category/v/{id}', 'CategoryController@listCategoryVAction')->name('categorys.list-category-v');

    });
});
