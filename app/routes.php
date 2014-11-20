<?php

/**
 * Start Router for admin
 *
 */
Route::group(array('domain' => 'admin.blog.it'), function()
{
    /**
     * Route For Dashboard
     */
    Route::get('/', ['uses' => 'AdminController@dashboard']);

    /**
     * Route For Login Page
     */
    Route::get('login', ['uses' => 'AdminController@login']);
    /**
     * Login action Handler
     */
    Route::post('login', ['before' => 'csrf','uses' => 'AdminController@doLogin']);

    /**
     * Route For Post
     */
    Route::group(array('prefix' => 'post'), function() {
        /**
         * Create new post
         */
        Route::get('new', ['uses' => 'PostController@action']);
        /**
         * New Post Action Handler
         */
        Route::post('new', ['before' => 'csrf', 'uses' => 'PostController@doAction']);
    });

    /**
     * Route For Media
     */
    Route::group(array('prefix' => 'media'), function() {
        /**
         * Libraries Page
         */
        Route::get('libraries', ['uses' => 'MediaController@libraries']);
        /**
         * Upload Page
         */
        Route::get('upload', ['uses' => 'MediaController@upload']);
        /**
         * Upload Media action Handler
         */
        Route::post('upload', ['uses' => 'MediaController@doUpload']);

        /**
         * CKEDITOR Prefix URL
         */
        Route::group(array('prefix' => 'ckeditor'), function() {
            /**
             * File Libraries Page
             */
            Route::get('libraries', ['uses' => 'CkeditorController@libraries']);
            /**
             * Image Libraries Page
             */
            Route::get('image', ['uses' => 'CkeditorController@image']);
            /**
             * Upload Page
             */
            Route::get('upload', ['uses' => 'CkeditorController@upload']);
            /**
             * Upload Media action Handler
             */
            Route::post('upload', ['uses' => 'CkeditorController@doUpload']);
        });
    });

    /**
     * Route For Setting
     */
    Route::group(array('prefix' => 'setting'), function() {
        /**
         * Setting Show Page
         */
        Route::get('/', ['uses' => 'SettingController@index']);
        /**
         * Setting General Action Handler
         */
        Route::post('general', ['uses' => 'SettingController@general']);
        /**
         * Setting Media Action handler
         */
        Route::post('media', ['uses' => 'SettingController@media']);
    });

    /**
     * Route for admin ajax request
     */
    Route::group(['prefix' => 'ajax'], function(){
        /**
         * ajax for date/time format
         */
        Route::post('dater', ['uses' => 'SettingController@formater']);
    });

});

Route::get('/', function()
{
	return View::make('hello');
});
