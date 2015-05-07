<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Gameserver\Ladder;
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

    /**
     * GET /stats/abyss
     */
    public function abyss()
    {
        return view('stats.abyss');
    }

    /**
     * GET /stats/bg
     */
    public function bg()
    {
        return view('stats.bg', [
            'top' => Ladder::orderBy('rank', 'DESC')->get()
        ]);
    }

}
