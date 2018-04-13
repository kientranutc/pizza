<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;



class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (env('APP_ENV') !== 'local') {
            $this->app['request']->server->set('HTTPS', true);
        }
    }
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $repositories = [
            'Categories\CategoryRepositoryInterface' => 'Categories\CategoryRepository',
            'Products\ProductRepositoryInterface' => 'Products\ProductRepository',
            'Users\UserRepositoryInterface' => 'Users\UserRepository',
            'News\NewsRepositoryInterface' => 'News\NewsRepository',
            'Order\OrderRepositoryInterface' => 'Order\OrderRepository',
            'OrderDetail\OrderDetailRepositoryInterface' => 'OrderDetail\OrderDetailRepository',
            'UserRole\UserRoleRepositoryInterface' => 'UserRole\UserRoleRepository',
            'Role\RoleRepositoryInterface' => 'Role\RoleRepository',
            'Customer\CustomerRepositoryInterface' => 'Customer\CustomerRepository',
            'Banner\BannerRepositoryInterface' => 'Banner\BannerRepository',
            'ShoppingCart\ShoppingCartRepositoryInterface' => 'ShoppingCart\ShoppingCartRepository',
        ];
        foreach ($repositories as $key=>$val){
            $this->app->bind("App\\Repositories\\$key", "App\\Repositories\\$val");
        }
    }
}
