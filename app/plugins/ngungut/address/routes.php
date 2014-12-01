<?php

/**
 * Start Router for admin
 *
 */
Route::group(array('domain' => 'admin.blog.it', 'before' => 'isAdmin'), function()
{
    /**
     * Route For Address
     */
    Route::group(array('prefix' => 'address'), function() {
        /**
         * Address Show Page
         */
        Route::get('/', ['uses' => 'Ngungut\Address\Controller\AddressController@index']);
        /**
         * Address Action Handler
         */
        Route::post('/', ['uses' => 'Ngungut\Address\Controller\AddressController@doAddress']);
    });

});