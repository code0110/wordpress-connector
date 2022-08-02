<?php

namespace Botble\WordpressConnector\Http\Models;

use Botble\ACL\Models\User;
use Botble\Base\Models\BaseModel;
use Botble\Base\Traits\EnumCastable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class WooProduct extends BaseModel
{
    protected $table = 'woo_products';

    use HasFactory;

    protected $appends = [
        'created'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    protected $fillable = [
        'id_produs',
        'nume_produs',
        'sku',
        'regular_price',
        'sale_price',
        'stock_status',
        'stock_quantity',
        'product_type'
];

}
