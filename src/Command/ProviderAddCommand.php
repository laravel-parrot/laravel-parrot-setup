<?php

namespace LaravelParrot\Setup\Command;

use Illuminate\Support\Str;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Console\Command as Command;

/**
 * @author    @code4mk <hiremostafa@gmail.com>
 * @author    @0devco <with@0dev.co>
 * @since     2019
 * @copyright 0dev.co (https://0dev.co)
 */

class ProviderAddCommand extends Command
{

  protected $signature = 'laravel-parrot:provider';
  protected $description = 'laravel parrot provider setup';

  /**
   * Create a new controller creator command instance.
   *
   * @param  \Illuminate\Filesystem\Filesystem  $files
   * @return void
   */
  public function __construct(Filesystem $files)
  {
      parent::__construct();

      $this->files = $files;
  }

  /**
   * Execute the console command.
   *
   * @return bool|null
   */
  public function handle(){
    $path = base_path('config/app.php');

    $this->files->put($path, $this->buildClass());

    $this->info('Parrot provider added successfully in config/app.php .');
  }

  /**
   * Build the class with the given name.
   *
   * @param  string  $name
   * @return string
   */
  protected function buildClass()
  {
      $stub = $this->files->get(base_path('config/app.php'));

      return $this->replaceNamespace($stub);
  }

  /**
   * Replace the namespace for the given stub.
   *
   * @param  string  $stub
   * @param  string  $name
   * @return $this
   */
  protected function replaceNamespace(&$stub)
  {
    if (! str_contains($stub,'* Parrot Project Service Providers')) {
      $stub = str_replace(
          [
            'App\\Providers\\RouteServiceProvider::class,',
          ],
          [
            'App\\Providers\\RouteServiceProvider::class,

        /*
        * Parrot Project Service Providers
        */
        Parrot\\Parrot\\App\\Providers\\ParrotServiceProvider::class,
             '
        ],
          $stub
      );
    }
      return $stub;
  }

}
 ?>
