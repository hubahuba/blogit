<?php namespace Ngungut\Nccms;

use Illuminate\Support\ServiceProvider;

class PluginServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

    protected $pluginmanager;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {

        //register plugin manager
        $this->app['pluginmanager'] = $this->app->share(function($app)
        {
            return new PluginManager();
        });

        $pluginManager = PluginManager::instance();
        $pluginManager->registerAll();
    }

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
        $pluginManager = PluginManager::instance();
        $pluginManager->bootAll();
	}

}
