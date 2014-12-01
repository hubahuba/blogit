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
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
        /**
         * Bind all Controllers
         */
        \App::bindShared('AdminController', function($app){
            return new Controller\AdminController();
        });
        \App::bindShared('CategoryController', function($app){
            return new Controller\CategoryController();
        });
        \App::bindShared('CkeditorController', function($app){
            return new Controller\CkeditorController();
        });
        \App::bindShared('MediaController', function($app){
            return new Controller\MediaController();
        });
        \App::bindShared('PostController', function($app){
            return new Controller\PostController();
        });
        \App::bindShared('SettingController', function($app){
            return new Controller\SettingController();
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

}
