<?php

namespace LaravelParrot\Setup\Command;

use Illuminate\Support\Str;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Console\Command as Command;

 class ParrotCommand extends Command
{

  protected $signature = 'laravel-parrot:parrot';
  protected $description = 'clone parrot project';

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

    if (! file_exists(base_path('parrot'))) {
      echo exec('composer create-project parrot/parrot parrot dev-master');

      $this->files->deleteDirectory(base_path('parrot/vendor'));

      $this->info('complete parrot project clone');
    } else {
      $this->info('Already have parrot project');
    }

  }

}
 ?>
