<?php

namespace Jhp\BookCrud\Providers;

use Illuminate\Support\ServiceProvider;
use Jhp\BookCrud\Services\IBookService;
use Jhp\BookCrud\Repositories\IBookRepository;
use Jhp\BookCrud\Services\BookService;
use Jhp\BookCrud\Repositories\BookRepository;

class BookCrudServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $package_name = "bookcrud";

        //routes
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');

        //view
        $this->loadViewsFrom(__DIR__.'/../resources/views', $package_name);
        $this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/' . $package_name),
            ]);

        //migrations
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        /*
        |--------------------------------------------------------------------------
        | Route Providers need on boot() method, others can be in register() method
        |--------------------------------------------------------------------------
        */
        $this->app->register(RouteServiceProvider::class);
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(IBookRepository::class, BookRepository::class);
        $this->app->bind(IBookService::class, BookService::class);
    }
}
