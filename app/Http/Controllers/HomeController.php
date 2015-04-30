<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class HomeController extends BaseController
{
    /**
     * ROUTE : GET /
     * Home page
     */
    public function index()
    {
        return view('home');
    }
}
