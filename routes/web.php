<?php

Route::group([
    'namespace'  => 'Botble\WordpressConnector\Http\Controllers',
    'middleware' => ['web', 'core'],
], function () {
    Route::group(['prefix' => BaseHelper::getAdminPrefix(), 'middleware' => 'auth'], function () {
        Route::get('wordpress-connector', [
            'as'         => 'wordpress-connector',
            'uses'       => 'WordpressConnectorController@index',
            'permission' => 'settings.options',
        ]);

        Route::post('wordpress-connector', [
            'as'         => 'wordpress-connector.post',
            'uses'       => 'WordpressConnectorController@import',
            'permission' => 'settings.options',
        ]);

        Route::get('wordpress-sync-products', [
            'as'         => 'wordpress-connector.syncproducts',
            'uses'       => 'WordpressConnectorController@get_products',
            'permission' => 'settings.options',
        ]);
    });
});
