<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Gameserver\Ladder;
use App\Models\Gameserver\Player;
use Artesaos\SEOTools\Facades\SEOMeta;

class StatsController extends Controller {

    /**
     * GET /stats/online
     */
    public function online()
    {
        // SEO
        SEOMeta::setTitle('Joueurs en ligne');
        SEOMeta::setDescription('Venez voir qui est actuellement en ligne sur le serveur RealAion.');

        return view('stats.online', [
            'users' => Player::online()->get()
        ]);
    }

    /**
     * GET /stats/abyss
     */
    public function abyss()
    {
        // SEO
        SEOMeta::setTitle('Classement Abyssal');
        SEOMeta::setDescription('Venez voir qui est le plus fort en PVP Abyssal sur le serveur RealAion.');

        return view('stats.abyss');
    }

    /**
     * GET /stats/bg
     */
    public function bg()
    {
        // SEO
        SEOMeta::setTitle('Champs de batailles');
        SEOMeta::setDescription('Venez voir qui est le plus fort sur les champs de batailles du serveur RealAion.');

        return view('stats.bg', [
            'top' => Ladder::orderBy('rank', 'DESC')->get()
        ]);
    }

}
