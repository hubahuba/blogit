<?php namespace Ngungut\Address;

use Ngungut\Nccms\PluginCore;

class Plugin extends PluginCore {

    public function pluginDetails()
    {
        return [
            'name' => 'Address',
            'description' => 'Company Address Plugin Creator',
            'author' => 'ngungut'
        ];
    }

    public function registerComponents()
    {
        return [
            '\Ngungut\Address\Components\AddressList' => 'Addresses'
        ];
    }

    public function registerNavigation()
    {
        return [
            'address' => [
                'label'       => 'Address',
                'url'         => \URL::to('address'),
                'icon'        => 'fa-map-marker',
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
        //load all controller file
        foreach (glob(__DIR__.'/controllers/*.php') as $filename)
        {
            include $filename;
        }
        //load all models file
        foreach (glob(__DIR__.'/models/*.php') as $filename)
        {
            include $filename;
        }
        //add location of plugin views
        \View::addLocation(app_path().'/plugins/ngungut/address/views');
        //set namespace for plugin views
        \View::addNamespace('addr', app_path().'/plugins/ngungut/address/views');
    }
} 