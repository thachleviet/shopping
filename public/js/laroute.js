(function () {

    var laroute = (function () {

        var routes = {

            absolute: false,
            rootUrl: 'https://shopping.io',
            routes : [{"host":null,"methods":["GET","HEAD"],"uri":"laravel-filemanager","name":"unisharp.lfm.show","action":"\Unisharp\Laravelfilemanager\controllers\LfmController@show"},{"host":null,"methods":["GET","HEAD"],"uri":"laravel-filemanager\/errors","name":"unisharp.lfm.getErrors","action":"\Unisharp\Laravelfilemanager\controllers\LfmController@getErrors"},{"host":null,"methods":["GET","HEAD","POST","PUT","PATCH","DELETE","OPTIONS"],"uri":"laravel-filemanager\/upload","name":"unisharp.lfm.upload","action":"\Unisharp\Laravelfilemanager\controllers\UploadController@upload"},{"host":null,"methods":["GET","HEAD"],"uri":"laravel-filemanager\/jsonitems","name":"unisharp.lfm.getItems","action":"\Unisharp\Laravelfilemanager\controllers\ItemsController@getItems"},{"host":null,"methods":["GET","HEAD"],"uri":"laravel-filemanager\/newfolder","name":"unisharp.lfm.getAddfolder","action":"\Unisharp\Laravelfilemanager\controllers\FolderController@getAddfolder"},{"host":null,"methods":["GET","HEAD"],"uri":"laravel-filemanager\/deletefolder","name":"unisharp.lfm.getDeletefolder","action":"\Unisharp\Laravelfilemanager\controllers\FolderController@getDeletefolder"},{"host":null,"methods":["GET","HEAD"],"uri":"laravel-filemanager\/folders","name":"unisharp.lfm.getFolders","action":"\Unisharp\Laravelfilemanager\controllers\FolderController@getFolders"},{"host":null,"methods":["GET","HEAD"],"uri":"laravel-filemanager\/crop","name":"unisharp.lfm.getCrop","action":"\Unisharp\Laravelfilemanager\controllers\CropController@getCrop"},{"host":null,"methods":["GET","HEAD"],"uri":"laravel-filemanager\/cropimage","name":"unisharp.lfm.getCropimage","action":"\Unisharp\Laravelfilemanager\controllers\CropController@getCropimage"},{"host":null,"methods":["GET","HEAD"],"uri":"laravel-filemanager\/cropnewimage","name":"unisharp.lfm.getCropimage","action":"\Unisharp\Laravelfilemanager\controllers\CropController@getNewCropimage"},{"host":null,"methods":["GET","HEAD"],"uri":"laravel-filemanager\/rename","name":"unisharp.lfm.getRename","action":"\Unisharp\Laravelfilemanager\controllers\RenameController@getRename"},{"host":null,"methods":["GET","HEAD"],"uri":"laravel-filemanager\/resize","name":"unisharp.lfm.getResize","action":"\Unisharp\Laravelfilemanager\controllers\ResizeController@getResize"},{"host":null,"methods":["GET","HEAD"],"uri":"laravel-filemanager\/doresize","name":"unisharp.lfm.performResize","action":"\Unisharp\Laravelfilemanager\controllers\ResizeController@performResize"},{"host":null,"methods":["GET","HEAD"],"uri":"laravel-filemanager\/download","name":"unisharp.lfm.getDownload","action":"\Unisharp\Laravelfilemanager\controllers\DownloadController@getDownload"},{"host":null,"methods":["GET","HEAD"],"uri":"laravel-filemanager\/delete","name":"unisharp.lfm.getDelete","action":"\Unisharp\Laravelfilemanager\controllers\DeleteController@getDelete"},{"host":null,"methods":["GET","HEAD"],"uri":"laravel-filemanager\/photos\/{base_path}\/{image_name}","name":"unisharp.lfm.","action":"\Unisharp\Laravelfilemanager\controllers\RedirectController@getImage"},{"host":null,"methods":["GET","HEAD"],"uri":"laravel-filemanager\/files\/{base_path}\/{file_name}","name":"unisharp.lfm.","action":"\Unisharp\Laravelfilemanager\controllers\RedirectController@getFile"},{"host":null,"methods":["GET","HEAD"],"uri":"api\/user","name":null,"action":"Closure"},{"host":null,"methods":["GET","HEAD"],"uri":"login","name":"login","action":"App\Http\Controllers\Auth\LoginController@showLoginForm"},{"host":null,"methods":["POST"],"uri":"login","name":null,"action":"App\Http\Controllers\Auth\LoginController@login"},{"host":null,"methods":["POST"],"uri":"logout","name":"logout","action":"App\Http\Controllers\Auth\LoginController@logout"},{"host":null,"methods":["GET","HEAD"],"uri":"register","name":"register","action":"App\Http\Controllers\Auth\RegisterController@showRegistrationForm"},{"host":null,"methods":["POST"],"uri":"register","name":null,"action":"App\Http\Controllers\Auth\RegisterController@register"},{"host":null,"methods":["GET","HEAD"],"uri":"password\/reset","name":"password.request","action":"App\Http\Controllers\Auth\ForgotPasswordController@showLinkRequestForm"},{"host":null,"methods":["POST"],"uri":"password\/email","name":"password.email","action":"App\Http\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail"},{"host":null,"methods":["GET","HEAD"],"uri":"password\/reset\/{token}","name":"password.reset","action":"App\Http\Controllers\Auth\ResetPasswordController@showResetForm"},{"host":null,"methods":["POST"],"uri":"password\/reset","name":null,"action":"App\Http\Controllers\Auth\ResetPasswordController@reset"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/login","name":"admin.login","action":"App\Http\Controllers\Auth\AdminLoginController@showLoginForm"},{"host":null,"methods":["POST"],"uri":"admin\/login","name":"admin.login.submit","action":"App\Http\Controllers\Auth\AdminLoginController@login"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/logout","name":"admin.logout","action":"App\Http\Controllers\Auth\AdminLoginController@logout"},{"host":null,"methods":["POST"],"uri":"admin\/password\/email","name":"admin.password.email","action":"App\Http\Controllers\Auth\AdminForgotPasswordController@sendResetLinkEmail"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/password\/reset","name":"admin.password.request","action":"App\Http\Controllers\Auth\AdminForgotPasswordController@showLinkRequestForm"},{"host":null,"methods":["POST"],"uri":"admin\/password\/reset","name":null,"action":"App\Http\Controllers\Auth\AdminResetPasswordController@reset"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/password\/reset\/{token}","name":"admin.password.reset","action":"App\Http\Controllers\Auth\AdminResetPasswordController@showResetForm"},{"host":null,"methods":["GET","HEAD"],"uri":"admin","name":"admin","action":"App\Http\Controllers\Backend\HomeController@indexAction"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/admin","name":"admin-admin","action":"App\Http\Controllers\Backend\AdminController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/admin\/add","name":"admin-admin.create","action":"App\Http\Controllers\Backend\AdminController@create"},{"host":null,"methods":["POST"],"uri":"admin\/admin\/add","name":"admin-admin.store","action":"App\Http\Controllers\Backend\AdminController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/admin\/edit\/{id}","name":"admin-admin.edit","action":"App\Http\Controllers\Backend\AdminController@edit"},{"host":null,"methods":["POST"],"uri":"admin\/admin\/update\/{id}","name":"admin-admin.update","action":"App\Http\Controllers\Backend\AdminController@update"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/admin\/show\/{id}","name":"admin-admin.show","action":"App\Http\Controllers\Backend\AdminController@show"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/admin\/destroy\/{id}","name":"admin-admin.destroy","action":"App\Http\Controllers\Backend\AdminController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/news","name":"news","action":"App\Http\Controllers\Backend\NewsController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/roles","name":"roles","action":"App\Http\Controllers\Backend\RoleController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/roles\/add","name":"roles.create","action":"App\Http\Controllers\Backend\RoleController@create"},{"host":null,"methods":["POST"],"uri":"admin\/roles\/add","name":"roles.store","action":"App\Http\Controllers\Backend\RoleController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/roles\/edit\/{id}","name":"roles.edit","action":"App\Http\Controllers\Backend\RoleController@edit"},{"host":null,"methods":["POST"],"uri":"admin\/roles\/update\/{id}","name":"roles.update","action":"App\Http\Controllers\Backend\RoleController@update"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/roles\/destroy\/{id}","name":"role.destroy-roles","action":"App\Http\Controllers\Backend\RoleController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/permissions","name":"permissions","action":"App\Http\Controllers\Backend\PermissionController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/permissions\/add","name":"permissions.create","action":"App\Http\Controllers\Backend\PermissionController@create"},{"host":null,"methods":["POST"],"uri":"admin\/permissions\/add","name":"permissions.store","action":"App\Http\Controllers\Backend\PermissionController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/permissions\/edit\/{id}","name":"permissions.edit","action":"App\Http\Controllers\Backend\PermissionController@edit"},{"host":null,"methods":["POST"],"uri":"admin\/permissions\/update\/{id}","name":"permissions.update","action":"App\Http\Controllers\Backend\PermissionController@update"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/permissions\/destroy\/{id}","name":"permissions.destroy-roles","action":"App\Http\Controllers\Backend\PermissionController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/menu","name":"menu","action":"App\Http\Controllers\Backend\MenuController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/menu\/add","name":"menu.create","action":"App\Http\Controllers\Backend\MenuController@create"},{"host":null,"methods":["POST"],"uri":"admin\/menu\/add","name":"menu.store","action":"App\Http\Controllers\Backend\MenuController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/menu\/edit\/{id}","name":"menu.edit","action":"App\Http\Controllers\Backend\MenuController@edit"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/menu\/destroy\/{id}","name":"menu.destroy","action":"App\Http\Controllers\Backend\MenuController@destroy"},{"host":null,"methods":["POST"],"uri":"admin\/menu\/update\/{id}","name":"menu.update","action":"App\Http\Controllers\Backend\MenuController@update"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/slide","name":"slide","action":"App\Http\Controllers\Backend\SlideController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/slide\/add","name":"slide.create","action":"App\Http\Controllers\Backend\SlideController@create"},{"host":null,"methods":["POST"],"uri":"admin\/slide\/add","name":"slide.store","action":"App\Http\Controllers\Backend\SlideController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/product","name":"product","action":"App\Http\Controllers\Backend\ProductController@indexAction"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/product\/add","name":"product.add","action":"App\Http\Controllers\Backend\ProductController@addAction"},{"host":null,"methods":["POST"],"uri":"admin\/product\/add","name":"product.submit","action":"App\Http\Controllers\Backend\ProductController@submitAddAction"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/product\/edit\/{id}","name":"product.edit","action":"App\Http\Controllers\Backend\ProductController@editAction"},{"host":null,"methods":["POST"],"uri":"admin\/product\/edit","name":"product.submit-edit","action":"App\Http\Controllers\Backend\ProductController@submitEditAction"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/product\/delete\/{id}","name":"product.delete","action":"App\Http\Controllers\Backend\ProductController@removeAction"},{"host":null,"methods":["POST"],"uri":"admin\/product\/delete-multi-row","name":"product.delete-multi-row","action":"App\Http\Controllers\Backend\ProductController@removeMultiAction"},{"host":null,"methods":["POST"],"uri":"admin\/product\/ordering","name":"product.ordering","action":"App\Http\Controllers\Backend\ProductController@orderingAction"},{"host":null,"methods":["POST"],"uri":"admin\/product\/change-status","name":"product.change-status","action":"App\Http\Controllers\Backend\ProductController@changeStatusAction"},{"host":null,"methods":["POST"],"uri":"admin\/product\/filter-product","name":"product.filter-product","action":"App\Http\Controllers\Backend\ProductController@filterProductAction"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/slider","name":"slider","action":"App\Http\Controllers\Backend\SliderController@indexAction"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/slider\/add","name":"slider.add","action":"App\Http\Controllers\Backend\SliderController@addAction"},{"host":null,"methods":["POST"],"uri":"admin\/slider\/add","name":"slider.submit","action":"App\Http\Controllers\Backend\SliderController@submitAddAction"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/slider\/edit\/{id}","name":"slider.edit","action":"App\Http\Controllers\Backend\SliderController@editAction"},{"host":null,"methods":["POST"],"uri":"admin\/slider\/edit","name":"slider.submit-edit","action":"App\Http\Controllers\Backend\SliderController@submitEditAction"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/slider\/delete\/{id}","name":"slider.delete","action":"App\Http\Controllers\Backend\SliderController@removeAction"},{"host":null,"methods":["POST"],"uri":"admin\/slider\/delete-multi-row","name":"slider.delete-multi-row","action":"App\Http\Controllers\Backend\SliderController@removeMultiAction"},{"host":null,"methods":["POST"],"uri":"admin\/slider\/change-status","name":"slider.change-status","action":"App\Http\Controllers\Backend\SliderController@changeStatusAction"},{"host":null,"methods":["POST"],"uri":"admin\/slider\/filter-product","name":"slider.filter-product","action":"App\Http\Controllers\Backend\SliderController@filterProductAction"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/transaction-user","name":"transaction-user","action":"App\Http\Controllers\Backend\TransactionController@indexAction"},{"host":null,"methods":["POST"],"uri":"admin\/transaction-user\/change-status","name":"transaction-user.change-status","action":"App\Http\Controllers\Backend\TransactionController@changeStatusAction"},{"host":null,"methods":["POST"],"uri":"admin\/transaction-user\/detail-transaction-user","name":"transaction-user.detail-transaction-user","action":"App\Http\Controllers\Backend\SliderController@detailAction"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/transaction-user\/confirm-order\/{id}","name":"transaction-user.confirm-order","action":"App\Http\Controllers\Backend\TransactionController@confirmOrderAction"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/transaction-user\/confirm-order-2\/{id}","name":"transaction-user.confirm-order-2","action":"App\Http\Controllers\Backend\TransactionController@confirmOrderAction2"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/transaction-user\/detail-order-user\/{id}","name":"transaction-user.detail-order-user","action":"App\Http\Controllers\Backend\TransactionController@detailTransactionUserAction"},{"host":null,"methods":["POST"],"uri":"admin\/transaction-user\/generate-order-fill","name":"transaction-user.generate-order-fill","action":"App\Http\Controllers\Backend\TransactionController@generatePDFAction"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/transaction-user\/list-transaction","name":"transaction-user.list-transaction","action":"App\Http\Controllers\Backend\TransactionController@getListUserTransactionNoAccount"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/transaction-user\/detail-guest\/{id}","name":"transaction-user.detail-guest","action":"App\Http\Controllers\Backend\TransactionController@getDetailUserTransactionNoAccount"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/inventory","name":"inventory","action":"App\Http\Controllers\Backend\InventoryController@indexAction"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/user-admin","name":"user-admin","action":"App\Http\Controllers\Backend\UserController@indexAction"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/user-admin\/user-admin-detail\/{id}","name":"user-admin.detail","action":"App\Http\Controllers\Backend\UserController@detailAction"},{"host":null,"methods":["POST"],"uri":"admin\/user-admin\/user-admin-change-status","name":"user-admin.change-status","action":"App\Http\Controllers\Backend\UserController@changeStatusAction"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/revenue","name":"revenue","action":"App\Http\Controllers\Backend\RevenueController@indexAction"},{"host":null,"methods":["GET","HEAD"],"uri":"login\/facebook","name":"login.facebook","action":"App\Http\Controllers\Auth\LoginController@redirectToProvider"},{"host":null,"methods":["GET","HEAD"],"uri":"login\/facebook\/callback","name":null,"action":"App\Http\Controllers\Auth\LoginController@handleProviderCallback"},{"host":null,"methods":["GET","HEAD"],"uri":"logout","name":"logout","action":"App\Http\Controllers\Auth\LoginController@logout"},{"host":null,"methods":["GET","HEAD"],"uri":"notification","name":"notification","action":"App\Http\Controllers\Auth\RegisterController@notification"},{"host":null,"methods":["GET","HEAD"],"uri":"register\/verify\/{token}","name":"confirm_account","action":"App\Http\Controllers\Auth\RegisterController@confirm"},{"host":null,"methods":["GET","POST","HEAD"],"uri":"update-user","name":"update-user","action":"App\Http\Controllers\Auth\UpdateUserController@updateAction"},{"host":null,"methods":["GET","HEAD"],"uri":"\/","name":"home","action":"App\Http\Controllers\Frontend\HomeController@index"},{"host":null,"methods":["POST"],"uri":"cart\/add-cart","name":"cart.add","action":"App\Http\Controllers\Frontend\CartController@addCartAction"},{"host":null,"methods":["GET","HEAD"],"uri":"cart\/show","name":"cart.show","action":"App\Http\Controllers\Frontend\CartController@showAction"},{"host":null,"methods":["POST"],"uri":"cart\/update-cart","name":"cart.update","action":"App\Http\Controllers\Frontend\CartController@updateCartAction"},{"host":null,"methods":["POST"],"uri":"cart\/delete-cart","name":"cart.delete","action":"App\Http\Controllers\Frontend\CartController@deleteCartAction"},{"host":null,"methods":["GET","HEAD"],"uri":"products","name":"products","action":"App\Http\Controllers\Frontend\ProductController@indexAction"},{"host":null,"methods":["GET","HEAD"],"uri":"products\/list-item","name":"products.search","action":"App\Http\Controllers\Frontend\ProductController@SearchAction"},{"host":null,"methods":["GET","HEAD"],"uri":"products\/product-detail\/{id}","name":"products.detail","action":"App\Http\Controllers\Frontend\ProductController@detailProductAction"},{"host":null,"methods":["GET","HEAD"],"uri":"order","name":"order","action":"App\Http\Controllers\Frontend\OrderController@indexAction"},{"host":null,"methods":["POST"],"uri":"order\/order-cart","name":"order.order-cart","action":"App\Http\Controllers\Frontend\OrderController@orderCartAction"},{"host":null,"methods":["POST"],"uri":"province","name":"province","action":"App\Http\Controllers\Frontend\ProvinceController@indexAction"},{"host":null,"methods":["POST"],"uri":"district","name":"district","action":"App\Http\Controllers\Frontend\DistrictController@indexAction"},{"host":null,"methods":["GET","HEAD"],"uri":"info-user","name":"info-user","action":"App\Http\Controllers\Frontend\UserController@indexAction"},{"host":null,"methods":["GET","HEAD"],"uri":"info-user\/info-user","name":"info-user.info-users","action":"App\Http\Controllers\Frontend\UserController@infoAction"},{"host":null,"methods":["GET","HEAD"],"uri":"info-user\/history-order","name":"info-user.history-order","action":"App\Http\Controllers\Frontend\UserController@historyOrderAction"},{"host":null,"methods":["GET","HEAD"],"uri":"address\/district","name":"address.district","action":"App\Http\Controllers\Frontend\AddressController@getDistrict"},{"host":null,"methods":["GET","HEAD"],"uri":"address\/ward","name":"address.ward","action":"App\Http\Controllers\Frontend\AddressController@getWard"},{"host":null,"methods":["GET","HEAD"],"uri":"categorys","name":"categorys","action":"App\Http\Controllers\Frontend\CategoryController@indexAction"},{"host":null,"methods":["GET","HEAD"],"uri":"categorys\/list-category\/{id}","name":"categorys.list-category","action":"App\Http\Controllers\Frontend\CategoryController@listCategoryOfIdAction"},{"host":null,"methods":["GET","HEAD"],"uri":"categorys\/list-category\/v\/{id}","name":"categorys.list-category-v","action":"App\Http\Controllers\Frontend\CategoryController@listCategoryVAction"}],
            prefix: '',

            route : function (name, parameters, route) {
                route = route || this.getByName(name);

                if ( ! route ) {
                    return undefined;
                }

                return this.toRoute(route, parameters);
            },

            url: function (url, parameters) {
                parameters = parameters || [];

                var uri = url + '/' + parameters.join('/');

                return this.getCorrectUrl(uri);
            },

            toRoute : function (route, parameters) {
                var uri = this.replaceNamedParameters(route.uri, parameters);
                var qs  = this.getRouteQueryString(parameters);

                if (this.absolute && this.isOtherHost(route)){
                    return "//" + route.host + "/" + uri + qs;
                }

                return this.getCorrectUrl(uri + qs);
            },

            isOtherHost: function (route){
                return route.host && route.host != window.location.hostname;
            },

            replaceNamedParameters : function (uri, parameters) {
                uri = uri.replace(/\{(.*?)\??\}/g, function(match, key) {
                    if (parameters.hasOwnProperty(key)) {
                        var value = parameters[key];
                        delete parameters[key];
                        return value;
                    } else {
                        return match;
                    }
                });

                // Strip out any optional parameters that were not given
                uri = uri.replace(/\/\{.*?\?\}/g, '');

                return uri;
            },

            getRouteQueryString : function (parameters) {
                var qs = [];
                for (var key in parameters) {
                    if (parameters.hasOwnProperty(key)) {
                        qs.push(key + '=' + parameters[key]);
                    }
                }

                if (qs.length < 1) {
                    return '';
                }

                return '?' + qs.join('&');
            },

            getByName : function (name) {
                for (var key in this.routes) {
                    if (this.routes.hasOwnProperty(key) && this.routes[key].name === name) {
                        return this.routes[key];
                    }
                }
            },

            getByAction : function(action) {
                for (var key in this.routes) {
                    if (this.routes.hasOwnProperty(key) && this.routes[key].action === action) {
                        return this.routes[key];
                    }
                }
            },

            getCorrectUrl: function (uri) {
                var url = this.prefix + '/' + uri.replace(/^\/?/, '');

                if ( ! this.absolute) {
                    return url;
                }

                return this.rootUrl.replace('/\/?$/', '') + url;
            }
        };

        var getLinkAttributes = function(attributes) {
            if ( ! attributes) {
                return '';
            }

            var attrs = [];
            for (var key in attributes) {
                if (attributes.hasOwnProperty(key)) {
                    attrs.push(key + '="' + attributes[key] + '"');
                }
            }

            return attrs.join(' ');
        };

        var getHtmlLink = function (url, title, attributes) {
            title      = title || url;
            attributes = getLinkAttributes(attributes);

            return '<a href="' + url + '" ' + attributes + '>' + title + '</a>';
        };

        return {
            // Generate a url for a given controller action.
            // laroute.action('HomeController@getIndex', [params = {}])
            action : function (name, parameters) {
                parameters = parameters || {};

                return routes.route(name, parameters, routes.getByAction(name));
            },

            // Generate a url for a given named route.
            // laroute.route('routeName', [params = {}])
            route : function (route, parameters) {
                parameters = parameters || {};

                return routes.route(route, parameters);
            },

            // Generate a fully qualified URL to the given path.
            // laroute.route('url', [params = {}])
            url : function (route, parameters) {
                parameters = parameters || {};

                return routes.url(route, parameters);
            },

            // Generate a html link to the given url.
            // laroute.link_to('foo/bar', [title = url], [attributes = {}])
            link_to : function (url, title, attributes) {
                url = this.url(url);

                return getHtmlLink(url, title, attributes);
            },

            // Generate a html link to the given route.
            // laroute.link_to_route('route.name', [title=url], [parameters = {}], [attributes = {}])
            link_to_route : function (route, title, parameters, attributes) {
                var url = this.route(route, parameters);

                return getHtmlLink(url, title, attributes);
            },

            // Generate a html link to the given controller action.
            // laroute.link_to_action('HomeController@getIndex', [title=url], [parameters = {}], [attributes = {}])
            link_to_action : function(action, title, parameters, attributes) {
                var url = this.action(action, parameters);

                return getHtmlLink(url, title, attributes);
            }

        };

    }).call(this);

    /**
     * Expose the class either via AMD, CommonJS or the global object
     */
    if (typeof define === 'function' && define.amd) {
        define(function () {
            return laroute;
        });
    }
    else if (typeof module === 'object' && module.exports){
        module.exports = laroute;
    }
    else {
        window.laroute = laroute;
    }

}).call(this);

