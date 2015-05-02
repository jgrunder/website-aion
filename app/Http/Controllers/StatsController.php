<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Gameserver\Player;
use Illuminate\Http\Request;

class StatsController extends Controller {

    /**
     * GET /stats/online
     */
    public function online()
    {
        return view('stats.online', [
            'users' => Player::online()->get()
        ]);
    }

}
