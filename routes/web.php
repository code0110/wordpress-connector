<?php

Route::group([
    'namespace'  => 'Botble\WordpressConnector\Http\Controllers',
    'middleware' => ['web', 'core'],
], function () {
    Route::group(['prefix' => BaseHelper::getAdminPrefix(), 'middleware' => 'auth'], function () {
        Route::get('wordpress-connector', [
            'as'         => 'wordpress-connector.simple',
            'uses'       => 'WordpressConnectorController@index',
            'permission' => 'settings.options',
        ]);        

     
        Route::get('wordpress-sync-products', [
            'as'         => 'wordpress-connector.syncproducts',
            'uses'       => 'WordpressConnectorController@get_products',
            'permission' => 'settings.options',
        ]);

        Route::get('wordpress-get-variations', [
            'as'         => 'wordpress-connector.variations',
            'uses'       => 'WordpressConnectorController@variations',
            'permission' => 'settings.options',
        ]);

        Route::get('wordpress-sync-variations', [
            'as'         => 'wordpress-connector.syncvariations',
            'uses'       => 'WordpressConnectorController@get_variations',
            'permission' => 'settings.options',
        ]);
    });
});
