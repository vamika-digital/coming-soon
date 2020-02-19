<?php

namespace VamikaDigital\ComingSoon;

use Illuminate\Support\ServiceProvider;

class ComingSoonServiceProvider extends ServiceProvider
{
  /**
   * Perform post-registration booting of services.
   *
   * @return void
   */
  public function boot()
  {
    $this->loadViewsFrom(__DIR__ . '/resources/views', 'comingsoon');
    $this->publishes([
      __DIR__ . '/public/images' => public_path('vendor/vamikadigital/comingsoon'),
    ], 'public');

    $this->app['router']->namespace('VamikaDigital\\ComingSoon\\Controllers')
      ->middleware(['web'])
      ->group(function () {
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
      });

    // Publishing is only necessary when using the CLI.
    if ($this->app->runningInConsole()) {
      $this->bootForConsole();
    }
  }

  /**
   * Register any package services.
   *
   * @return void
   */
  public function register()
  {
    $this->mergeConfigFrom(__DIR__ . '/config/comingsoon.php', 'comingsoon');

    // Register the service the package provides.
    $this->app->singleton('comingsoon', function ($app) {
      return new ComingSoon;
    });
  }

  /**
   * Get the services provided by the provider.
   *
   * @return array
   */
  public function provides()
  {
    return ['comingsoon'];
  }

  /**
   * Console-specific booting.
   *
   * @return void
   */
  protected function bootForConsole()
  {
    // Publishing the configuration file.
    $this->publishes([
      __DIR__ . '/config/comingsoon.php' => config_path('comingsoon.php'),
    ], 'comingsoon.config');

    // Publishing the views.
    $this->publishes([
      __DIR__ . '/resources/views' => base_path('resources/views/vendor/comingsoon'),
    ], 'comingsoon.views');

    // Publishing assets.
    /*$this->publishes([
            __DIR__.'/resources/assets' => public_path('vendor/vamikadigital'),
        ], 'comingsoon.views');*/
  }
}
