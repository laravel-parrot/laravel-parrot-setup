<?php

namespace LaravelParrot\Setup;

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
    }
}
