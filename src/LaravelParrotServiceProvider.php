<?php

namespace LaravelParrot\Setup;

/**
 * @author    @code4mk <hiremostafa@gmail.com>
 * @author    @0devco <with@0dev.co>
 * @copyright 0dev.co (https://0dev.co)
 */

use Illuminate\Support\ServiceProvider;

class LaravelParrotServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
      //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
      $this->commands('LaravelParrot\Setup\Command\SetupCommand');
      $this->commands('LaravelParrot\Setup\Command\ProviderAddCommand');
      $this->commands('LaravelParrot\Setup\Command\ParrotCommand');
    }
}
