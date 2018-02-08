<?php namespace Bantenprov\BGBurukPerawatan;

use Illuminate\Support\ServiceProvider;
use Bantenprov\BGBurukPerawatan\Console\Commands\BGBurukPerawatanCommand;

/**
 * The BGBurukPerawatanServiceProvider class
 *
 * @package Bantenprov\BGBurukPerawatan
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class BGBurukPerawatanServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        // Bootstrap handles
        $this->routeHandle();
        $this->configHandle();
        $this->langHandle();
        $this->viewHandle();
        $this->assetHandle();
        $this->migrationHandle();
        $this->publicHandle();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('bg-buruk-perawatan', function ($app) {
            return new BGBurukPerawatan;
        });

        $this->app->singleton('command.bg-buruk-perawatan', function ($app) {
            return new BGBurukPerawatanCommand;
        });

        $this->commands('command.bg-buruk-perawatan');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            'bg-buruk-perawatan',
            'command.bg-buruk-perawatan',
        ];
    }

    /**
     * Loading package routes
     *
     * @return void
     */
    protected function routeHandle()
    {
        $this->loadRoutesFrom(__DIR__.'/routes/routes.php');
    }

    /**
     * Loading and publishing package's config
     *
     * @return void
     */
    protected function configHandle()
    {
        $packageConfigPath = __DIR__.'/config/config.php';
        $appConfigPath     = config_path('bg-buruk-perawatan.php');

        $this->mergeConfigFrom($packageConfigPath, 'bg-buruk-perawatan');

        $this->publishes([
            $packageConfigPath => $appConfigPath,
        ], 'config');
    }

    /**
     * Loading and publishing package's translations
     *
     * @return void
     */
    protected function langHandle()
    {
        $packageTranslationsPath = __DIR__.'/resources/lang';

        $this->loadTranslationsFrom($packageTranslationsPath, 'bg-buruk-perawatan');

        $this->publishes([
            $packageTranslationsPath => resource_path('lang/vendor/bg-buruk-perawatan'),
        ], 'lang');
    }

    /**
     * Loading and publishing package's views
     *
     * @return void
     */
    protected function viewHandle()
    {
        $packageViewsPath = __DIR__.'/resources/views';

        $this->loadViewsFrom($packageViewsPath, 'bg-buruk-perawatan');

        $this->publishes([
            $packageViewsPath => resource_path('views/vendor/bg-buruk-perawatan'),
        ], 'views');
    }

    /**
     * Publishing package's assets (JavaScript, CSS, images...)
     *
     * @return void
     */
    protected function assetHandle()
    {
        $packageAssetsPath = __DIR__.'/resources/assets';

        $this->publishes([
            $packageAssetsPath => resource_path('assets'),
        ], 'bg-buruk-perawatan-assets');
    }

    /**
     * Publishing package's migrations
     *
     * @return void
     */
    protected function migrationHandle()
    {
        $packageMigrationsPath = __DIR__.'/database/migrations';

        $this->loadMigrationsFrom($packageMigrationsPath);

        $this->publishes([
            $packageMigrationsPath => database_path('migrations')
        ], 'migrations');
    }

    public function publicHandle()
    {
        $packagePublicPath = __DIR__.'/public';

        $this->publishes([
            $packagePublicPath => base_path('public')
        ], 'bg-buruk-perawatan-public');
    }
}
