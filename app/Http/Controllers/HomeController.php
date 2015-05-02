<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{

    /**
     * GET /
     */
	public function index()
	{
		return view('home.index');
	}

}
