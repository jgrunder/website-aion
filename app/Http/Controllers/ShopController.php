<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Gameserver\Ladder;
use App\Models\Gameserver\Player;

class ShopController extends Controller {

    /**
     * GET /shop
     */
    public function index()
    {
        return view('shop.index');
    }

}
