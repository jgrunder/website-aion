<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Gameserver\Ladder;
use App\Models\Gameserver\Legion;
use App\Models\Gameserver\Player;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Http\Request;
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
            'users' => Player::online()->paginate(100)
        ]);
    }

    /**
     * GET /stats/legions
     */
    public function legions()
    {
        // SEO
        SEOMeta::setTitle(Lang::get('seo.legions.title'));
        SEOMeta::setDescription(Lang::get('seo.legions.description'));
        OpenGraph::setDescription(Lang::get('seo.legions.description'));

        return view('stats.legions', [
            'legions' => Legion::orderBy('contribution_points', 'desc')->paginate(100)
        ]);
    }

    /**
     * GET /stats/bg
     */
    public function bg(Request $request)
    {
        // SEO
        SEOMeta::setTitle(Lang::get('seo.bg.title'));
        SEOMeta::setDescription(Lang::get('seo.bg.description'));
        OpenGraph::setDescription(Lang::get('seo.bg.description'));

        $start = 0;

        if($request->input('page')){
            $start = ((15 * $request->input('page')) - 15);
        }

        return view('stats.bg', [
            'top'   => Ladder::orderBy('rating', 'DESC')->with('name')->paginate(15),
            'start' => $start
        ]);
    }

}
