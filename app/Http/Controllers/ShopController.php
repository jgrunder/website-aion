<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class ShopController extends BaseController
{
    /**
     * ROUTE : GET /shop
     * Shop page
     */
    public function index()
    {
        return view('shop.index');
    }
}
