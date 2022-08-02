<?php

namespace Botble\WordpressConnector\Providers;

use Botble\Base\Traits\LoadAndPublishDataTrait;
use Event;
use Illuminate\Routing\Events\RouteMatched;
use Illuminate\Support\ServiceProvider;

class WordpressConnectorServiceProvider extends ServiceProvider
{
    use LoadAndPublishDataTrait;

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->setNamespace('plugins/wordpress-connector')
            ->loadAndPublishViews()
            ->loadAndPublishTranslations()
            ->publishAssets()
            ->loadRoutes(['web']);

        Event::listen(RouteMatched::class, function () {           

                dashboard_menu()
                ->registerItem([
                    'id'          => 'cms-plugin-wordpress-connector',
                    'priority'    => 9,
                    'parent_id'   => null,
                    'name'        => 'plugins/wordpress-connector::wordpress-connector.name',
                    'icon'        => 'fab fa-wordpress',
                    'url'         => '',
                    'permissions' => ['settings.options'],
                ])
                ->registerItem([
                    'id'          => 'cms-plugin-woocommerce-products',
                    'priority'    => 10,
                    'parent_id'   => 'cms-plugin-wordpress-connector',
                    'name'        => 'Simple products',
                    'icon'        => 'fab fa-wordpress',
                    'url'         => route('wordpress-connector.simple'),
                    'permissions' => ['settings.options'],
                ])
                ->registerItem([
                    'id'          => 'cms-plugin-woocommerce-variations',
                    'priority'    => 10,
                    'parent_id'   => 'cms-plugin-wordpress-connector',
                    'name'        => 'Variations products',
                    'icon'        => 'fab fa-wordpress',
                    'url'         => route('wordpress-connector.variations'),
                    'permissions' => ['settings.options'],
                ]);        
   
        });
    }
}
