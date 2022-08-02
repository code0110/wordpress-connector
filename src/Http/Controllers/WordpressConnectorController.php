<?php

namespace Botble\WordpressConnector\Http\Controllers;

use Assets;
use Redirect;
use Botble\Base\Http\Controllers\BaseController;
use Botble\Base\Http\Responses\BaseHttpResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Codexshaper\WooCommerce\Facades\Variation; 
use Illuminate\Support\Facades\Http;
use Botble\WordpressConnector\Http\Models\WooProduct;
use Codexshaper\WooCommerce\Facades\Product as WcProduct;

class WordpressConnectorController extends BaseController
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        Assets::addScriptsDirectly('vendor/core/plugins/wordpress-connector/js/wordpress-connector.js')
            ->addStylesDirectly('vendor/core/plugins/wordpress-connector/css/wordpress-connector.css');

        page_title()->setTitle(trans('plugins/wordpress-connector::wordpress-connector.name'));

        return view('plugins/wordpress-connector::import');
    }

    /**
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function get_products()
    {   
        DB::table('woo_products')->delete();
        $page = 1;
        $products = [];
        $data = [];
        $count = file_get_contents('http://metal-rom.ro/number.php');
        $pages = 11;
        $i = 1;
        for($i;$i <= $pages;$i++){
            $pr = [
                // 'category' => '20',
                'per_page' => '100',
                'page'  => $i
            ];
            $products = WcProduct::all($pr)->toarray();
            $data = array_merge($data,$products);
        }


        foreach($data as $d){
            $categories = $d->categories;
            if($categories){ 
                $categorie = $categories[0]->id;
            }
            $datas = [
                'id_produs' => $d->id,
                'nume_produs' => $d->name,
                'sku' => $d->sku,
                'regular_price' => $d->regular_price,
                'sale_price' => $d->price,
                'stock_status' =>$d->stock_status,
                'stock_quantity' =>$d->stock_quantity,
                'product_type' =>$d->type,
                'id_category' => $categorie,
                'permalink' =>$d->permalink

            ];

            WooProduct::insert($datas);          

        }
        return Redirect::back();

    }
}
