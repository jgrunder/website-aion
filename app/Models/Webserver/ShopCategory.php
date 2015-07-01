<?php

namespace App\Models\Webserver;

use Illuminate\Database\Eloquent\Model;

class ShopCategory extends Model {

    protected $table        = 'shop_category';
    protected $connection   = 'webserver';
    protected $fillable     = ['name', 'id'];

    public function name(){
        return $this->hasMany('App\Models\Webserver\ShopSubCategory', 'id_category', 'id');
    }

}
