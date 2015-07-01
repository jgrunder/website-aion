<?php

namespace App\Models\Webserver;

use Illuminate\Database\Eloquent\Model;

class ShopItem extends Model {

    protected $table        = 'shop_items';
    protected $connection   = 'webserver';
    protected $fillable     = ['id_category', 'name', 'price', 'quantity', 'level'];

}
