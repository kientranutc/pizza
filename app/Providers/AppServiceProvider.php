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
            'UserRole\UserRoleRepositoryInterface' => 'UserRole\UserRoleRepository',
            'Role\RoleRepositoryInterface' => 'Role\RoleRepository',
        ];
        foreach ($repositories as $key=>$val){
            $this->app->bind("App\\Repositories\\$key", "App\\Repositories\\$val");
        }
    }
}
