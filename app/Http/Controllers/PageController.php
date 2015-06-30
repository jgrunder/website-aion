<?php

namespace App\Http\Controllers;

use App\Http\Requests;

class PageController extends Controller {

    /**
     * GET /page/contactus
     */
    public function contactUs()
    {
        return view('page.contactus');
    }

    /**
     * GET /page/join-us
     */
    public function joinUs()
    {
        return view('page.joinus');
    }

    /**
     * GET /page/teamspeak
     */
    public function teamspeak()
    {
        return view('page.teamspeak');
    }

    /**
     * GET /page/rules
     */
    public function rules()
    {
        return view('page.rules');
    }

    /**
     * GET /page/rules
     */
    public function team()
    {
        return view('page.team');
    }

    /**
     * GET /page/error
     */
    public function error()
    {
        return view('page.error');
    }

    /**
     * GET /page/rates
     */
    public function rates()
    {
        return view('page.rates');
    }

}
