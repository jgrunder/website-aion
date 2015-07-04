<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Illuminate\Support\Facades\Lang;

class PageController extends Controller {

    /**
     * GET /page/join-us
     */
    public function joinUs()
    {
        // SEO
        SEOMeta::setTitle(Lang::get('seo.joinus.title'));
        SEOMeta::setDescription(Lang::get('seo.joinus.description'));
        OpenGraph::setDescription(Lang::get('seo.joinus.description'));

        return view('page.joinus');
    }

    /**
     * GET /page/teamspeak
     */
    public function teamspeak()
    {
        // SEO
        SEOMeta::setTitle(Lang::get('seo.teamspeak.title'));
        SEOMeta::setDescription(Lang::get('seo.teamspeak.description'));
        OpenGraph::setDescription(Lang::get('seo.teamspeak.description'));

        return view('page.teamspeak');
    }

    /**
     * GET /page/rules
     */
    public function rules()
    {
        // SEO
        SEOMeta::setTitle(Lang::get('seo.rules.title'));
        SEOMeta::setDescription(Lang::get('seo.rules.description'));
        OpenGraph::setDescription(Lang::get('seo.rules.description'));

        return view('page.rules');
    }

    /**
     * GET /page/rules
     */
    public function team()
    {
        // SEO
        SEOMeta::setTitle(Lang::get('seo.team.title'));
        SEOMeta::setDescription(Lang::get('seo.team.description'));
        OpenGraph::setDescription(Lang::get('seo.team.description'));

        return view('page.team');
    }

    /**
     * GET /page/error
     */
    public function error()
    {
        // SEO
        SEOMeta::setTitle(Lang::get('seo.error.title'));
        SEOMeta::setDescription(Lang::get('seo.error.description'));
        OpenGraph::setDescription(Lang::get('seo.error.description'));

        return view('page.error');
    }

    /**
     * GET /page/rates
     */
    public function rates()
    {
        // SEO
        SEOMeta::setTitle(Lang::get('seo.rates.title'));
        SEOMeta::setDescription(Lang::get('seo.rates.description'));
        OpenGraph::setDescription(Lang::get('seo.rates.description'));

        return view('page.rates');
    }

}
