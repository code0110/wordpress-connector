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
                    'id'          => 'cms-plugin-wordpress-connector2',
                    'priority'    => 10,
                    'parent_id'   => 'cms-plugin-wordpress-connector',
                    'name'        => 'plugins/wordpress-connector::wordpress-connector.name',
                    'icon'        => 'fab fa-wordpress',
                    'url'         => route('wordpress-connector'),
                    'permissions' => ['settings.options'],
                ]);        
   
        });
    }
}
