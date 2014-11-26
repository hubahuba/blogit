<?php

/**
 * Start Router for admin
 *
 */
Route::group(array('domain' => 'admin.blog.it', 'before' => 'isAdmin'), function()
{
    Route::get('tester', function(){
        $children  = array();
        foreach(get_declared_classes() as $class){
            if($class instanceof PluginBase) $children[] = $class;
        }
        Ngungut\Nccms\Libraries\Common::debug(get_declared_classes(),1);
    });
    /**
     * Route For Dashboard
     */
    Route::get('/', ['uses' => 'Ngungut\Nccms\Controller\AdminController@dashboard']);

    /**
     * Route For Login Page
     */
    Route::get('login', ['uses' => 'Ngungut\Nccms\Controller\AdminController@login']);
    /**
     * Login action Handler
     */
    Route::post('login', [
        'before' => 'csrf',
        'uses' => 'Ngungut\Nccms\Controller\AdminController@doLogin'
    ]);

    /**
     * Route For Logout
     */
    Route::get('logout', ['uses' => 'Ngungut\Nccms\Controller\AdminController@logout']);

    /**
     * Route For Post
     */
    Route::group(array('prefix' => 'post'), function() {
        /**
         * Create new post
         */
        Route::get('new', ['uses' => 'Ngungut\Nccms\Controller\PostController@action']);
        /**
         * New Post Action Handler
         */
        Route::post('new', ['before' => 'csrf', 'uses' => 'Ngungut\Nccms\Controller\PostController@doAction']);
        /**
         * Category Page Handler
         */
        Route::get('categories', ['uses' => 'Ngungut\Nccms\Controller\CategoryController@index']);
        /**
         * New/Edit Category Post Action Handler
         */
        Route::post('categories', ['before' => 'csrf', 'uses' => 'Ngungut\Nccms\Controller\CategoryController@doCategories']);
    });

    /**
     * Route For Media
     */
    Route::group(array('prefix' => 'media'), function() {
        /**
         * Libraries Page
         */
        Route::get('libraries', ['uses' => 'Ngungut\Nccms\Controller\MediaController@libraries']);
        /**
         * Upload Page
         */
        Route::get('upload', ['uses' => 'Ngungut\Nccms\Controller\MediaController@upload']);
        /**
         * Upload Media action Handler
         */
        Route::post('upload', ['uses' => 'Ngungut\Nccms\Controller\MediaController@doUpload']);

        /**
         * CKEDITOR Prefix URL
         */
        Route::group(array('prefix' => 'ckeditor'), function() {
            /**
             * File Libraries Page
             */
            Route::get('libraries', ['uses' => 'Ngungut\Nccms\Controller\CkeditorController@libraries']);
            /**
             * Image Libraries Page
             */
            Route::get('image', ['uses' => 'Ngungut\Nccms\Controller\CkeditorController@image']);
            /**
             * Upload Page
             */
            Route::get('upload', ['uses' => 'Ngungut\Nccms\Controller\CkeditorController@upload']);
            /**
             * Upload Media action Handler
             */
            Route::post('upload', ['uses' => 'Ngungut\Nccms\Controller\CkeditorController@doUpload']);
        });
    });

    /**
     * Route For Setting
     */
    Route::group(array('prefix' => 'setting'), function() {
        /**
         * Setting Show Page
         */
        Route::get('/', ['uses' => 'Ngungut\Nccms\Controller\SettingController@index']);
        /**
         * Setting General Action Handler
         */
        Route::post('general', ['uses' => 'Ngungut\Nccms\Controller\SettingController@general']);
        /**
         * Setting Media Action handler
         */
        Route::post('media', ['uses' => 'Ngungut\Nccms\Controller\SettingController@media']);
    });

    /**
     * Route for admin ajax request
     */
    Route::group(['prefix' => 'ajax'], function(){
        /**
         * ajax for date/time format
         */
        Route::post('dater', ['uses' => 'Ngungut\Nccms\Controller\SettingController@formater']);
    });

    /**
     * Route For Address
     */
    Route::group(array('prefix' => 'address'), function() {
        /**
         * Address Show Page
         */
        Route::get('/', ['uses' => 'Ngungut\Nccms\Controller\AddressController@index']);
        /**
         * Address Action Handler
         */
        Route::post('/', ['uses' => 'Ngungut\Nccms\Controller\AddressController@doAddress']);
    });

});