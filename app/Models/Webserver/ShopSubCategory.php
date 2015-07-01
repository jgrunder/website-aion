<?php

namespace App\Models\Webserver;

use Illuminate\Database\Eloquent\Model;

class ShopSubCategory extends Model {

    protected $table        = 'shop_sub_category';
    protected $connection   = 'webserver';
    protected $fillable     = ['name', 'id_category', 'id'];

}
