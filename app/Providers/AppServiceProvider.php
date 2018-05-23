<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        View::composer('*', 'App\Http\ViewComposers\Frontend\CategoryComposer');
        View::composer('*', 'App\Http\ViewComposers\Frontend\CartComposer');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // register backend
        $this->app->singleton(\App\Repositories\Backend\Category\CategoryRepositoryInterface::class,\App\Repositories\Backend\Category\CategoryRepository::class);
        $this->app->singleton(\App\Repositories\Backend\Product\ProductRepositoryInterface::class,\App\Repositories\Backend\Product\ProductRepository::class);
        $this->app->singleton(\App\Repositories\Backend\Slider\SliderRepositoryInterface::class,\App\Repositories\Backend\Slider\SliderRepository::class);
        $this->app->singleton(\App\Repositories\Backend\User\UserRepositoryInterface::class,\App\Repositories\Backend\User\UserRepository::class);
        $this->app->singleton(\App\Repositories\Backend\Order\OrderRepositoryInterface::class,\App\Repositories\Backend\Order\OrderRepository::class);
        $this->app->singleton(\App\Repositories\Backend\News\NewsRepositoryInterface::class,\App\Repositories\Backend\News\NewsRepository::class);
        // register frontend
        $this->app->singleton(\App\Repositories\Frontend\Category\CategoryRepositoryInterface::class,\App\Repositories\Frontend\Category\CategoryRepository::class);
        $this->app->singleton(\App\Repositories\Frontend\Product\ProductRepositoryInterface::class,\App\Repositories\Frontend\Product\ProductRepository::class);
        $this->app->singleton(\App\Repositories\Frontend\Slider\SliderRepositoryInterface::class,\App\Repositories\Frontend\Slider\SliderRepository::class);
        $this->app->singleton(\App\Repositories\Frontend\Province\ProvinceRepositoryInterface::class,\App\Repositories\Frontend\Province\ProvinceRepository::class);
        $this->app->singleton(\App\Repositories\Frontend\District\DistrictRepositoryInterface::class,\App\Repositories\Frontend\District\DistrictRepository::class);
        $this->app->singleton(\App\Repositories\Frontend\Ward\WardRepositoryInterface::class,\App\Repositories\Frontend\Ward\WardRepository::class);
        $this->app->singleton(\App\Repositories\Frontend\User\UserRepositoryInterface::class,\App\Repositories\Frontend\User\UserRepository::class);
        $this->app->singleton(\App\Repositories\Frontend\Order\OrderReposityInterface::class,\App\Repositories\Frontend\Order\OrderRepository::class);

    }
}
