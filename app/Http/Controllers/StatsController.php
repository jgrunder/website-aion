<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Gameserver\Player;

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

    public function abyss()
    {
        return view('stats.abyss');
    }

}
