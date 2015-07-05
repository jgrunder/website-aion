<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Gameserver\Ladder;
use App\Models\Gameserver\Player;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Support\Facades\Lang;

class StatsController extends Controller {

    /**
     * GET /stats/online
     */
    public function online()
    {
        // SEO
        SEOMeta::setTitle(Lang::get('seo.online.title'));
        SEOMeta::setDescription(Lang::get('seo.online.description'));
        OpenGraph::setDescription(Lang::get('seo.online.description'));

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
        SEOMeta::setTitle(Lang::get('seo.abyss.title'));
        SEOMeta::setDescription(Lang::get('seo.abyss.description'));
        OpenGraph::setDescription(Lang::get('seo.abyss.description'));

        return view('stats.abyss');
    }

    /**
     * GET /stats/bg
     */
    public function bg()
    {
        // SEO
        SEOMeta::setTitle(Lang::get('seo.bg.title'));
        SEOMeta::setDescription(Lang::get('seo.bg.description'));
        OpenGraph::setDescription(Lang::get('seo.bg.description'));

        return view('stats.bg', [
            'top' => Ladder::orderBy('rank', 'DESC')->with('name')->get()
        ]);
    }

}
