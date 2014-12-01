<?php namespace Ngungut\Slider;

use Ngungut\Nccms\PluginCore;

class Plugin extends PluginCore {

    public function pluginDetails()
    {
        return [
            'name' => 'Slider',
            'description' => 'Slider Management Plugin',
            'author' => 'ngungut'
        ];
    }

    public function registerComponents()
    {
        return [
            '\Ngungut\Slider\Components\Slider' => 'Slider'
        ];
    }

    public function registerNavigation()
    {
        return [
            'slider' => [
                'label'       => 'Slider',
                'url'         => \URL::to('slider'),
                'icon'        => 'fa-picture-o',
            ]
        ];
    }

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        include __DIR__.'/routes.php';

        //load classes file
        foreach (glob(__DIR__.'/components/*.php') as $filename)
        {
            include $filename;
        }
        //add location of plugin views
        \View::addLocation(app_path().'/plugins/ngungut/address/views');
        //set namespace for plugin views
        \View::addNamespace('addr', app_path().'/plugins/ngungut/address/views');
    }
} 