<?php namespace Ngungut\Nccms;

use Illuminate\Support\ServiceProvider;

class NccmsServiceProvider extends ServiceProvider {

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
		$this->package('ngungut/nccms');

        include __DIR__.'/../../routes.php';
        include __DIR__.'/../../filters.php';

        //load database seeder file
        foreach (glob(__DIR__.'/../../seeds/*.php') as $filename)
        {
            include $filename;
        }

        //load all controller file
        foreach (glob(__DIR__.'/../../controllers/*.php') as $filename)
        {
            include $filename;
        }
        //load all models file
        foreach (glob(__DIR__.'/../../models/*.php') as $filename)
        {
            include $filename;
        }
        //load libraries file
        foreach (glob(__DIR__.'/../../libraries/*.php') as $filename)
        {
            include $filename;
        }
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
        $this->app['nccms'] = $this->app->share(function()
        {
            return new AdminController();
        });

        //register command
        $this->app['nccms::commands.install'] = $this->app->share(function($app)
        {
            return new InstallNCCms();
        });

        $this->commands(
            'nccms::commands.install'
        );
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}
